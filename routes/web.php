<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => '/', 'namespace' => 'Front'], function() {
    Route::get('/', 'FrontController@getIndex');

    Route::get('video/{id}/{slug}', 'FrontController@getVideo');

    Route::get('search', 'FrontController@getSearch');

    Route::get('tag/{tag}', 'FrontController@getTag');

    // Menu
    Route::get('news', 'FrontController@getNews');
    Route::get('most-viewed', 'FrontController@getMostViewed');
    Route::get('top-rated', 'FrontController@getTopRated');
    Route::get('most-favorited', 'FrontController@getMostFavorited');
    Route::get('most-commented', 'FrontController@getMostCommented');
    Route::get('tags', 'FrontController@getTags');
    Route::get('random', 'FrontController@getRandom');
    Route::get('stars', 'FrontController@getstars');
    Route::get('channels', 'FrontController@getChannels');

    Route::get('contact', 'FrontController@getContact');
    Route::post('contact', 'FrontController@postContact');
    Route::get('conditions', 'FrontController@getConditions');

    Route::get('test', ['as' => 'test', 'uses' => 'FrontController@test']);
});





Auth::routes();

Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
    Route::resources([
        'users' => 'UsersController',
        'videos' => 'VideosController',
        'validations' => 'ValidationsController',
        'tags' => 'TagsController',
        'messages' => 'MessagesController',
        'menu' => 'MenuController'
       // 'pages' => 'PagesController',
       // 'banners' => 'BannersController',
       // 'settings' => 'SettingsController'
    ]);

    Route::get('fetch-menu', ['as' => 'fetch-menu', 'uses' => 'MenuController@fetchMenu']);
});
