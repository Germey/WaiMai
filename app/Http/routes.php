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
    Route::resource('product', 'ProductController');

    Route::resource('order', 'OrderController');
    Route::controller('order', 'OrderController');