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

Route::group(['middlewareGroups' => ['web']], function () {
    Auth::routes();
});
Route::post('get-district', ['as' => 'get.district', 'uses' => 'HomeController@getDistrict']);
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/get_district', ['as' => 'get.district', 'uses' => 'HomeController@getDistrict']);
Route::post('/get_ward', ['as' => 'get.ward', 'uses' => 'HomeController@getWard']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/logout', 'UserController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/facebook', 'Auth\AuthFacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthFacebookController@handleProviderCallback');
Route::get('auth/google', 'Auth\AuthGoogleController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\AuthGoogleController@handleProviderCallback');

Route::group(['middleware' => ['auth']], function() {
    // trang ca nhan
    Route::prefix('thong-tin-ca-nhan/')->group(function () {
        Route::get('/', ['as' => 'home', 'uses' => 'UserController@index']);
        Route::get('thay-doi-ca-nhan', ['as' => 'user.changeProfile', 'uses' => 'UserController@changeProfile']);
        Route::post('thay-doi-ca-nhan', ['as' => 'user.storeProfile', 'uses' => 'UserController@storeProfile']);
        Route::post('update_avatar', ['as' => 'user.storeAvatar', 'uses' => 'UserController@storeAvatar']);
        Route::get('thay-doi-mat-khau', ['as' => 'user.changePassword', 'uses' => 'UserController@changePassword']);
        Route::post('thay-doi-mat-khau', ['as' => 'user.storePassword', 'uses' => 'UserController@storePassword']);

    });
});