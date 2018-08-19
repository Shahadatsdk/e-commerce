<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Session;

Session_start();

class SliderController extends Controller
{
    // add slider
    public function index(){
         $this->AdminAuthCheck();
    	return view('admin.add_slider');
    }


    // save slider
	public function save_slider(Request $request){

	$data['publication_status'] = $request->publication_status;
		
    $image = $request->file('slider_image');

		if($image){
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'image/';
			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path,$image_full_name);
			if($success){
				$data['slider_image'] = $image_url;
				DB::table('slider_tbl')->insert($data);
				Session::put('message','Slider Insert Successfully');
				return Redirect::to('/add_slider');
			}
		}

		$data['slider_image'] = '';
    	$result = DB::table('slider_tbl')->insert($data);
    	Session::put('message','Slider Insert Successfully Without Image');
		return Redirect::to('/add_slider');
	}


	// all slider
    public function all_slider(){
         $this->AdminAuthCheck();
        $all_slider_info = DB::table('slider_tbl')->get();

        $manage_slider = view('admin.all_slider')->with('all_slider_info',$all_slider_info);

        return view('admin_layout')->with('all_slider',$manage_slider);

    }


    // unactive slider
    public function unactive_slider($slider_id){

        DB::table('slider_tbl')

                ->where('slider_id',$slider_id)

                ->update(['publication_status'=>0]);

        Session::put('message','Slider Unactive Successfully !!');

        return Redirect::to('all_slider');
    }


    // active slider
    public function active_slider($slider_id){

        DB::table('slider_tbl')

                ->where('slider_id',$slider_id)

                ->update(['publication_status'=>1]);

        Session::put('message','Slider Active Successfully !!');

        return Redirect::to('all_slider');
    }


    // delete slider
    public function delete_slider($slider_id){

        DB::table('slider_tbl')->where('slider_id',$slider_id)->delete();

        Session::put('message','Slider Deleted Successfully');

        return Redirect::to('all_slider');

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
