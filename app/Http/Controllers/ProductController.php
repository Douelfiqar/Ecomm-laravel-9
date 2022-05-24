<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    //
    public function allProduct(){

        $user = Auth::user();
        $Brands = Brand::latest()->get();
        $Categories = Category::latest()->get();
        $SubCategories = SubCategory::latest()->get();
        $SubSubCategories = SubSubCategory::latest()->get(); 
        return view('admin.Product.products',compact('user','Categories','Brands','SubCategories','SubSubCategories'));
    }

    public function addProduct(Request $request){

        
        $validated = $request->validate([
            'BrandId' => 'required',
            'categorieId' => 'required',
            'SubCategorieId' => 'required',
            'SubSubCategorieId' => 'required',
            'product_name_en' => 'required',
            'product_name_fr' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_fr' => 'required',
            'product_color_en' => 'required',
            'product_color_fr' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'product_thambnail' => 'required',

            'short_desc_en' => 'required',
            'short_desc_fr' => 'required',
            'long_desc_en' => 'required',
            'long_desc_fr' => 'required',
            'hot_deals' => 'required',
            'special_offer' => 'required',
            'featured' => 'required',
            'special_deals' => 'required',

        ]);
       
    }

    public function ajaxCategoryProduct(Request $request){

        $Category = $request->text;
        $ajaxSubCategory = SubCategory::where('category_id',$request->text) -> first();

        return response()->json(['result' => $ajaxSubCategory]);
    }

    public function ajaxSubCategoryProduct(Request $request){

        $SubCategory = $request->text;
        $ajaxSubSubCategory = SubSubCategory::where('sub_category_id',$SubCategory)->first();

        return response()->json(['result' => $ajaxSubSubCategory]);  
    }
}
