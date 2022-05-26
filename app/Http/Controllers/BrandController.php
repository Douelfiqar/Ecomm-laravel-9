<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    //
    public function allBrands(){

        $brands = Brand::paginate(5);
        $user = Auth::user();
        return view('admin.brands.brands',compact('brands','user'));
    }

    public function addBrand(Request $request){
        $request->validate([
            'brandNameFr' => 'required|max:30',
            'brandNameEn' => 'required|max:30',
            'brandImage' => 'required',
        ]);
        $brand =new Brand();
        $brand->brand_name_en = $request->input('brandNameEn');
        $brand->brand_name_fr = $request->input('brandNameFr');
        $brand->brand_slug_en = strtolower(str_replace(' ',' -',$request->input('brandNameEn')));
        $brand->brand_slug_fr = str_replace(' ',' -',$request->input('brandNameFr'));
        
        if($request->file('brandImage')){

            $file = $request->file('brandImage');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brandPhoto'),$filename);
            $brand['brand_image'] = $filename;

        }

        $brand->save();

        return redirect()->back()->with('success','add with success');
    }

    public function deleteBrand($id){
        $brand = Brand::findOrFail($id);

        $brand->delete();

        return redirect()->route('admin.allBrands');
    }

    public function updateBrand($id){
        $brand = Brand::findOrFail($id);
        $user = Auth::user();
       return view('admin.brands.updateBrand',compact('brand','user'));
    }

    public function editBrand(Request $request){

        $validated = $request->validate([
            'brandNameFr' => 'required|max:30',
            'brandNameEn' => 'required',
        ]);

        $brandId = $request->input('id');

        $brand = Brand::findOrFail($brandId);
        $oldImage = $brand->brand_image;
        if($request->file('brandImage')){
            unlink('upload/brandPhoto/'.$oldImage);
            $file = $request->file('brandImage');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brandPhoto'),$filename);

            $brand->brand_slug_en = strtolower(str_replace(' ',' -',$request->input('brandNameEn')));
            $brand->brand_slug_fr = str_replace(' ',' -',$request->input('brandNameFr'));

            Brand::findOrFail($brandId)->update([
                'brand_name_en' => $request->input('brandNameEn'),
                'brand_name_fr' => $request->input('brandNameFr'),
                'brand_slug_en' => strtolower(str_replace(' ',' -',$request->input('brandNameEn'))),
                'brand_slug_fr' => str_replace(' ',' -',$request->input('brandNameFr')),
                'brand_image' => $filename,
            ]);
        }else{
            Brand::findOrFail($brandId)->update([
                'brand_name_en' => $request->input('brandNameEn'),
                'brand_name_fr' => $request->input('brandNameFr'),
                'brand_slug_en' => strtolower(str_replace(' ',' -',$request->input('brandNameEn'))),
                'brand_slug_fr' => str_replace(' ',' -',$request->input('brandNameFr')),
            ]);
        }


        return redirect()->route('admin.allBrands')->with('success','update with success');
    }

}
