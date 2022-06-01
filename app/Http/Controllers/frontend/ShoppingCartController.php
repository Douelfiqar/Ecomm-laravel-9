<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartController extends Controller
{
    //

    public function indexShopping(){

        $users = User::all();
        $categories = Category::all();
        $carts = Cart::content();
        return view('client.shoppingCart.shopping-cart',compact('users','categories','carts'));
    }

    public function getCart(){
        $carts = Cart::content();
        
        return response()->json(['response'=>$carts]);
    }

    public function totalCart(){
        $cartTotal = Cart::total();
        return response()->json(['response'=>$cartTotal]);
    }
    
    public function removeIteam($rowId){

        Cart::remove($rowId);
        return response()->json(['success','remove whit success']);
    }

    public function updateQuantiter($rowId,$qty){

        Cart::update($rowId, ['qty'  => $qty]);

        return response()->json(['response'=>'update success']);
    }

}
