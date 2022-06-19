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
        $ProductFiltreds = Product::where('subsubcategory_id',$id)->where('status',1)->paginate(3);
        $subCategories = SubCategory::all();
        $subsubCategorties = $id;
        

        $admin = false;

        if(Auth::check()){
            $userR = $request->user()->roles()->get();
            foreach($userR as $u){
                if($u->name == 'admin' || $u->name == 'SUPERADMIN'){
                    $admin = true;
                }  
            }
        }
$iteams = NULL;

        if($request->listOfproduct){
            $iteams = $request->listOfproduct;

            $ProductFiltreds = Product::where('product_name_en','LIKE',"%$iteams%")->where('status',1)->paginate(9);
            // dd($request->listOfproduct);

        }



        if ($request->ajax()) {
         
            $list_view = view('client.category.list_view_product',compact('ProductFiltreds'))->render();

            $grid_view = view('client.category.list_view_grid_product',compact('ProductFiltreds'))->render();

             return response()->json(['grid_view' => $grid_view,'list_view'=>$list_view]);
        }

        return view('client.category.category',compact('ProductFiltreds','categories','subCategories','admin','subsubCategorties','iteams'));
    }

    public function order($orderBy,$subsub,Request $request){

        $searchValue = $request->List;
if($searchValue == 'false'){
    if($orderBy == 'byName'){
        $ProductFiltreds = Product::where('subsubcategory_id',$subsub)->where('status',1)->orderBy('product_name_en','ASC')->paginate(9);
    }else if($orderBy == 'low'){
        $ProductFiltreds = Product::where('subsubcategory_id',$subsub)->where('status',1)->orderBy('price')->paginate(9);
    }else{
        $ProductFiltreds = Product::where('subsubcategory_id',$subsub)->where('status',1)->orderByDesc('price')->paginate(9);
    }

}else{
    $iteams = $request->SearchVal;

    if($orderBy == 'byName'){
        $ProductFiltreds = Product::where('product_name_en','LIKE',"%$iteams%")->where('status',1)->orderBy('product_name_en','ASC')->paginate(16);
    }else if($orderBy == 'low'){
        $ProductFiltreds = Product::where('product_name_en','LIKE',"%$iteams%")->where('status',1)->orderBy('price')->paginate(12);
    }else{
        $ProductFiltreds = Product::where('product_name_en','LIKE',"%$iteams%")->where('status',1)->orderByDesc('price')->paginate(12);
    }
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
