<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CommandeLigne;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    //

    public function dataOrder(Request $request){
        
        $order = new Order();

        $order->id_client = Auth::id();
        $total = Cart::total();
        $order->priceTotal = $total;
        $order->save();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->address = $request->country;
        $order->country = $request->city;
        $order->city = $request->code_postal;
        $order->code_postale = $request->code_postale;
        $order->phone_number = $request->phone_number;



        $order->payement_methode = $request->Payement;

        $order->save();
        
        $cardSession = Cart::content();

        foreach( $cardSession as  $card){
            $commandeLigne = new CommandeLigne();
            $commandeLigne->order_id = $order->id;
            $commandeLigne->product_id =  $card->id;
            $commandeLigne->quantity =  $card->qty;
            $commandeLigne->color =  $card->options->color;
            $commandeLigne->size =  $card->options->size;

            $commandeLigne->save();
        }        

        Cart::destroy();

        return redirect()->route('profile.trackOrder');
    }

    public function trackOrder(Request $request){


        $user = Auth::user();

        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }

        $categories = Category::all();
      

        return view('client.order.trackOrder',compact('user','admin','categories'));
    }

    public function getorders(){

        $orders = Order::where('id_client',Auth::user()->id)->latest()->paginate(7);

        return response()->json(['order' => $orders]);
    }

    public function cancelOrder($id){

        $order = Order::find($id);
        $order->delete();

        return response()->json(['cancel','successfully']);
    }
}
