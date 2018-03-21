<?php

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
//    JavaScript::put([
//        'foo' => 'bar',
//        'age' => 29
//    ]);
    return view('pages.home');
})->name('home');

Route::get('/category', function () {
    return view('pages.category');
})->name('category');

Route::get('/product', function () {
    return view('pages.product');
})->name('product');

Route::get('/search', function () {
    return view('pages.search');
})->name('search');

Route::get('/order', function () {
    return view('pages.order');
})->name('order');

Route::get('/payment', function () {
    return view('pages.payment');
})->name('payment');

Route::get('/error', function () {
    return view('pages.error');
})->name('error');


//PROFILE
Route::get('/profile/personal-info', function () {
    return view('profile.personal-info');
})->name('personal-info');

Route::get('/profile/wishlist', function () {
    return view('profile.wishlist');
})->name('wishlist');

Route::get('/profile/my-orders', function () {
    return view('profile.my-orders');
})->name('my-orders');




/**
 * dev commands
 */
Route::get('/clear-compiled', function () {
    Artisan::call('clear-compiled');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return redirect()->route('home');
});