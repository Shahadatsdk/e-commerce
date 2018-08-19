<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Cart;

use Session;

Session_start();

class CheckoutController extends Controller
{
   
	// login
	public function customer_login(Request $request){

		$customer_email = $request->customer_email;
		$password = $request->password;
		$result = DB::table('customer_tbl')->where('customer_email',$customer_email)->where('password',$password)->first();

		if( $result ){
			Session::put('customer_id',$result->customer_id);
			return Redirect::to('/checkout');
		}else{
			return Redirect::to('/login_check');
		}

	}

	// login check
	public function login_check(){
		return view('pages.login');
	}


	// customer registration
	public function customer_registration(Request $request){

		$data  = array();
		$data['customer_name'] = $request->customer_name;
		$data['customer_email'] = $request->customer_email;
		$data['password'] = $request->password;
		$data['mobile_number'] = $request->mobile_number;

		$customer_id = DB::table('customer_tbl')->insertGetId($data);
		Session::put('customer_id',$customer_id);
		Session::put('customer_name',$request->customer_name);

		return Redirect('/checkout');

	}

	// checkout
	public function checkout(){

		return view('pages.checkout');

	}

	// save shipping
	public function save_shipping(Request $request){

		$data = array();
		$data['shipping_email'] = $request->shipping_email;
		$data['shipping_first_name'] = $request->shipping_first_name;
		$data['shipping_last_name'] = $request->shipping_last_name;
		$data['shipping_address'] = $request->shipping_address;
		$data['shipping_mobile_number'] = $request->shipping_mobile_number;
		$data['shipping_city'] = $request->shipping_city;

		$shipping_id = DB::table('shipping_tbl')->insertGetId($data);
		Session::put('shipping_id',$shipping_id);
		return Redirect::to('/payment');

	}



	// payment
	public function payment(){

		return view('pages.payment');

	}


	// logout
	public function customer_logout(){
		Session::flush();
		return Redirect::to('/');
	}



	// order place
	public function order_place(Request $request){

		$payment_gateway = $request->payment_method;
		
		$payment_data = array();

		$payment_data['payment_method'] = $payment_gateway;
		$payment_data['payment_status'] = 'pending';

		$payment_id = DB::table('payment_tbl')->insertGetId($payment_data);

		$order_data = array();

		$order_data['customer_id'] = Session::get('customer_id');
		$order_data['shipping_id'] = Session::get('shipping_id');
		$order_data['payment_id'] = $payment_id;
		$order_data['order_total'] = Cart::total();
		$order_data['order_status'] = 'pending';

		$order_id = DB::table('order_tbl')->insertGetId($order_data);

		$contents = Cart::content();
		$order_details_data = array();


		foreach ($contents as $v_content) {
			
			$order_details_data['order_id'] = $order_id;
			$order_details_data['product_id'] = $v_content->id;
			$order_details_data['product_name'] = $v_content->name;
			$order_details_data['product_price'] = $v_content->price;
			$order_details_data['product_sales_quantity'] = $v_content->qty;

			DB::table('order_details_tbl')->insert($order_details_data);
		}

		// echo "<pre>";
		// print_r($contents);
		// echo "</pre>";

		if( $payment_gateway == 'handcash' ){
			// echo "Successfully Done By Handcash";
			Cart::destroy();
			return view('pages.handcash');

		}elseif ( $payment_gateway == 'bkash' ) {
			echo "Successfully Done By Bkash";
		}elseif ( $payment_gateway == 'paypal' ) {
			echo "Successfully Done By Paypal";
		}elseif ($payment_gateway == 'payza' ) {
			echo "Successfully Done By Payza";
		}else {
			echo "Not Selected";
		}
 	


	}

	
}
