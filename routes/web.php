<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/signin', [LoginController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [LoginController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function () {  //auth
    //Dashboard Start
    Route::get('/control', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile-update/{id}', [DashboardController::class, 'profile_update'])->name('profile_update');

    Route::post('/profile/change-password', [DashboardController::class, 'changePassword'])->name('changePassword');

    // product
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::post('/product/update',[ProductController::class,'update'])->name('product.update');
    Route::post('/product/delete',[ProductController::class,'destroy'])->name('product.destroy');
    // product


    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});//auth
