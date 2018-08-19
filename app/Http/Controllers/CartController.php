<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Cart;

use Session;

Session_start();

class CartController extends Controller
{
    
	// add to cart
	public function add_to_cart(Request $request){

		$qty = $request->qty;

		$product_id = $request->product_id;

		$product_info = DB::table('product_tbl')->where('product_id',$product_id)->first();

		$data['qty'] = $qty;
		$data['id']	= $product_info->product_id;
		$data['name']	= $product_info->product_name;
		$data['price']	= $product_info->product_price;
		$data['options']['image']  = $product_info->product_image;

		Cart::add($data);
		return Redirect::to('/show_cart');

	}


	// show cart
	public function show_cart(){

		$all_published_category = DB::table('category_tbl')->where('publication_status',1)->get();

		$manage_published_product = view('pages.add_to_cart')->with('all_published_category',$all_published_category);

        return view('layout')->with('pages.add_to_cart',$manage_published_product);
	}


	// delete cart
	public function delete_to_cart($rowId){

		Cart::update($rowId,0);
		return Redirect::to('/show_cart');

	}


	// update cart
	public function update_to_cart(Request $request){

		$qty = $request->quantity;
		$rowId = $request->rowId;

		Cart::update($rowId,$qty);
		return Redirect::to('/show_cart');

	}


	// manage order
	public function manage_order(){

		$all_order_info = DB::table('order_tbl')
        				   ->join('customer_tbl','order_tbl.customer_id','=','customer_tbl.customer_id')	
                           ->select('order_tbl.*','customer_tbl.customer_name')
        				   ->get();

        $manage_order = view('admin.manage_order')->with('all_order_info',$all_order_info);
        return view('admin_layout')->with('manage_order',$manage_order);

	}



	// view order
	public function view_order($order_id){

		$order_by_id = DB::table('order_tbl')
        				   ->join('customer_tbl','order_tbl.customer_id','=','customer_tbl.customer_id')	
        				   ->join('order_details_tbl','order_tbl.order_id','=','order_details_tbl.order_id')	
        				   ->join('shipping_tbl','order_tbl.shipping_id','=','shipping_tbl.shipping_id')	
                           ->select('order_tbl.*','order_details_tbl.*','shipping_tbl.*','customer_tbl.*')
        				   ->get();

        $view_order = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('view_order',$view_order);

	}

}
