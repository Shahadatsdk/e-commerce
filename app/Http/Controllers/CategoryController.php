<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Session;

Session_start();

class CategoryController extends Controller
{

	// add category
    public function index(){
         $this->AdminAuthCheck();
    	return view('admin.add_category');
    }


    // save category
    public function save_category(Request $request){

    	$data = array();

    	$data['category_name'] = $request->category_name;

    	$data['category_description'] = $request->category_description;

    	$data['publication_status'] = $request->publication_status;

    	$result = DB::table('category_tbl')->insert($data);

    	Session::put('message','Category Insert Successfully');

		return Redirect::to('/add_category');

    }


    
    // all category
    public function all_category(){
         $this->AdminAuthCheck();
        $all_category_info = DB::table('category_tbl')->get();

        $manage_category = view('admin.all_category')->with('all_category_info',$all_category_info);

        return view('admin_layout')->with('all_category',$manage_category);

    }



    // unactive category
    public function unactive_category($category_id){

        DB::table('category_tbl')

                ->where('category_id',$category_id)

                ->update(['publication_status'=>0]);

        Session::put('message','Category Unactive Successfully !!');

        return Redirect::to('all_category');
    }


    // active category
    public function active_category($category_id){

        DB::table('category_tbl')

                ->where('category_id',$category_id)

                ->update(['publication_status'=>1]);

        Session::put('message','Category Active Successfully !!');

        return Redirect::to('all_category');
    }


    // edit category
    public function edit_category($category_id){

        // Session::get('category_id');

        $category_info = DB::table('category_tbl')
                        ->where('category_id',$category_id)
                        ->first();

        $manage_category_info = view('admin.edit_category')->with('category_info',$category_info);

        return view('admin_layout')->with('edit_category',$manage_category_info);

        // return view('admin.edit_category');
    }


    // update category
    public function update_category(Request $request,$category_id){

        $data = array();

        $data['category_name'] = $request->category_name;

        $data['category_description'] = $request->category_description;

        DB::table('category_tbl')->where('category_id',$category_id)
                                 ->update($data);

        Session::put('message','Category Updated Successfully');

        return Redirect::to('all_category');     


    }


    // delete category
    public function delete_category($category_id){

        DB::table('category_tbl')->where('category_id',$category_id)->delete();

        Session::put('message','Category Deleted Successfully');

        return Redirect::to('all_category');

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
