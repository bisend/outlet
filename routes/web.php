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

Route::get('/{language?}', 'HomeController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ])->name('home');

Route::get('/product/{slug}/{language?}', 'ProductController@index')->where([
    'slug' => '^[a-z0-9-]+$',
    'language' => '^(uk|ru)?$'
])->name('product');

Route::get('/category', function () {
    return view('pages.category');
})->name('category');

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
 * ajax routes
 */
Route::post('/get-reviews', 'ProductController@get_reviews');
Route::post('/add-review', 'ProductController@add_review');

Route::group(['prefix' => 'cart'], function ()
{
    Route::post('/init-cart', 'CartController@initCart');
    Route::post('/add-to-cart', 'CartController@addToCart');
    Route::post('/update-cart', 'CartController@updateCart');
    Route::post('/delete-from-cart', 'CartController@deleteFromCart');
});


/**
 * dev commands
 */
Route::get('/clear-compiled', function () {
    Artisan::call('clear-compiled');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return redirect()->route('home');
});