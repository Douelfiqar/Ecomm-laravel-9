<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartController extends Controller
{
    //

    public function indexShopping(Request $request){

        $users = User::all();
        $categories = Category::all();
        $carts = Cart::content();

        $userR = $request->user()->roles()->get();

        $admin = false;
        if(Auth::check()){
            foreach($userR as $u){
                if($u->name == 'admin' || $u->name == 'SUPERADMIN'){
                    $admin = true;
                }  
            }
        }


        return view('client.shoppingCart.shopping-cart',compact('users','categories','carts','admin'));
    }

    public function getCart(){
        $carts = Cart::content();
        
        $subTotal = Cart::total();
        return response()->json(['response'=>$carts,'total'=>$subTotal]);
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
