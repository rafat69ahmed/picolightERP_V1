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

use App\MillIssue;
use App\Jutemillinventory;

class MillIssuesController extends Controller
{
    public $show_action = true;
    public $view_col = 'jute_mill_issue_no';
    public $listing_cols = ['id', 'jute_mill_issue_no', 'item_id', 'item_categorie_id', 'issue_date', 'inventory', 'inventory_items', 'unit_type', 'sub_unit_type', 'quantity', 'sub_unit_quantity', 'total_quantity', 'stock_in_hand', 'user_id'];
    
    public function __construct() {
        // for authentication (optional)
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the MillIssues.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('MillIssues');
        
        return View('la.millissues.index', [
            'show_actions' => $this->show_action,
            'listing_cols' => $this->listing_cols,
            'module' => $module
        ]);
    }

    /**
     * Show the form for creating a new millissue.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created millissue in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = Module::validateRules("MillIssues", $request);
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            $objCode = new MillIssue();
            $code = MillIssue::all() -> last();
            ///  code
                if ($code != null) {
                        $receiveNoUniquecode =$code->code+1;
                        // $receiveNoUniquecode =$receive_no_last->id+1;
                        if (strlen($receiveNoUniquecode) == 3) {
                        $receiveNoUniquecode = "0" . $receiveNoUniquecode;
                        } elseif (strlen($receiveNoUniquecode) == 2) {
                            $receiveNoUniquecode = "00" . $receiveNoUniquecode;
                        } elseif (strlen($receiveNoUniquecode) == 1) {
                            $receiveNoUniquecode = "000" . $receiveNoUniquecode;
                        }
                    $objCode->code = $receiveNoUniquecode;
                    
                    }
                    else{
                    $objCode->code= "000". 1;
                    
                    }
            
        // $insert_id = Module::insert("MillIssues", $request);
        for($detial_index = 1; $detial_index <= $request->detail_max_number;$detial_index++)
            {
                     if (isset($request->sub_unit_type[$detial_index])) {
                            $millIssue_obj = new MillIssue();
                    
                            $millIssue_obj->jute_mill_issue_no  = $objCode->code;
                            $millIssue_obj->item_id = $request->item_id[$detial_index];
                            $millIssue_obj->item_categorie_id = $request->item_categorie_id[$detial_index];
                            $millIssue_obj->issue_date = $request->date_pledge_return;
                            $millIssue_obj->inventory =  $request->jute_receive_id[$detial_index];
                            // $millIssue_obj->inventory_items
                            $millIssue_obj->unit_type = $request->unit_type[$detial_index];
                            $millIssue_obj->sub_unit_type = $request->sub_unit_type[$detial_index];
                            $millIssue_obj->quantity = $request->quantity[$detial_index];
                            $millIssue_obj->sub_unit_quantity = $request->sub_unit_quantity[$detial_index];
                            $millIssue_obj->total_quantity = $request->totalsub_unit_quantity;
                            $millIssue_obj->stock_in_hand = $request->sub_unit_type[$detial_index];
                            $millIssue_obj->user_id = Auth::user()->id;
             
                            $millIssue_obj->save();

                            // only Jute will be saved  in JMProductionline
                            $item_categorie_Name = Jutemillitem::find($millIssue_obj->item_id);
                            if ($item_categorie_Name->item_name == "Jute") {
                                 
                                $jmProductionline_obj = new JMProductionline();
                                
                                $millIssue_obj->save();
                            }
                            


                            $inventoryUpdate = Jutemillinventory::find( $millIssue_obj->inventory);
                            $inventoryUpdate->isInStock = 0;
                            $inventoryUpdate->save();
                        
                   
                     }
                 }
        
        return redirect()->route(config('laraadmin.adminRoute') . '.millissues.index');
    }

    /**
     * Display the specified millissue.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $millissue = MillIssue::find($id);
        $module = Module::get('MillIssues');
        $module->row = $millissue;
        return view('la.millissues.show', [
            'module' => $module,
            'view_col' => $this->view_col,
            'no_header' => true,
            'no_padding' => "no-padding"
        ])->with('millissue', $millissue);
    }

    /**
     * Show the form for editing the specified millissue.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $millissue = MillIssue::find($id);
        
        $module = Module::get('MillIssues');
        
        $module->row = $millissue;
        
        return view('la.millissues.edit', [
            'module' => $module,
            'view_col' => $this->view_col,
        ])->with('millissue', $millissue);
    }

    /**
     * Update the specified millissue in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = Module::validateRules("MillIssues", $request);
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();;
        }
        
        $insert_id = Module::updateRow("MillIssues", $request, $id);
        
        return redirect()->route(config('laraadmin.adminRoute') . '.millissues.index');
    }

    /**
     * Remove the specified millissue from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MillIssue::find($id)->delete();
        // Redirecting to index() method
        return redirect()->route(config('laraadmin.adminRoute') . '.millissues.index');
    }
    
    /**
     * Datatable Ajax fetch
     *
     * @return
     */
    public function dtajax()
    {
        $users = DB::table('millissues')->select($this->listing_cols);
        $out = Datatables::of($users)->make();
        $data = $out->getData();
        
        for($i=0; $i<count($data->data); $i++) {
            for ($j=0; $j < count($this->listing_cols); $j++) { 
                $col = $this->listing_cols[$j];
                if($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/millissues/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            if($this->show_action) {
                $output = '<a href="'.url(config('laraadmin.adminRoute') . '/millissues/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.millissues.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
                $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                $output .= Form::close();
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }
}
