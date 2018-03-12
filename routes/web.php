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






/**
 * dev commands
 */
Route::get('/clear-compiled', function () {
    Artisan::call('clear-compiled');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return redirect()->route('home');
});