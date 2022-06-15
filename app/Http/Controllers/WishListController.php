<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    //

    public function index(Request $request){
        
        $users = User::all();
        $categories = Category::all();

        $userR = $request->user()->roles()->get();

        $admin = false;
        if(Auth::check()){
            foreach($userR as $u){
                if($u->name == 'admin' || $u->name == 'SUPERADMIN'){
                    $admin = true;
                }  
            }
        }

        return view('client.wishList.list',compact('users','categories','admin'));
    }


    public function getWishListContent(){

        $content = WishList::where('user_id',Auth::user()->id)->get();
        
        return response()->json(['data'=>$content]);
    }

    public function addWishList($prodId){


        $violated = WishList::where('user_id',Auth::user()->id)->where('product_id',$prodId)->first();

        if(!$violated){

            $WishList = new WishList();

            $WishList->user_id = Auth::user()->id;
            $WishList->product_id = $prodId;
    
            $product = Product::where('id',$prodId)->first();
    
            $WishList->pic = $product->product_thambnail;
            $WishList->sellingPrice = $product->selling_price;
            $WishList->discountPrice = $product->discount_price;
            $WishList->nameProd = $product->product_name_en;
    
            $WishList->save();
        }
        

        return response()->json(['data'=>$violated]);
        
    }

    public function removeWishList($id){

        $product = WishList::where('product_id',$id)->delete();

        // $product->delete();

        return response()->json(['data'=>$product]);
    }
}
