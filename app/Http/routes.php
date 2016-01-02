<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */

    //Route::get('/', 'WelcomeController@index');

    Route::get('home', 'HomeController@index');

    Route::controllers([
        'auth' => 'AuthController',
        'password' => 'PasswordController',
    ]);

    Route::model('product', 'App\Model\Product');

    Route::get('list', 'ProductController@lists');

    Route::resource('order', 'OrderController');
    Route::controller('order', 'OrderController');

    /* 后台管理 */
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
        Route::get('/', 'HomeController@index');
        Route::resource('product', 'ProductController');

    });

    Route::post('ajaxUploadInfoImg', 'UploadController@ajaxUploadInfoImg');

