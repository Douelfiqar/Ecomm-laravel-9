<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    

    public function addCart($id,Request $request){

        $produit = Product::find($id);

        if($produit->discount_price == NULL){
            Cart::add([
                'id'=>$id,
                'name'=>$request->product_name,
                'qty' => $request->qty,
                'price'=> $produit->selling_price,
                'weight'=>1,
                'options'=>[
                    'image'=>$produit->product_thambnail,
                    'color'=>$request->color,
                    'size'=>$request->size
                ]
                ]);
        }else{
            Cart::add([
                'id'=>$id,
                'name'=>$request->product_name,
                'qty' => $request->qty,
                'price'=> $produit->discount_price,
                'weight'=>1,
                'options'=>[
                    'image'=>$produit->product_thambnail,
                    'color'=>$request->color,
                    'size'=>$request->size
                ]
                ]);
        }
        

            return response()->json(['success'=>$produit->selling_price]);
    }


    public function getMiniCart(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
    
        return response()->json(array(
            'carts'=>$carts,
            'cartQty'=>$cartQty,
            'cartTotal'=>round($cartTotal)
        ));
    
    }

    public function removeMiniCart($rowId){

        Cart::remove($rowId);

        return response()->json(['success'=>'remove success']);
    }

    public function addToCartDetails($id,Request $request){


        $produit = Product::find($id);

       
            Cart::add([
                'id'=>$id,
                'name'=>$produit->product_name_en,
                'qty' => $request->qty,
                // $request->qty
                'price'=> $produit->selling_price,
                'weight'=>1,
                'options'=>[
                    'image'=>$produit->product_thambnail,
                    'color'=>$request->color,
                    // $request->color
                    'size'=>$request->size
                    // $request->size
                ]
                ]);
      

            return response()->json(['success'=>$produit]);

            
                                            
    }

}
