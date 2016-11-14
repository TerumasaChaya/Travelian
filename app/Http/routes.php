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

Route::get('/', function () {
    return view('auth.login');
});


Route::auth();

// Authentication Routes...
$this->get('admin/login', 'AdminAuth\AuthController@showLoginForm');
$this->post('admin/login', 'AdminAuth\AuthController@login');
$this->get('admin/logout', 'AdminAuth\AuthController@logout');

// Registration Routes...
$this->get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
$this->post('admin/register', 'AdminAuth\AuthController@register');

// Password Reset Routes...
$this->get('admin/password/reset/{token?}', 'AdminAuth\PasswordController@showResetForm');
$this->post('admin/password/email', 'AdminAuth\PasswordController@sendResetLinkEmail');
$this->post('admin/password/reset', 'AdminAuth\PasswordController@reset');

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'user'], function () {

        //
        Route::group(['prefix' => 'group'], function () {
            //
            Route::get('/', 'User\GroupController@index');
        });

        //
        Route::group(['prefix' => 'travel'], function () {
            Route::get('/', 'User\TravelController@index');
        });


    });
});
Route::group(['middleware' => 'api'], function () {

    Route::group(['prefix' => 'api'], function () {

        Route::group(['prefix' => 'user'], function () {

            Route::post('create', 'Api\UserController@create');

            Route::post('manualLogin', 'Api\UserController@manualLogin');

            Route::group(['middleware' => 'login'], function () {
                Route::post('login', 'Api\UserController@login');
            });
        });
        
        Route::group(['prefix' => 'travel'], function () {
            Route::group(['prefix' => 'search'], function () {
                Route::get('name/{name}', 'Api\TravelController@searchName');
                Route::get('genre/{name}', 'Api\TravelController@searchGenre');
                Route::get('genre/{name}/asc', 'Api\TravelController@searchGenreASC');
                Route::get('genre/{name}/desc', 'Api\TravelController@searchGenreDESC');
                Route::get('detail/{id}', 'Api\TravelController@travelDetail');
            });
        });

    });

});

Route::group(['prefix' => 'image'], function(){
    Route::get('travelImage/{name}', 'ImageController@travelImage');
    Route::get('thumbnailImage/{name}', 'ImageController@thumbnailImage');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::group(['prefix' => 'admin'], function(){

        Route::get('home', 'AdminHomeController@index');

        Route::group(['prefix' => 'photos'], function() {
            Route::get('/', 'Admin\PhotoController@index');
        });

        Route::group(['prefix' => 'genres'], function() {
            Route::get('/', 'Admin\GenreController@index');
        });

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'Admin\UserController@index');
            Route::get('/{id}', 'Admin\UserController@detail');
        });

        Route::group(['prefix' => 'travel'], function() {

            Route::group(['prefix' => 'private'], function() {
                Route::get('/', 'Admin\TravelController@privateIndex');
                Route::get('/{id}', 'Admin\TravelController@privateDetail');
            });

            Route::group(['prefix' => 'public'], function() {
                Route::get('/', 'Admin\TravelController@publicIndex');
            });

        });

    });
});
