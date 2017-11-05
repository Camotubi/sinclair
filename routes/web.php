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

Route::get('/dashboard','DashboardController@index');

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

Route::get('/cita', function () {
    return view('frontend.cita');
});

<<<<<<< HEAD
Route::get('/test', function () {
    return view('query');
});
Route::get('/testAxios','QueriesController@test');
Route::resources([
    'artPiece' => 'ArtPieceController',
    'dashBoard' => 'DashboardController',
    'furniture' => 'FurnitureController',
    'juridicalPerson' => 'JuridicalPersonController',
    'naturalPerson' => 'NaturalPersonController',
    'publication' => 'PublicationController',
    'rent' => 'RentController',
    'restorations' => 'RestorationsController',
>>>>>>> c6ea15ab72b86e7543ce2c11494c494d44826095
]);
