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

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/index', function () {
    return view('frontend.index');
});
Route::get('/quienes_somos', function () {
    return view('frontend.quienes_somos');
});
Route::get('/alfredo', function () {
    return view('frontend.alfredo');
});
Route::get('/galeria', function () {
    return view('frontend.galeria');
});
Route::get('/contacto', function () {
    return view('frontend.contacto');
});
