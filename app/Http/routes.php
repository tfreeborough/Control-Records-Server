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



Route::get('/login', 'Auth\AuthController@showLoginForm');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Auth\PasswordController@reset');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index');

    /*
     * Band Routes
     */
    Route::get('/bands', 'BandController@index');
    Route::get('/bands/{id}', 'BandController@bandPage');
    Route::get('/bands/{id}/additional', 'BandAdditionalController@bandAdditionalPage');
    Route::get('/bands/{id}/delete', 'BandController@bandDelete');

    Route::post('/bands/{id}/edit', 'BandController@bandEdit');
    Route::post('/bands/create', 'BandController@store');

    Route::post('/bands/{id}/additional/banner', 'BandAdditionalController@storeBanner');
    Route::post('/bands/{id}/additional/avatar', 'BandAdditionalController@storeAvatar');
    Route::post('/bands/{id}/additional/about', 'BandAdditionalController@storeAbout');

    /*
     * Gigs Routes
     */
    Route::get('/gigs', 'GigsController@index');
    Route::get('/gigs/{id}', 'GigsController@gigPage');
    Route::get('/gigs/{id}/delete', 'GigsController@gigDelete');

    Route::post('/gigs/{id}/edit', 'GigsController@gigEdit');
    Route::post('/gigs/create', 'GigsController@store');

    /*
     * Venue Routes
     */
    Route::get('/venues', 'VenueController@index');
    Route::get('/venues/{id}', 'VenueController@venuePage');
    Route::get('/venues/{id}/delete', 'VenueController@venueDelete');

    Route::post('/venues/{id}/edit', 'VenueController@venueEdit');
    Route::post('/venues/create', 'VenueController@store');
    Route::post('/venues/{id}/additional/logo', 'VenueController@storeLogo');

    /*
     * User Routes
     */
    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');

    /*
     * News Routes
     */
    Route::get('/news', 'NewsController@index');
    Route::get('/news/create', 'NewsController@createPage');
    Route::get('/news/{id}', 'NewsController@newsPage');
    Route::get('/news/{id}/delete', 'NewsController@newsDelete');

    Route::post('/news/create', 'NewsController@store');
    Route::post('/news/{id}/edit', 'NewsController@newsEdit');

});


Route::group(['middleware' => 'cors', 'prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::get('gigs/all', 'ApiController@getAllGigs');
    Route::get('news/all', 'ApiController@getAllNews');
    Route::get('bands/all', 'ApiController@getAllBands');
    Route::get('venues/all', 'ApiController@getAllVenues');
    Route::get('bands/{url_name}', 'ApiController@getBandPage');
    Route::get('news/{url_name}', 'ApiController@getNewsPage');
    Route::get('venue/{url_name}', 'ApiController@getVenuePage');
});
