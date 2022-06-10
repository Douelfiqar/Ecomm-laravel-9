<?php

namespace App\Http\Controllers\frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryClientController extends Controller
{
    

    public function filterCategory($id,Request $request){
        $categories = Category::all();
        $ProductFiltreds = Product::where('subsubcategory_id',$id)->paginate(3);
        $subCategories = SubCategory::all();
        $subsubCategorties = $id;
        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }

        if ($request->ajax()) {
         

            $list_view = view('client.category.list_view_product',compact('ProductFiltreds'))->render();


            $grid_view = view('client.category.list_view_grid_product',compact('ProductFiltreds'))->render();


             return response()->json(['grid_view' => $grid_view,'list_view'=>$list_view]);	
         
                 }

        return view('client.category.category',compact('ProductFiltreds','categories','subCategories','admin','subsubCategorties'));
    }

    public function order($orderBy,$subsub){

        if($orderBy == 'byName'){
            $ProductFiltreds = Product::where('subsubcategory_id',$subsub)->orderBy('product_name_en','ASC')->paginate(3);
        }
        return response()->json(['ProductFiltreds'=>$ProductFiltreds]);
    }


    public function modelCategory($id){
        $product = Product::find($id);
        $brand = Brand::find($product->brand_id);
        $category = Category::find($product->category_id);

        $color = $product->product_color_en;
        $colorARRAY = explode(',',$color);

        $size = $product->product_size_en;
        $sizeARRAY = explode(',',$size);

        $price = $product->selling_price;

        if($product->discount_price){
            $price = $product->discount_price;
        }
        $iteam = 'NULL';
        $carts = Cart::content();
        foreach($carts as $cart){
            if($cart->id == $id){
                $iteam = $cart;
            }
        }
        //$selectedColor = $cart->options->color;
        // $selectedSize = $cart->options->size;
        // $selectedqty = $cart->qty;

        return response()->json(array(
            'product' => $product,
            'colorARRAY' => $colorARRAY,
            'sizeARRAY' => $sizeARRAY,
            'brand_name' => $brand->brand_name_en,
            'category_name' => $category->category_name_en,
            'price' => $price,
            'cart'=>$iteam
        ));
    }
}
