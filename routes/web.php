<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\ManageAdminController;
use App\Http\Controllers\ReviewAdminController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\SubSubCategoryController;
use App\Http\Controllers\frontend\DetailController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\LangClientController;
use App\Http\Controllers\frontend\ShoppingCartController;
use App\Http\Controllers\frontend\CategoryClientController;

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

    Route::get('/getProduct', [ProductController::class,'getProduct'] );

    Route::get('/deleteProduct/{id}', [ProductController::class,'deleteProduct'] );

    Route::post('/product/SubCategoryajax', [ProductController::class,'ajaxCategoryProduct'] )->name('admin.ajaxCategoryProduct');

    Route::post('/product/SubSubCategoryajax', [ProductController::class,'ajaxSubCategoryProduct'] )->name('admin.ajaxCategoryProduct');

    Route::get('/statusProduct/{id}', [ProductController::class,'statusUpdate'] );

    //   ----------------------------------- Slider  --------------------------------

        
    Route::get('/allSlider', [SliderController::class,'allSlider'] )->name('admin.allSlider');   

    Route::get('/getSliders', [SliderController::class,'getSliders'] )->name('admin.allSlider');   

    Route::post('/addSlider', [SliderController::class,'addSlider'] )->name('admin.addSlider');

    Route::get('/updateSlider/{id}', [SliderController::class,'updateSlider'])->name('admin.updateslider');

    Route::post('/editeSlider', [SliderController::class,'editSlider'])->name('admin.editSlider');

    Route::get('/deleteSlider/{id}', [SliderController::class,'deleteSlider'] );

    Route::get('/status/{id}', [SliderController::class,'statusUpdate'] )->name('admin.statusSldier');
        
    Route::get('/statusSlider/{id}', [SliderController::class,'statusUpdate'] )->name('admin.statusSlider');

    //-------------------------------------------- Users -----------------------------------
    
    Route::get('/manageUsers', [UsersController::class,'IndexUsers'] )->name('admin.manageUser');
    
    Route::get('/getUsers', [UsersController::class,'getUsers'] );

    Route::get('/deleteUser/{id}', [UsersController::class,'deleteUsers'] );

    
    // ------------------------------------------- Review -----------------------------------

    Route::get('/manageReview', [ReviewAdminController::class,'displayReview'] )->name('admin.manageReview');
    
    Route::get('/getReview', [ReviewAdminController::class,'getReviews'] );

    Route::get('/userData/{id}', [ReviewAdminController::class,'getUsersData'] );

    Route::get('/updateStatusReview/{id}', [ReviewAdminController::class,'status'] );

    Route::get('/deleteReview/{id}', [ReviewAdminController::class,'deleteReview'] );

    });


    // ------------------------------------------Shipping-----------------------------------

    Route::get('/allOrder',[ShippingController::class,'allOrder'])->name('admin.allOrder');

    Route::get('/admin/addCountry',[ShippingController::class,'addCountry'])->name('admin.addCount');

    Route::get('/admin/addCity',[ShippingController::class,'addCity']);

    Route::get('/admin/statusOrder/{id}',[ShippingController::class,'status']);

    Route::get('/admin/getCountries',[ShippingController::class,'getCountries']);
    
    Route::get('/admin/removeCountry/{id}',[ShippingController::class,'removeCountry']);

    Route::get('/admin/removeCity/{id}',[ShippingController::class,'removeCity']);

    Route::get('/admin/getOrders',[ShippingController::class,'getOrders']);

    // ------------------------------- Manage Admin --------------------------
    
    Route::get('/admin/manageAdmin',[ManageAdminController::class,'index'])->name('admin.manageAdmin');

});

Route::post('/ajax', [SubSubCategoryController::class,'testAjax'] );




Route::prefix('client')->group(function () {
    
    Route::get('/home', [ClientController::class,'index'])->name('home');

    Route::get('/home/lang/en', [LangClientController::class,'langEng']);

    Route::get('/home/lang/fr', [LangClientController::class,'langFr']);


    // Route::get('/category', [CategoryClientController::class,'indexCategory']);

    Route::get('/category/{id}', [CategoryClientController::class,'filterCategory']);

    Route::get('/product/view/modal/{id}', [CategoryClientController::class,'modelCategory']);

    Route::post('/cart/data/store/{id}', [CartController::class,'addCart']);

    Route::get('/cart/data/update/{id}', [CartController::class,'updateCart']);

    Route::get('/product/mini/cart', [CartController::class,'getMiniCart']);
    
    Route::get('/product/remove/mini/cart/{rowId}', [CartController::class,'removeMiniCart']);

    Route::get('/display/shopping-cart', [ShoppingCartController::class,'indexShopping']);
    
    Route::get('/removeCart/{rowId}', [ShoppingCartController::class,'removeIteam']);
    
    Route::get('/getCart', [ShoppingCartController::class,'getCart']);
    
    Route::get('/updateQuantiter/{rowId}/{qty}', [ShoppingCartController::class,'updateQuantiter']);
    
    Route::get('/getTotal', [ShoppingCartController::class,'totalCart']);
    




    Route::middleware(['auth'])->group(function (){

        //------------------------ profile-------------------------------

        Route::get('/account', [ClientController::class,'account'] )->name('client.profile');

        Route::post('/profileUpdate', [ClientController::class,'updateProfile'])->name('client.updateProfile');
        
        Route::post('/editPassword', [ClientController::class,'editPassword'])->name('client.editPassword');

        Route::get('/delteAccount',[ClientController::class,'deleteAccount'])->name('profile.delteAccount');

        //------------------------ end profile---------------------------


        Route::get('/checkout',[CheckoutController::class,'indexCheckout']);

        Route::get('/checkout/getAllIteams',[CheckoutController::class,'getAllIteams']);

        // ------------------------ Shipping ---------------------------------        

        Route::post('/shipping',[OrderController::class,'dataOrder'])->name('client.orderInformation');

        Route::get('/getCities/{id}',[CheckoutController::class,'getCounties']); //AJAX

        //-------------------------AJAX--------------------------------

        Route::get('/home/details/{id}', [ReviewController::class,'index']);
        
        Route::get('/getReviews/{id}', [ReviewController::class,'getReviews']);
        
        Route::get('/addReview/{id}', [ReviewController::class,'addReview']);

        //------------------------ ADD TO CART DETAILS -----------------------
        
        Route::get('/addcart/detail/{id}',[CartController::class,'addToCartDetails']);

        // -------------------------- Contact -------------------------------------

        Route::get('/contact',[ContactController::class,'index'])->name('client.contact');
        
        Route::get('/commentContact',[ContactController::class,'contact'])->name('client.comment');

        // ---------------------------- Order by ------------------------------------

        Route::get('/orderBy/{orderBy}/{subsub}',[CategoryClientController::class,'order']);

        
        // ----------------------------- Track Orders ---------------------------------

        Route::get('/trackOrder',[OrderController::class,'trackOrder'])->name('profile.trackOrder');
        
        Route::get('/getOrders',[OrderController::class,'getorders']);

        Route::get('/cancelOrder/{id}',[OrderController::class,'cancelOrder'])->name('profile.cancelOrder');
    });
});



    // -------------------------------SEARCH------------------------------------


Route::get('search-product', [SearchController::class, 'SearchProduct']);


//------------------------------------facebook-----------------------------


Route::get('/auth/facebook/redirect', [FacebookController::class, 'handleFacebookRedirect']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);



Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
