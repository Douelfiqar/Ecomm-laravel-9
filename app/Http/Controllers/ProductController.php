<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    //
    public function addProductGet(){

        $user = Auth::user();
        $Brands = Brand::latest()->get();
        $Categories = Category::latest()->get();
        $SubCategories = SubCategory::latest()->get();
        $SubSubCategories = SubSubCategory::latest()->get(); 
        return view('admin.Product.products',compact('user','Categories','Brands','SubCategories','SubSubCategories'));
    }

    public function addProduct(Request $request){


        $validated = $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_fr' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_fr' => 'required',
            'product_color_en' => 'required',
            'product_color_fr' => 'required',
            'selling_price' => 'required',
            'product_thambnail' => 'required',
            'multi_img' => 'required',
            'short_desc_en' => 'required',
            'short_desc_fr' => 'required',
            'long_desc_en' => 'required',
            'long_desc_fr' => 'required',
        ]);
       
        $product = new Product();

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name_en = $request->product_name_en;
        $product->product_name_fr = $request->product_name_fr;
        $product->product_slug_en = strtolower(str_replace(' ',' -',$request->product_slug_en));
        $product->product_slug_fr = strtolower(str_replace(' ',' -',$request->product_slug_fr));

        $product->product_code = $request->product_code;
        $product->product_qty = $request->product_qty;

        $product->product_tags_en = $request->product_tags_en;
        $product->product_tags_fr = $request->product_tags_fr;

        $product->product_size_en = $request->product_size_en;
        $product->product_size_fr = $request->product_size_fr;

        $product->product_color_en = $request->product_color_en;
        $product->product_color_fr = $request->product_color_fr;

        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;

// images
        $file = $request->file('product_thambnail');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/productPhoto'),$filename);
        $product['product_thambnail'] = $filename;

        $product->short_desc_en = $request->short_desc_en;
        $product->short_desc_fr = $request->short_desc_fr;
        $product->long_desc_en = $request->long_desc_en;
        $product->long_desc_fr = $request->long_desc_fr;

        if($request->hot_deals)
        $product->hot_deals = 1;
        else{
            $product->hot_deals = 0;
        }

        if($request->featured)
        $product->featured = 1;
        else{
            $product->featured = 0;
        }

        if($request->special_offer)
        $product->special_offer = 1;
        else{
            $product->special_offer = 0;
        }

        if($request->special_deals)
        $product->special_deals = 1;
        else{
            $product->special_deals = 0;
        }

        $product->save();

        if($files = $request->file('multi_img')){
            $prod = Product::latest()->first();

            foreach($files as $file){
                $product_img = new ProductImage();
               
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/MultiProductPhoto'),$filename);
                $product_img['photo_name'] = $filename;
                $product_img->product_id = $prod->id;
                $product_img->save();
            }
        }
        // multi_img
        // dd($request);
return redirect()->back();
    }




    public function ajaxCategoryProduct(Request $request){

        $Category = $request->text;
        $ajaxSubCategory = SubCategory::where('category_id',$Category)->get();

        return response()->json(['result' => $ajaxSubCategory]);
    }

    public function ajaxSubCategoryProduct(Request $request){

        $SubCategory = $request->text;
        $ajaxSubSubCategory = SubSubCategory::where('sub_category_id',$SubCategory)->get();

        return response()->json(['result' => $ajaxSubSubCategory]);  
    }




    public function manageProduct(){

        $user = Auth::user();
        $Brands = Brand::latest()->get();
        $Categories = Category::latest()->get();
        $SubCategories = SubCategory::latest()->get();
        $SubSubCategories = SubSubCategory::latest()->get(); 
        $products = Product::latest()->get();

        
        return view('admin.Product.manageProduct',compact('user','Categories','Brands','SubCategories','SubSubCategories','products'));
    }


    public function getProduct(){

       
        $products = Product::paginate(15);

        return response()->json(['data'=>$products]);
    }

    public function deleteProduct($id){

        $product = Product::find($id);
        $product->delete();
        return response()->json(['data','deleted']);

    }






   public function updateProduct($id){
       $user = Auth::user();
    $product = Product::find($id);
    $Brands = Brand::latest()->get();
    $Categories = Category::latest()->get();
    $productMultiImages = ProductImage::where('product_id',$id)->get();
    return view('admin.Product.updateProduct',compact('product','Brands','Categories','user','productMultiImages'));
    }

    public function editProduct(Request $request){
        $id = $request->idProduct;

        $validated = $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_fr' => 'required',    
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_fr' => 'required',
            'product_color_en' => 'required',
            'product_color_fr' => 'required',
            'selling_price' => 'required',
            'short_desc_en' => 'required',
            'short_desc_fr' => 'required',
            'long_desc_en' => 'required',
            'long_desc_fr' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $filename = $product->product_thambnail;

        if($request->product_thambnail){
            unlink('upload/productPhoto/'.$filename);
            $file = $request->file('product_thambnail');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/productPhoto'),$filename);
        }

        
        if($request->hot_deals )
            $deals = 1;
        else{
            $deals = 0;
        }

        if($request->featured)
            $featuredVAR = 1;
        else{
            $featuredVAR = 0;
        }

        if($request->special_offer)
            $special_offerVAR = 1;
        else{
            $special_offerVAR = 0;
        }

        if($request->special_deals)
            $special_dealsVAR = 1;
        else{
            $special_dealsVAR = 0;
        }



        Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,

            'subsubcategory_id' => $request->subsubcategory_id, 
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'product_slug_en' => strtolower(str_replace(' ',' -',$request->product_slug_en)),
            'product_slug_fr' => strtolower(str_replace(' ',' -',$request->product_slug_fr)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,

            'product_tags_en' => $request->product_tags_en,
            'product_tags_fr' => $request->product_tags_fr,


            'product_size_en' => $request->product_size_en,
            'product_size_fr' => $request->product_size_fr,

            'product_color_en' => $request->product_color_en,
            'product_color_fr' => $request->product_color_fr,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'product_thambnail' => $filename,
            'hot_deals' => $deals,
            'featured' => $featuredVAR,
            'special_offer' => $special_offerVAR,
            'special_deals' => $special_dealsVAR
        ]);

        
        if($files = $request->file('multi_img')){
            $prod = Product::findOrFail($id);
            $product_img = ProductImage::where('product_id',$id);
            $product_img->delete();
            foreach($files as $file){
                    $product_img = new ProductImage();
                   
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('upload/MultiProductPhoto'),$filename);
                    $product_img['photo_name'] = $filename;
                    $product_img->product_id = $prod->id;
                    $product_img->save();
            }
        }

        $productImage = ProductImage::where('product_id',$id)->get();
        return redirect()->route('admin.manageProduct');
    }


    public function statusUpdate($id){

        
        $product = Product::find($id);

       
        if($product->status == '1'){
            $prodStatus = '0';
        }else{
            $prodStatus = '1';
        }

        $product->update([
                'status' => $prodStatus
        ]);

        return response()->json(['status','status updated successfully']);
    }
}
