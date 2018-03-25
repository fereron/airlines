<?php

use Illuminate\Routing\Router;
/**@var Router $router */


Route::get('/', function () {
    return view('layouts.app');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/{vue_capture?}', function () {
    return view('layouts.app');
})->where('vue_capture', '[\/\w\.-]*');
