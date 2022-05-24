<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;

class SubSubCategoryController extends Controller
{
    //
    public function allSubSubCategory(){
        $user = Auth::user();
        $SubSubCategorys = SubSubCategory::all();
        $SubCategorys = SubCategory::all();
        $Categories = Category::all();

        return view('admin.SubSubCategory.SubSubCategorie',compact('user','SubSubCategorys','SubCategorys','Categories'));
    }
    
    public function addSubSubCategory(Request $request){

        $request->validate([
            'SubSubCategoryNameFr' => 'required|max:30',
            'SubSubCategoryNameEn' => 'required|max:30',
            'categoryId' => 'required',
            'SubCategoryId' => 'required',
        ]);

        $SubSubCategory = new SubSubCategory();

        $SubSubCategory->SubSubCategory_name_en = $request->SubSubCategoryNameEn;
        $SubSubCategory->SubSubCategory_name_fr = $request->SubSubCategoryNameFr;
        $SubSubCategory->category_id = $request->categoryId;
        $SubSubCategory->sub_category_id = $request->SubCategoryId;
        $SubSubCategory->SubSubCategory_slug_en = strtolower(str_replace(' ',' -',$request->SubSubCategoryNameEn));
        $SubSubCategory->SubSubCategory_slug_fr = str_replace(' ',' -',$request->SubSubCategoryNameFr);
        $SubSubCategory->save();
        // if($request->file('SubSubCategoryImage')){

        //     $file = $request->file('SubSubCategoryImage');
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/SubSubCategoryPhoto'),$filename);
        //     $SubSubCategory['SubSubCategory_image'] = $filename;

        // }

        // $SubSubCategory->save();

        return redirect()->back()->with('success','add with success');
    }


    public function updateSubSubCategory($id){
          $SubSubCategory = SubSubCategory::findOrFail($id);
         $user = Auth::user();
        $Categories = Category::all();

    //    return view('admin.SubSubCategory.updateSubSubCategory',compact('SubSubCategory','SubCategory','user','Categories'));
    return view('admin.SubSubCategory.updateSubSubCategory',compact('user','SubSubCategory','Categories'));
    }


    public function editSubSubCategory(Request $request){

        $validated = $request->validate([
            'SubSubCategoryNameFr' => 'required|max:30',
            'SubSubCategoryNameEn' => 'required|max:30',
        ]);

        $SubSubCategoryId = $request->input('id');

        $SubSubCategory = SubSubCategory::findOrFail($SubSubCategoryId);
        //$oldImage = $SubSubCategory->SubSubCategory_image;


        SubSubCategory::findOrFail($SubSubCategoryId)->update([
            'SubSubCategory_name_en' => $request->SubSubCategoryNameEn,
            'SubSubCategory_name_fr' => $request->SubSubCategoryNameFr,
            'SubSubCategory_slug_en' => strtolower(str_replace(' ',' -',$request->SubSubCategoryNameEn)),
            'SubSubCategory_slug_fr' => str_replace(' ',' -',$request->SubSubCategoryNameFr),
        ]);

        // if($request->SubSubCategoryImage == NULL){
            
        //     ]);}

          //  'category_id' => $request->categoryId,
        // else{

        //     unlink('upload/SubSubCategoryPhoto/'.$oldImage);
        //     $file = $request->file('SubSubCategoryImage');
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/SubSubCategoryPhoto'),$filename);

        //     $SubSubCategory->SubSubCategory_slug_en = strtolower(str_replace(' ',' -',$request->input('SubSubCategoryNameEn')));
        //     $SubSubCategory->SubSubCategory_slug_fr = str_replace(' ',' -',$request->input('SubSubCategoryNameFr'));

        //     SubSubCategory::findOrFail($SubSubCategoryId)->update([
        //         'SubSubCategory_name_en' => $request->input('SubSubCategoryNameEn'),
        //         'SubSubCategory_name_fr' => $request->input('SubSubCategoryNameFr'),
        //         'SubSubCategory_slug_en' => strtolower(str_replace(' ',' -',$request->input('SubSubCategoryNameEn'))),
        //         'SubSubCategory_slug_fr' => str_replace(' ',' -',$request->input('SubSubCategoryNameFr')),
        //         'SubSubCategory_image' => $filename,
        //     ]);
        // }
 return redirect()->route('admin.allSubSubCategory')->with('success','update with success');
    }


    public function deleteSubSubCategory($id){
        $SubSubCategory = SubSubCategory::findOrFail($id);
        $SubSubCategory->delete();

        return redirect()->route('admin.allSubSubCategory');
    }

    public function testAjax(Request $request){

        $Category = $request->text;
        $ajaxSubCategory = SubCategory::where('category_id',$Category)->get();
// dd($ajaxSubCategory );
// ->orderBy('SubSubCategory_name_en','ASC')
         return response()->json(['result' => $ajaxSubCategory]);
    }
}

