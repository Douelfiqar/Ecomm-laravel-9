<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function allCategory(){
        $user = Auth::user();
        $categorys = Category::all();
        return view('admin.category.category',compact('user','categorys'));
    }
    
    public function addCategory(Request $request){
        $request->validate([
            'CategoryNameFr' => 'required|max:30',
            'CategoryNameEn' => 'required|max:30',
        ]);
        // 'CategoryImage' => 'required',
        $category = new Category();
        $category->category_name_en = $request->input('CategoryNameEn');
        $category->category_name_fr = $request->input('CategoryNameFr');
        $category->category_slug_en = strtolower(str_replace(' ',' -',$request->input('CategoryNameEn')));
        $category->category_slug_fr = str_replace(' ',' -',$request->input('CategoryNameFr'));
        $category->save();
        // if($request->file('CategoryImage')){

        //     $file = $request->file('CategoryImage');
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/categoryPhoto'),$filename);
        //     $category['category_image'] = $filename;

        // }

        

        return redirect()->back()->with('success','add with success');
    }


    public function updateCategory($id){
        $category = Category::findOrFail($id);
        $user = Auth::user();
       return view('admin.category.updateCategory',compact('category','user'));
    }


    public function editCategory(Request $request){

        $validated = $request->validate([
            'categoryNameFr' => 'required|max:30',
            'categoryNameEn' => 'required',
        ]);

        $categoryId = $request->input('id');

        $category = Category::findOrFail($categoryId);
        $oldImage = $category->category_image;

        if($request->categoryImage == NULL){
           

            Category::findOrFail($categoryId)->update([
                'category_name_en' => $request->input('categoryNameEn'),
                'category_name_fr' => $request->input('categoryNameFr'),
                'category_slug_en' => strtolower(str_replace(' ',' -',$request->input('categoryNameEn'))),
                'category_slug_fr' => str_replace(' ',' -',$request->input('categoryNameFr')),
            ]);

        }

        // else{
        //     unlink('upload/categoryPhoto/'.$oldImage);
        //     $file = $request->file('categoryImage');
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/categoryPhoto'),$filename);

        //     $category->category_slug_en = strtolower(str_replace(' ',' -',$request->input('categoryNameEn')));
        //     $category->category_slug_fr = str_replace(' ',' -',$request->input('categoryNameFr'));

        //     Category::findOrFail($categoryId)->update([
        //         'category_name_en' => $request->input('categoryNameEn'),
        //         'category_name_fr' => $request->input('categoryNameFr'),
        //         'category_slug_en' => strtolower(str_replace(' ',' -',$request->input('categoryNameEn'))),
        //         'category_slug_fr' => str_replace(' ',' -',$request->input('categoryNameFr')),
        //         'category_image' => $filename,
        //     ]);
        // }

 return redirect()->route('admin.allCategory')->with('success','update with success');
    }


    public function deleteCategory($id){
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.allCategory');
    }
}
