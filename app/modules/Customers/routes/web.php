<?php
Route::namespace('Customer\Http\Controllers')->group(function(){
    Route::prefix(config('route.prefix.backend'))->namespace('BackEnd')->group(function(){

        Route::get('/customers',"CustomerController@index");
    });
    Route::prefix(config('route.prefix.frontend'))->namespace('FrontEnd')->group(function(){

        Route::get('/customers',"CustomerController@index");
    });
});


// Route::get('/home', function () {
//     return view('welcome');
// });

