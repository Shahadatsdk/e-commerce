<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Session;

Session_start();

class AdminController extends Controller
{

	// admin login page
    public function index(){
    	return view('admin_login');
    }
 

    // admin login check
    public function dashboard(Request $request){
    	$admin_email = $request->admin_email;
    	$admin_password = $request->admin_password;

    	$result = DB::table('admin_tbl')
		    	->where('admin_email',$admin_email)
		    	->where('admin_password',$admin_password)
		    	->first();

		 if( $result ){
		 	session::put('admin_name',$result->admin_name);
		 	session::put('admin_id',$result->admin_id);
		 	return Redirect::to('/dashboard');
		 }else{
		 	session::put('message','Email or Password Invalid');
		 	return Redirect::to('/admin');
		 }
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
