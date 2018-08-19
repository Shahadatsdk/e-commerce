<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Session;

Session_start();

class ProductController extends Controller
{
   // index page
	public function index(){
        $this->AdminAuthCheck();
		return view('admin.add_product');
	}


	// save product
	public function save_product(Request $request){

		$data = array();

    	$data['product_name'] = $request->product_name;

    	$data['category_id'] = $request->category_id;

    	$data['manufacture_id'] = $request->manufacture_id;

    	$data['product_short_description'] = $request->product_short_description;

    	$data['product_long_description'] = $request->product_long_description;

    	$data['product_price'] = $request->product_price;

    	$data['product_size'] = $request->product_size;

    	$data['product_color'] = $request->product_color;

    	$data['publication_status'] = $request->publication_status;

    	$image = $request->file('product_image');

		if($image){
			$image_name = str_random(20);
			$ext = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$ext;
			$upload_path = 'image/';
			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path,$image_full_name);
			if($success){
				$data['product_image'] = $image_url;
				DB::table('product_tbl')->insert($data);
				Session::put('message','Product Insert Successfully');
				return Redirect::to('/add_product');
			}
		}

		$data['product_image'] = '';
    	$result = DB::table('product_tbl')->insert($data);
    	Session::put('message','Product Insert Successfully Without Image');
		return Redirect::to('/add_product');

	}


	  // all product
    public function all_product(){
         $this->AdminAuthCheck();
        $all_product_info = DB::table('product_tbl')
        				   ->join('category_tbl','product_tbl.category_id','=','category_tbl.category_id')	
        				   ->join('manufacture_tbl','product_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')	
                           ->select('product_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')
        				   ->get();
        				   // echo "<pre>";
        				   // print_r($all_product_info);
        				   // echo "</pre>";
        				   // exit();
        $manage_product = view('admin.all_product')->with('all_product_info',$all_product_info);

        return view('admin_layout')->with('all_product',$manage_product);

    }


      // unactive product
    public function unactive_product($product_id){

        DB::table('product_tbl')

                ->where('product_id',$product_id)

                ->update(['publication_status'=>0]);

        Session::put('message','Product Unactive Successfully !!');

        return Redirect::to('all_product');
    }


    // active product
    public function active_product($product_id){

        DB::table('product_tbl')

                ->where('product_id',$product_id)

                ->update(['publication_status'=>1]);

        Session::put('message','Product Active Successfully !!');

        return Redirect::to('all_product');
    }


    // delete category
    public function delete_product($product_id){

        DB::table('product_tbl')->where('product_id',$product_id)->delete();

        Session::put('message','Product Deleted Successfully');

        return Redirect::to('all_product');

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
