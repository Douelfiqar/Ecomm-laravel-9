<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;
use App\Http\Controllers\frontend\DetailController;
use App\Http\Controllers\frontend\LangClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    return view('welcome');
});

Route::get('/forgotPassword', function (Request $request) {
    return view('auth.forgot-password');
})->name('forgotPassword');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class,'index'] )->name('dashboard');

        Route::get('/profile', [AdminController::class,'infoProfile'] )->name('profile');

        Route::get('/editProfile', [AdminController::class,'editProfile'] )->name('admin.editProfile');

        Route::post('/updateProfile', [AdminController::class,'updateProfile'] )->name('admin.updateProfile');

        Route::get('/updatePassword', [AdminController::class,'updatePassword'] )->name('update.password');

        Route::post('/editPassword', [AdminController::class,'editPassword'] )->name('admin.editPassword');
        
            //   -----------------------------------  Brand  --------------------------------

        Route::get('/allBrands', [BrandController::class,'allBrands'] )->name('admin.allBrands');
        
        Route::post('/addBrand', [BrandController::class,'addBrand'] )->name('admin.addBrand');

        // Route::get('/updateBrand/{id}', [BrandController::class,'updateBrand'] )->name('admin.updateBrand');

        Route::get('/deleteBrand/{id}', [BrandController::class,'deleteBrand'] )->name('admin.deleteBrand');

        Route::get('/update/{id}', [BrandController::class,'updateBrand'] )->name('admin.updateBrand');
        
        Route::post('/editeBrand', [BrandController::class,'editBrand'] )->name('admin.editBrand');



    //   -----------------------------------  Category  --------------------------------
    
    Route::get('/allCategory', [CategoryController::class,'allCategory'] )->name('admin.allCategory');

    Route::post('/addCategory', [CategoryController::class,'addCategory'] )->name('admin.addCategory');

    Route::get('/updateCategory/{id}', [CategoryController::class,'updateCategory'] )->name('admin.updateCategory');
    
    Route::POST('/edite', [CategoryController::class,'editCategory'] )->name('admin.editCategory');

    Route::get('/deleteCategory/{id}', [CategoryController::class,'deleteCategory'] )->name('admin.deleteCategory');

    //   -----------------------------------  subCategory  --------------------------------

    
    Route::get('/allSubCategory', [SubCategoryController::class,'allSubCategory'] )->name('admin.allSubCategory');   

    Route::post('/addSubCategory', [SubCategoryController::class,'addSubCategory'] )->name('admin.addSubCategory');

    Route::get('/updateSubCategory/{id}', [SubCategoryController::class,'updateSubCategory'] )->name('admin.updateSubCategory');
    
    Route::POST('/editeSubCategory', [SubCategoryController::class,'editSubCategory'] )->name('admin.editSubCategory');

    Route::get('/deleteSubCategory/{id}', [SubCategoryController::class,'deleteSubCategory'] )->name('admin.deleteSubCategory');

     //   ----------------------------------- Sub subCategory  --------------------------------

    
     Route::get('/allSubSubCategory', [SubSubCategoryController::class,'allSubSubCategory'] )->name('admin.allSubSubCategory');   

     Route::post('/addSubSubCategory', [SubSubCategoryController::class,'addSubSubCategory'] )->name('admin.addSubSubCategory');
 
     Route::get('/updateSubSubCategory/{id}', [SubSubCategoryController::class,'updateSubSubCategory'] )->name('admin.updateSubSubCategory');
     
     Route::POST('/editeSubSubCategory', [SubSubCategoryController::class,'editSubSubCategory'] )->name('admin.editSubSubCategory');
 
     Route::get('/deleteSubSubCategory/{id}', [SubSubCategoryController::class,'deleteSubSubCategory'] )->name('admin.deleteSubSubCategory');

    // Route::post('/ajax', [SubSubCategoryController::class,'testAjax'] )->name('admin.deleteSubSubCategory');

    //   ----------------------------------- Products  --------------------------------

        //route pour ajouter un produit!!!!
    Route::get('/addProduct', [ProductController::class,'addProductGet'] )->name('admin.allProduct');   

    Route::post('/addProduct', [ProductController::class,'addProduct'] )->name('admin.addProduct');

    Route::get('/updateProduct/{id}', [ProductController::class,'updateProduct'] );

    Route::post('/editeProduct', [ProductController::class,'editProduct'])->name('admin.editProduct');


    Route::get('/manageProduct', [ProductController::class,'manageProduct'] )->name('admin.manageProduct');

    Route::get('/deleteProduct/{id}', [ProductController::class,'deleteProduct'] );

    Route::post('/product/SubCategoryajax', [ProductController::class,'ajaxCategoryProduct'] )->name('admin.ajaxCategoryProduct');

    Route::post('/product/SubSubCategoryajax', [ProductController::class,'ajaxSubCategoryProduct'] )->name('admin.ajaxCategoryProduct');


    Route::get('/statusProduct/{id}', [ProductController::class,'statusUpdate'] );

    //   ----------------------------------- Slider  --------------------------------

        
    Route::get('/allSlider', [SliderController::class,'allSlider'] )->name('admin.allSlider');   

    Route::post('/addSlider', [SliderController::class,'addSlider'] )->name('admin.addSlider');

    Route::get('/updateSlider/{id}', [SliderController::class,'updateSlider'])->name('admin.updateslider');

    Route::post('/editeSlider', [SliderController::class,'editSlider'])->name('admin.editSlider');

    Route::get('/deleteSlider/{id}', [SliderController::class,'deleteSlider'] );

    Route::get('/status/{id}', [SliderController::class,'statusUpdate'] )->name('admin.statusSldier');
        
    Route::get('/statusSlider/{id}', [SliderController::class,'statusUpdate'] )->name('admin.statusSlider');
    });
});

Route::post('/ajax', [SubSubCategoryController::class,'testAjax'] );

Route::middleware(['auth', 'role:client'])->group(function () {

    Route::prefix('client')->group(function () {
        Route::get('/account', [ClientController::class,'account'] )->name('client.profile');
        Route::post('/profileUpdate', [ClientController::class,'updateProfile'])->name('client.updateProfile');
        
        Route::post('/editPassword', [ClientController::class,'editPassword'])->name('client.editPassword');
    });

    

});




Route::prefix('client')->group(function () {
    
    Route::get('/home', [ClientController::class,'index'])->name('home');

    Route::get('/home/lang/en', [LangClientController::class,'langEng']);

    Route::get('/home/lang/fr', [LangClientController::class,'langFr']);

    Route::get('/home/details/{id}', [DetailController::class,'index']);


});



