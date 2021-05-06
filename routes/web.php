<?php

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
    return view('front-end.welcome');
});

Route::get('/products', function () {
    return view('front-end.product');
});

Route::get('/cart', function () {
    return view('front-end.cart');
});


Route::get('/detail', function () {
    return view('front-end.product-detail');
});

Route::get('/log', function () {
    return view('front-end.login');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', 'CategoriesController');
    Route::resource('collections', 'CollectionController');
    Route::resource('devise', 'DeviseController');
    Route::resource('products', 'ProductsController');
    Route::resource('super_cat', 'SuperCategoriesController');
    Route::resource('setting', 'SettingController');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
