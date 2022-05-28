<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    //

    public function index($id){

        $product = Product::findOrFail($id);
        $categories = Category::all();
        $imageCollections = ProductImage::where('product_id',$id)->get();
        $productCategs = Product::where('category_id',$product->category_id)->limit(6)->get();
        $HotDeals = Product::where('hot_deals','1')->whereNotNull('discount_price')->orderBy('id','DESC')->limit(3)->get();
        
        return view('client.details.details',compact('product','categories','imageCollections','productCategs','HotDeals'));
    }
}
