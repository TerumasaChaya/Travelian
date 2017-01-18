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

        Route::group(['prefix' => 'group'], function () {
            Route::get('/', 'User\GroupController@index');
        });

        Route::group(['prefix' => 'photos'], function() {
            Route::get('/{id}', 'User\PhotoController@detail');
        });

        //
        Route::group(['prefix' => 'travel'], function () {

            Route::get('/', 'User\TravelController@index');
            Route::get('/detail/{id}', 'User\TravelController@detail');
            Route::post('/confirm', 'User\TravelController@confirm');

            Route::group(['prefix' => 'search'], function () {
                Route::get('/', 'User\TravelSearchController@index');
                Route::get('/result', 'User\TravelSearchController@result');
            });

            Route::group(['prefix' => 'release'], function () {
                Route::get('/detail/{id}', 'User\TravelSearchController@release');
            });

        });

        Route::group(['prefix' => 'genre'], function () {
            Route::get('/detail/{id}', 'User\GenreController@detail');
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
                Route::get('/', 'Api\TravelController@searchTravel');
                Route::get('detail/{id}', 'Api\TravelController@travelDetail');
                Route::post('region', 'Api\TravelController@searchRegion');
            });

            Route::group(['prefix' => 'genre'], function () {

                Route::get('{name}', 'Api\TravelController@searchGenre');
                Route::get('{name}/asc', 'Api\TravelController@searchGenreASC');
                Route::get('{name}/desc', 'Api\TravelController@searchGenreDESC');

            });

            Route::group(['prefix' => 'send'], function () {
                Route::post('travel', 'Api\TravelController@sendTravel');
                Route::post('photo', 'Api\TravelController@sendPhoto');
            });

            Route::get('point', 'Api\TravelController@travelPoint');

        });

        Route::group(['prefix' => 'genre'], function () {
            Route::get('alpha', 'Api\TravelController@alpha');
            Route::get('point', 'Api\TravelController@genrePoint');
        });

        Route::group(['prefix' => 'group'], function () {
            Route::get('groupList', 'Api\GroupController@groupList');
            Route::post('make', 'Api\GroupController@makeGroup');
            Route::post('memberList', 'Api\GroupController@memberList');
            Route::post('close', 'Api\GroupController@close');

            Route::group(['prefix' => 'request'], function () {
                Route::post('send', 'Api\GroupController@request');
                Route::post('cancel', 'Api\GroupController@requestCancel');
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
            Route::get('/{id}', 'Admin\PhotoController@detail');
            Route::post('/delete', 'Admin\PhotoController@delete');
        });

        Route::group(['prefix' => 'genres'], function() {
            Route::get('/', 'Admin\GenreController@index');
            Route::post('/confirm', 'Admin\GenreController@confirm');
            Route::post('/complete', 'Admin\GenreController@complete');
        });

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'Admin\UserController@index');
            Route::get('/{id}', 'Admin\UserController@detail');
            Route::post('/delete', 'Admin\UserController@delete');
        });

        Route::group(['prefix' => 'travel'], function() {

            Route::group(['prefix' => 'private'], function() {
                Route::get('/', 'Admin\TravelController@privateIndex');
                Route::get('/{id}', 'Admin\TravelController@privateDetail');
            });

            Route::group(['prefix' => 'public'], function() {
                Route::get('/', 'Admin\TravelController@publicIndex');
                Route::get('/{id}', 'Admin\TravelController@publicDetail');
            });

            Route::get('/detail/{id}', 'Admin\TravelController@Detail');

        });

    });
});
