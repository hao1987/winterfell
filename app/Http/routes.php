<?php

/****************   Model binding into route **************************/
Route::model('language', 'App\Language');
Route::model('user', 'App\User');
Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[0-9a-z-_]+');

/***************    Site routes  **********************************/
Route::get('/', 'ProductController@index');
Route::get('home', ['as' => 'home', 'uses' => 'ProductController@index']);
Route::get('about', 'PagesController@about');

Route::group(['middleware' => 'auth'], function() {
    Route::get('shoppingcart', ['as' => 'shoppingcart', 'uses' => 'shoppingcartcontroller@index']);
    Route::post('addtocart', 'ShoppingCartItemController@add');
    Route::get('removefromcart', 'ShoppingCartItemController@remove');
    Route::get('applycoupon', 'CouponController@apply');
    Route::get('placeorder', 'TransactionController@placeOrder');
    Route::get('orderhistory', 'TransactionController@history');

});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/***************    Admin routes  **********************************/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {});
