<?php

namespace App\Http\Controllers\frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class CategoryClientController extends Controller
{
    //

    public function indexCategory(){
        $categories = Category::all();
        return view('client.category.category',compact('categories'));
    }

    public function filterCategory($id){
        $categories = Category::all();
        $ProductFiltreds = Product::where('subsubcategory_id',$id)->paginate(9);
        $subCategories = SubCategory::all();
        return view('client.category.category',compact('ProductFiltreds','categories','subCategories'));
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
        return response()->json(array(
            'product' => $product,
            'colorARRAY' => $colorARRAY,
            'sizeARRAY' => $sizeARRAY,
            'brand_name' => $brand->brand_name_en,
            'category_name' => $category->category_name_en,
            'price' => $price

        ));
    }
}
