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

use App\Http\Controllers\Admin\AdminController;


Route::get('home', 'FrontendController@getHome')->name('home');
Route::post('home', 'FrontendController@postFELogin')->name('FE_login');
Route::post('/', 'FrontendController@postRegister')->name('rgt');
Route::get('/', 'FrontendController@getFELogout')->name('FE_logout');
Route::get('detail/{id}/{slug}.html','FrontendController@getDetail')->name('detail');
Route::post('detail/{id}/{slug}.html','FrontendController@postComment')->name('comm');
Route::get('category/{id}/{slug}.html','FrontendController@getCategory')->name('category');
Route::get('search/', 'FrontendController@getSearch')->name('search');

Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', 'CartController@getAddCart')->name('cart_add');
    Route::get('show', 'CartController@getShowCart')->name('cart_show');
    Route::get('delete/{id}', 'CartController@getDeleteCart')->name('cart_del');
    Route::get('update', 'CartController@getUpdateCart')->name('cart_update');
    Route::post('show', 'CartController@postSendEmail')->name('cart_email');
});
Route::get('complete','CartController@getComplete')->name('cart_cpl');

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login','middleware'=>'CheckLogedIn'], function () {
        Route::get('/', 'AdminController@getLogin')->name('login');
        Route::post('/', 'AdminController@postLogin')->name('login');
    });
    
    Route::get('logout', 'AdminController@getLogout')->name('logout');

    Route::group(['prefix' => 'admin','middleware'=>'CheckLogedOut'], function () {
        Route::get('adHome','AdminController@getHome')->name('admin');
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@getCate')->name('cate');
            Route::post('/', 'CategoryController@postCate')->name('cate');
            Route::get('edit/{id}', 'CategoryController@getEditCate')->name('edit');
            Route::post('edit/{id}', 'CategoryController@postEditCate')->name('edit');
            Route::get('delete/{id}', 'CategoryController@getDeleteCate')->name('del');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'ProductsController@getProduct')->name('product');
            Route::get('add', 'ProductsController@getAddProduct')->name('add');
            Route::post('add', 'ProductsController@postAddProduct')->name('add');
            Route::get('edit/{id}', 'ProductsController@getEditProduct')->name('edit');
            Route::post('edit/{id}', 'ProductsController@postEditProduct')->name('edit');
            Route::get('delete/{id}', 'ProductsController@getDeleteProduct')->name('del');
        });
    });
});
