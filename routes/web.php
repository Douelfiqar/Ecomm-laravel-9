<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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
    });

});



Route::middleware(['auth', 'role:client'])->group(function () {

    Route::prefix('client')->group(function () {
        Route::get('/account', [ClientController::class,'account'] )->name('client.profile');
        Route::post('/profileUpdate', [ClientController::class,'updateProfile'])->name('client.updateProfile');
        
        Route::post('/editPassword', [ClientController::class,'editPassword'])->name('client.editPassword');
    });

});




Route::prefix('client')->group(function () {
    Route::get('/home', [ClientController::class,'index'])->name('home');


});



