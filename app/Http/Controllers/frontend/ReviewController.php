<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function index($id,Request $request){

        $product = Product::findOrFail($id);
        $categories = Category::all();
        $imageCollections = ProductImage::where('product_id',$id)->get();
        $productCategs = Product::where('category_id',$product->category_id)->where('status',1)->limit(6)->get();
        $HotDeals = Product::where('hot_deals','1')->whereNotNull('discount_price')->orderBy('id','DESC')->limit(3)->get();

      

        $admin = false;
        if(Auth::check()){
            $userR = $request->user()->roles()->get();

            foreach($userR as $u){
                if($u->name == 'admin' || $u->name == 'SUPERADMIN'){
                    $admin = true;
                }  
            }
        }
        
        $reviews = Review::inRandomOrder()
        ->where('status','Valid')
        ->limit(5)
        ->get();
        return view('client.details.details',compact('product','categories','imageCollections','productCategs','HotDeals','admin','reviews'));
    }

    public function getReviews($id){
        
        $reviews = Review::inRandomOrder()
        ->where('status','Valid')
        ->where('product_id',$id)
        ->limit(5)
        ->get();

        return response()->json(['reviews'=>$reviews]);
    }


    public function addReview($id,Request $request){
        
        $review = new Review();

        $review->summary = $request->summary;
        $review->comment = $request->comment;
        $review->product_id = $id;
        $id = Auth::user()->id;
        $review-> user_id = $id;
        $user = User::find($id);
        $review->user_name = $user->name;
        $review->picture_path = $user->profile_photo_path;

        $review->save();

        return response()->json(['data'=>'data']);
    }
}
