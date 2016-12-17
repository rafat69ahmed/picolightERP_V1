<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use App\Acc_account;
use App\Ledgerreport;
use App\AccTransactionDetail;
use PDF;
use Dompdf\Dompdf;
class LedgerreportsController extends Controller
{
    public $show_action = true;
    public $view_col = 'author';
    public $listing_cols = ['id', 'author'];
    
    public function __construct() {
        // for authentication (optional)
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the Ledgerreports.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('Ledgerreports');
        
        $acc_items = Acc_account::where('acc_or_group','account')->get();
        return View('la.ledgerreports.index', [
            'show_actions' => $this->show_action,
            'listing_cols' => $this->listing_cols,
            'acc_items' => $acc_items,            
            'module' => $module
        ]);
    }

    /**
     * Show the form for creating a new ledgerreport.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created ledgerreport in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $details = new AccTransactionDetail();
        $details->created_at1 = $request->from_date;
        $details->created_at2 = $request->to_date;
        
        
        if ($request->journal_book == 1) {
            # code...
            $alldata= AccTransactionDetail::
        whereBetween('created_at', [$request->from_date, $request->to_date])
        ->get();
        // $allDamount = $alldata->sum('debit_amt');
        $pdf = PDF::loadView('pdf.journalreport',['alldata'=>$alldata]);
        return $pdf ->download('journalreport.pdf', array('Attachment' =>0));
        }

        else if($request->ledger_book == 1){

            $alldata= AccTransactionDetail::
        whereBetween('created_at', [$request->from_date, $request->to_date])
        ->where('account_id', $request->account_no)
        ->get();
        // var_dump($request->account_no);
        $allDamount = $alldata->sum('debit_amt');
        

        $pdf = PDF::loadView('pdf.ledgerreport',['alldata'=>$alldata],['allDamount'=>$allDamount]);
        return $pdf ->download('ledgerreport.pdf', array('Attachment' =>0));
        }


        else if($request->cash_book == 1){

            $alldata= AccTransactionDetail::
            whereBetween('created_at', [$request->from_date, $request->to_date])
            ->where('account_id', 39)
            ->get();
            $allDamount = AccTransactionDetail::
            whereBetween('created_at', [$request->from_date, $request->to_date])
            ->where('account_id', 40)
            ->get();
        

        $pdf = PDF::loadView('pdf.cashbook',['alldata'=>$alldata],['allDamount'=>$allDamount]);
        return $pdf ->download('cashbook.pdf', array('Attachment' =>0));
        }








        // $alldata= AccTransactionDetail::
        // whereBetween('created_at', [$request->from_date, $request->to_date])
        // ->where('account_id', $request->account_no)
        // ->get();
        // // var_dump($request->account_no);
        // $allDamount = $alldata->sum('debit_amt');
        

        // $pdf = PDF::loadView('pdf.ledgerreport',['alldata'=>$alldata],['allDamount'=>$allDamount]);
        // return $pdf ->download('ledgerreport.pdf', array('Attachment' =>0));


        
        // return redirect()->route(config('laraadmin.adminRoute') . '.ledgerreports.index');
    }

    /**
     * Display the specified ledgerreport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ledgerreport = Ledgerreport::find($id);
        $module = Module::get('Ledgerreports');
        $module->row = $ledgerreport;
        return view('la.ledgerreports.show', [
            'module' => $module,
            'view_col' => $this->view_col,
            'no_header' => true,
            'no_padding' => "no-padding"
        ])->with('ledgerreport', $ledgerreport);
    }

    /**
     * Show the form for editing the specified ledgerreport.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ledgerreport = Ledgerreport::find($id);
        
        $module = Module::get('Ledgerreports');
        
        $module->row = $ledgerreport;
        
        return view('la.ledgerreports.edit', [
            'module' => $module,
            'view_col' => $this->view_col,
        ])->with('ledgerreport', $ledgerreport);
    }

    /**
     * Update the specified ledgerreport in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = Module::validateRules("Ledgerreports", $request);
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
        }
        
        $insert_id = Module::updateRow("Ledgerreports", $request, $id);
        
        return redirect()->route(config('laraadmin.adminRoute') . '.ledgerreports.index');
    }

    /**
     * Remove the specified ledgerreport from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ledgerreport::find($id)->delete();
        // Redirecting to index() method
        return redirect()->route(config('laraadmin.adminRoute') . '.ledgerreports.index');
    }
    
    /**
     * Datatable Ajax fetch
     *
     * @return
     */
    public function dtajax()
    {
        $users = DB::table('ledgerreports')->select($this->listing_cols);
        $out = Datatables::of($users)->make();
        $data = $out->getData();
        
        for($i=0; $i<count($data->data); $i++) {
            for ($j=0; $j < count($this->listing_cols); $j++) { 
                $col = $this->listing_cols[$j];
                if($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/ledgerreports/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            if($this->show_action) {
                $output = '<a href="'.url(config('laraadmin.adminRoute') . '/ledgerreports/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.ledgerreports.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
                $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                $output .= Form::close();
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }
}
