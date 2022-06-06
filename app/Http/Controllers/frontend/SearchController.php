<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //
    public function SearchProduct(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;		 

		$products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thambnail')->limit(5)->get();
		return view('client.product.search_product',compact('products'));	} 
}
