<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    //

    public function index($id,Request $request){

        $product = Product::findOrFail($id);
        $categories = Category::all();
        $imageCollections = ProductImage::where('product_id',$id)->get();
        $productCategs = Product::where('category_id',$product->category_id)->limit(6)->get();
        $HotDeals = Product::where('hot_deals','1')->whereNotNull('discount_price')->orderBy('id','DESC')->limit(3)->get();

        $reviews = Review::inRandomOrder()
                           ->where('status','Valid')
                           ->limit(5)
                           ->get();;


        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }
        
        return view('client.details.details',compact('product','categories','imageCollections','productCategs','HotDeals','admin','reviews'));
    }
}
