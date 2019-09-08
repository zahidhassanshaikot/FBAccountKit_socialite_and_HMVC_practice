<?php
Route::namespace('Customers\Http\Controller')->group(function(){
    Route::get('/cd',"\CustomerController@index");
});


// Route::get('/home', function () {
//     return view('welcome');
// });

