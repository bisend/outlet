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

// Home page route
Route::get('/{language?}', 'HomeController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ])->name('home');
// ---------------------------------------------------------------------------------------------------------------------

// Product page route
Route::get('/product/{slug}/{language?}', 'ProductController@index')->where([
    'slug' => '^[a-z0-9-]+$',
    'language' => '^(uk|ru)?$'
])->name('product');
// ---------------------------------------------------------------------------------------------------------------------

// Category route
//Route::get('/category', function () {
//    return view('pages.category');
//})->name('category');
// ---------------------------------------------------------------------------------------------------------------------

// Order route
//Route::get('/order', function () {
//    return view('pages.order');
//})->name('order');
// ---------------------------------------------------------------------------------------------------------------------

// Payment route
//Route::get('/payment', function () {
//    return view('pages.payment');
//})->name('payment');
// ---------------------------------------------------------------------------------------------------------------------

// Error route
//Route::get('/error', function () {
//    return view('pages.error');
//})->name('error');
// ---------------------------------------------------------------------------------------------------------------------

Route::get('/profile/personal-info/{language?}', 'Profile\PersonalInfoController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ])->name('personal-info');


Route::get('profile/wish-list/{language?}', 'Profile\WishListController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ])->name('wishlist');

Route::get('profile/my-orders/{language?}', 'Profile\MyOrdersController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ])->name('my-orders');

Route::get('/profile/payment-delivery/{language?}', 'Profile\PaymentDeliveryController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);


Route::post('profile/save-personal-info', 'Profile\PersonalInfoController@savePersonalInfo');

Route::post('profile/change-password', 'Profile\ChangePasswordController@changePassword');

Route::post('profile/save-payment-delivery', 'Profile\PaymentDeliveryController@savePaymentDelivery');

Route::post('profile/add-to-wish-list', 'Profile\WishListController@addToWishList');

Route::post('profile/delete-from-wish-list', 'Profile\WishListController@deleteFromWishList');

Route::post('profile/my-orders', 'Profile\MyOrdersController@indexPagination');


// Profile group routes
/*Route::get('/profile/personal-info', function () {
    return view('pages.personal-info');
})->name('personal-info');*/

// Profile wish list
/*Route::get('/profile/wishlist', function () {
    return view('pages.wishlist');
})->name('wishlist');*/
/*
// Profile orders
Route::get('/profile/my-orders' , function () {
    return view('pages.my-orders');
})->name('my-orders');
// ---------------------------------------------------------------------------------------------------------------------*/

// Search group routes
Route::group(['prefix' => 'search'], function () {
    Route::get('{series}/{language?}', 'SearchController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Search results page sorted
     */
    Route::get('/{series}/{sort}/{language?}', 'SearchController@indexSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Search results page pagination
     */
    Route::get('/{series}/{page}/{language?}', 'SearchController@indexPagination')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Search results page sorted pagination
     */
    Route::get('/{series}/{sort}/{page}/{language?}', 'SearchController@indexPaginationSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Ajax search results handler
     */
    Route::get('/async/{series}/{language?}', 'SearchController@indexAjax')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);
});
// ---------------------------------------------------------------------------------------------------------------------

// Novelty group routes
Route::group(['prefix' => 'novelty'], function () {
    Route::get('{language?}', 'NoveltyController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ])->name('noveltyIndex');

    Route::get('{sort}/{language?}', 'NoveltyController@indexSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ])->name('noveltyIndexSort');

    Route::get('{page}/{language?}', 'NoveltyController@indexPagination')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ])->name('noveltyIndexPagination');

    Route::get('{sort}/{page}/{language?}', 'NoveltyController@indexPaginationSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ])->name('noveltyIndexPaginationSort');
});
// ---------------------------------------------------------------------------------------------------------------------

// Sale group routes
Route::group(['prefix' => 'sale'], function () {
    Route::get('{language?}', 'SaleController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ])->name('saleIndex');

    Route::get('{sort}/{language?}', 'SaleController@indexSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ])->name('saleIndexSort');

    Route::get('{page}/{language?}', 'SaleController@indexPagination')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ])->name('saleIndexPagination');

    Route::get('{sort}/{page}/{language?}', 'SaleController@indexPaginationSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ])->name('saleIndexPaginationSort');
});
// ---------------------------------------------------------------------------------------------------------------------

// Top Sale group routes
Route::group(['prefix' => 'top-sale'], function () {
    Route::get('{language?}', 'TopSaleController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ])->name('topSaleIndex');

    Route::get('{sort}/{language?}', 'TopSaleController@indexSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ])->name('topSaleIndexSort');

    Route::get('{page}/{language?}', 'TopSaleController@indexPagination')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ])->name('topSaleIndexPagination');

    Route::get('{sort}/{page}/{language?}', 'TopSaleController@indexPaginationSort')
        ->where([
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ])->name('topSaleIndexPaginationSort');
});
// ---------------------------------------------------------------------------------------------------------------------

// Category group routes
Route::group(['prefix' => 'category'], function () {
    /**
     * Category
     */
    Route::get('/{slug}/{language?}', 'CategoryController@index')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{page}/{language?}', 'CategoryController@indexPagination')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{sort}/{language?}', 'CategoryController@indexSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{sort}/{page}/{language?}', 'CategoryController@indexPaginationSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Category Filters
     */
    Route::get('/{slug}/{filters}/{language?}', 'CategoryFiltersController@index')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'filters' => '^[a-z0-9=,;-]+$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{filters}/{page}/{language?}', 'CategoryFiltersController@indexPagination')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'filters' => '^[a-z0-9=,;-]+$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{filters}/{sort}/{language?}', 'CategoryFiltersController@indexSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'filters' => '^[a-z0-9=,;-]+$',
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{filters}/{sort}/{page}/{language?}', 'CategoryFiltersController@indexPaginationSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'filters' => '^[a-z0-9=,;-]+$',
            'sort' => '^(popularity|new|price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);
});
// ---------------------------------------------------------------------------------------------------------------------

// Reviews routes

// Get reviews route
Route::post('/get-reviews', 'ProductController@get_reviews');
// Add review route
Route::post('/add-review', 'ProductController@add_review');
// ---------------------------------------------------------------------------------------------------------------------

// Cart group routes
Route::group(['prefix' => 'cart'], function () {
    Route::post('/init-cart', 'CartController@initCart');
    Route::post('/add-to-cart', 'CartController@addToCart');
    Route::post('/update-cart', 'CartController@updateCart');
    Route::post('/delete-from-cart', 'CartController@deleteFromCart');
});
// ---------------------------------------------------------------------------------------------------------------------

Route::post('/get-user', 'LayoutController@getUser');

// Artisan group routes
Route::group(['prefix' => 'artisan'], function () {
    Route::get('/config-gen', 'ArtisanController@generateConfiguration');
});
// ---------------------------------------------------------------------------------------------------------------------

// Auth group routes
Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('login', 'Auth\LoginController@login');

    Route::get('logout', 'Auth\LoginController@logout')->name('auth-logout');

    Route::get('login/facebook/{language?}', 'Auth\FacebookLoginController@redirectToProvider')
        ->where([
            'language' => '^(uk|ru)?$'
        ])->name('facebook-login');

    Route::get('login/facebook/callback', 'Auth\FacebookLoginController@handleProviderCallback');

    Route::post('social-email', 'Auth\FacebookLoginController@socialEmailHandler')
        ->name('social-email');

    Route::get('login/google/{language?}', 'Auth\GoogleLoginController@redirectToProvider')
        ->where([
            'language' => '^(uk|ru)?$'
        ])->name('google-login');

    Route::get('login/google/callback', 'Auth\GoogleLoginController@handleProviderCallback');

    Route::post('restore-password', 'Auth\RestorePasswordController@restore');
});
// ---------------------------------------------------------------------------------------------------------------------

// Confirm email route
Route::get('/confirm/{confirmationToken}/{language?}', 'Auth\ConfirmationEmailController@confirm')
    ->where([
        'language' => '^(ru|uk)?$'
    ]);
// ---------------------------------------------------------------------------------------------------------------------

// Confirm social email route
Route::get('/confirm-social-email/{confirmationToken}/{language?}', 'Auth\FacebookLoginController@confirmSocialEmail')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);
// ---------------------------------------------------------------------------------------------------------------------

// Errors group routes
Route::group(['prefix' => 'errors'], function ()
{
    /**
     * Error page
     */
    Route::get('/{error}/{language?}', 'ErrorController@index')
        ->where([
            'error' => '^(400|401|403|404|500)$',
            'language' => '^(uk|ru)?$'
        ]);
});
// ---------------------------------------------------------------------------------------------------------------------

Route::group(['prefix' => 'order'], function () {

    Route::get('confirm/{language?}', 'OrderController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    Route::post('create', 'OrderController@create');

    Route::get('payment/{orderNumber}/{language?}', 'OrderPaymentController@index')
        ->where([
            'orderNumber' => '^[0-9]+',
            'language' => '^(uk|ru)?$'
        ]);

    Route::post('payment/callback', 'OrderPaymentController@liqpayCallbackHandler');

});

Route::get('/payment-delivery/{language?}', 'StaticPaymentDeliveryController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);
Route::get('/about/{language?}', 'AboutController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

Route::get('/contact/{language?}', 'ContactController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);