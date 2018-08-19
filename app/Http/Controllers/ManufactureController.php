<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Session;

Session_start();

class ManufactureController extends Controller
{
    // index page
	public function index(){
        $this->AdminAuthCheck();
		return view('admin.add_manufacture');

	}


	// save manufacture
	public function save_manufacture(Request $request){

		$data = array();

    	$data['manufacture_name'] = $request->manufacture_name;

    	$data['manufacture_description'] = $request->manufacture_description;

    	$data['publication_status'] = $request->publication_status;

    	$result = DB::table('manufacture_tbl')->insert($data);

    	Session::put('message','Manufacture Insert Successfully');

		return Redirect::to('/add_manufacture');

	}


	// all manufacture
    public function all_manufacture(){
         $this->AdminAuthCheck();
        $all_manufacture_info = DB::table('manufacture_tbl')->get();

        $manage_manufacture = view('admin.all_manufacture')->with('all_manufacture_info',$all_manufacture_info);

        return view('admin_layout')->with('all_manufacture',$manage_manufacture);

    }


    // unactive manufacture
    public function unactive_manufacture($manufacture_id){

    	DB::table('manufacture_tbl')
    			 ->where('manufacture_id',$manufacture_id)
    			 ->update(['publication_status'=>0]);

    	Session::put('message','Manufacture Unactive Successfully !!');

        return Redirect::to('all_manufacture');		 

    }


    // active manufacture
    public function active_manufacture($manufacture_id){

    	DB::table('manufacture_tbl')
    			 ->where('manufacture_id',$manufacture_id)
    			 ->update(['publication_status'=>1]);

    	Session::put('message','Manufacture Active Successfully !!');

        return Redirect::to('all_manufacture');		 

    }


    // edit manufacture
    public function edit_manufacture($manufacture_id){

    	$manufacture_info = DB::table('manufacture_tbl')
                        ->where('manufacture_id',$manufacture_id)
                        ->first();

        $manage_manufacture_info = view('admin.edit_manufacture')->with('manufacture_info',$manufacture_info);

        return view('admin_layout')->with('edit_manufacture',$manage_manufacture_info);

    }


    // update manufacture
    public function update_manufacture(Request $request,$manufacture_id){

    	$data = array();

    	$data['manufacture_name'] = $request->manufacture_name;

    	$data['manufacture_description'] = $request->manufacture_description;

    	$result = DB::table('manufacture_tbl')->where('manufacture_id',$manufacture_id)
    										  ->update($data);
  		Session::put('message','Manufacture Updated Successfully');

  		return Redirect::to('all_manufacture');

    }

    // delete category
    public function delete_manufacture($manufacture_id){

        DB::table('manufacture_tbl')->where('manufacture_id',$manufacture_id)->delete();

        Session::put('message','Manufacture Deleted Successfully');

        return Redirect::to('all_manufacture');

    }


       public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            Return Redirect::to('/admin')->send();
        }
    }
}
