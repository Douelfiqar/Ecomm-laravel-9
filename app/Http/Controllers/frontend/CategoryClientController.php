<?php

namespace App\Http\Controllers\frontend;

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
}
