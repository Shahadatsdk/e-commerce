<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use DB;

use Session;

Session_start();


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_published_product = DB::table('product_tbl')
                           ->join('category_tbl','product_tbl.category_id','=','category_tbl.category_id')  
                           ->join('manufacture_tbl','product_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')  
                           ->select('product_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')
                           ->where('product_tbl.publication_status',1)
                           ->limit(9)
                           ->get();
                           // echo "<pre>";
                           // print_r($all_product_info);
                           // echo "</pre>";
                           // exit();
        $manage_published_product = view('pages.home_content')->with('all_published_product',$all_published_product);

        return view('layout')->with('pages.home_content',$manage_published_product);
    }


    // Show product by category
    public function show_product_by_category($category_id){
        $product_by_category = DB::table('product_tbl')
                           ->join('category_tbl','product_tbl.category_id','=','category_tbl.category_id')   
                           ->select('product_tbl.*','category_tbl.category_name')
                           ->where('category_tbl.category_id',$category_id)
                           ->where('product_tbl.publication_status',1)
                           ->limit(18)
                           ->get();
                           // echo "<pre>";
                           // print_r($all_product_info);
                           // echo "</pre>";
                           // exit();
        $manage_product_by_category = view('pages.category_by_products')->with('product_by_category',$product_by_category);

        return view('layout')->with('pages.category_by_products',$manage_product_by_category);
    }


    // Show product by manufacture
    public function show_product_by_manufacture($manufacture_id){
        $product_by_manufacture = DB::table('product_tbl')
                           ->join('category_tbl','product_tbl.category_id','=','category_tbl.category_id')   
                           ->join('manufacture_tbl','product_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')
                           ->select('product_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')
                           ->where('manufacture_tbl.manufacture_id',$manufacture_id)
                           ->where('product_tbl.publication_status',1)
                           ->limit(15)
                           ->get();
        $manage_product_by_manufacture = view('pages.manufacture_by_products')->with('product_by_manufacture',$product_by_manufacture);

        return view('layout')->with('pages.manufacture_by_products',$manage_product_by_manufacture);
    }


    //Product Details by id
    public function product_details_by_id($product_id){
        $product_by_details = DB::table('product_tbl')
                           ->join('category_tbl','product_tbl.category_id','=','category_tbl.category_id')   
                           ->join('manufacture_tbl','product_tbl.manufacture_id','=','manufacture_tbl.manufacture_id')
                           ->select('product_tbl.*','category_tbl.category_name','manufacture_tbl.manufacture_name')
                           ->where('product_tbl.product_id',$product_id)
                           ->where('product_tbl.publication_status',1)
                           ->limit(15)
                           ->first();
        $manage_product_by_details = view('pages.product_details')->with('product_by_details',$product_by_details);

        return view('layout')->with('pages.product_details',$manage_product_by_details);
    }
    
}
  