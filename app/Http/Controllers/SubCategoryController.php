<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    //
    public function allSubCategory(){
        $user = Auth::user();
        $SubCategorys = SubCategory::paginate(5);
        $Categories = Category::all();

        return view('admin.SubCategory.SubCategorie',compact('user','SubCategorys','Categories'));
    }
    
    public function addSubCategory(Request $request){

        
        $request->validate([
            'SubCategoryNameFr' => 'required|max:30',
            'SubCategoryNameEn' => 'required|max:30',
            'categoryId' => 'required',
        ]);
        // 'SubCategoryImage' => 'required',

        $SubCategory = new SubCategory();

        $SubCategory->SubCategory_name_en = $request->input('SubCategoryNameEn');
        $SubCategory->SubCategory_name_fr = $request->input('SubCategoryNameFr');
        $SubCategory->category_id = $request->input('categoryId');
        
        $SubCategory->SubCategory_slug_en = strtolower(str_replace(' ',' -',$request->input('SubCategoryNameEn')));
        $SubCategory->SubCategory_slug_fr = str_replace(' ',' -',$request->input('SubCategoryNameFr'));
        
        // if($request->file('SubCategoryImage')){

        //     $file = $request->file('SubCategoryImage');
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/SubCategoryPhoto'),$filename);
        //     $SubCategory['SubCategory_image'] = $filename;

        // }

        $SubCategory->save();

        return redirect()->back()->with('success','add with success');
    }


    public function updateSubCategory($id){
        $SubCategory = SubCategory::findOrFail($id);
        $user = Auth::user();
        $Categories = Category::all();

       return view('admin.SubCategory.updateSubCategory',compact('SubCategory','user','Categories'));
    }


    public function editSubCategory(Request $request){

        $validated = $request->validate([
            'SubCategoryNameFr' => 'required|max:30',
            'SubCategoryNameEn' => 'required|max:30',
        ]);

        $SubCategoryId = $request->input('id');

        $SubCategory = SubCategory::findOrFail($SubCategoryId);
        // $oldImage = $SubCategory->SubCategory_image;

        SubCategory::findOrFail($SubCategoryId)->update([
            'SubCategory_name_en' => $request->input('SubCategoryNameEn'),
            'SubCategory_name_fr' => $request->input('SubCategoryNameFr'),
            'SubCategory_slug_en' => strtolower(str_replace(' ',' -',$request->input('SubCategoryNameEn'))),
            'SubCategory_slug_fr' => str_replace(' ',' -',$request->input('SubCategoryNameFr')),
            'category_id' => $request->categoryId,
        ]);


 return redirect()->route('admin.allSubCategory')->with('success','update with success');
    }

    

    public function deleteSubCategory($id){
        $SubCategory = SubCategory::findOrFail($id);
        $SubCategory->delete();

        return redirect()->route('admin.allSubCategory');
    }
}
