<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB ;
use Datatables;
use Redirect;
use Illuminate\Support\Facades\Input;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;


class QueryController extends Controller{


public function modulesearch()

{
$searchterm = Input::get('searchinput');

if ($searchterm){

    $modules = DB::table('modules');            
    $results = $modules->where('name', 'LIKE', '%'. $searchterm .'%')
    ->get();

    return view('search')->with('results', $results);   

    // return Redirect::route(config('laraadmin.adminRoute') . '.modules.index', array('results' => $results));             

     }
 }

 // public function modulesearch()
 //        {
 //            //get keywords input for search
 //            $keyword=  Input::get('q');

 //            //search that student in Database
 //             $modules= Module::find($keyword);

 //            return Redirect::route(config('laraadmin.adminRoute') . '.modules.index', array('module' => $modules));
 //        }

   

}

 ?>