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

Route::get('/c',"\Customer\Http\Controllers\BackEnd\CustomerController@index");
Route::get('/d',"\Seller\Http\Controllers\BackEnd\SellerController@index");
Route::get('/', function () {
    return view('welcome');
});
// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('login/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');







Route::post('loginnn', 'AccountKitAuthController@login')->name('loginnn');

Route::get('/index', ['uses' => 'MainController@index', 'as' => 'index']);
Route::get('/logouttt', 'MainController@logout');

// Route::post('/otp-login', 'Auth\LoginController@otpLogin')->name('otp-login');













Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
