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
// Main Page Routes
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

Route::get('/f/artPiece/index', 'ArtPieceController@frontIndex');

Route::get('/f/artPiece/show/{id}', 'ArtPieceController@frontShow');

Route::get('/contacto', function () {
});

Route::get('/cita', function () {
	return view('frontend.cita');
});
// Staff Routes
Route::get('/login',function() {
	return view('auth.login');
})->name('login');
Route::post('/login','Auth\LoginController@authenticate');
Route::resources([
	'artPiece' => 'ArtPieceController',
	'dashBoard' => 'DashboardController',
	'furniture' => 'FurnitureController',
	'legalEntity' => 'LegalEntityController',
	'publication' => 'PublicationController',
	'rent' => 'RentController',
	'multimedia' => 'MultimediaController',
	'user' => 'UserController',
	'artStyle' => 'ArtStyleController',
	'condecoration' => 'CondecorationController',
	'exhibition' => 'ExhibitionController',
	'insuranceCarrier' => 'InsuranceCarrierController',
	'insurance' => 'InsuranceController',
	'sinclairPerson' => 'SinclairPersonController',
	'visit' => 'VisitController',
	'visitor' => 'VisitorController'
]);
Route::get('/dashboard','DashboardController@index');
Route::get('/dashboard/p','DashboardController@test');
Route::get('/test','ArtStyleController@test'); 
Route::get('artPiece/{id}/delete','ArtPieceController@showDeleteConfirmation');
Route::get('/artPiece/{id}/addImage' ,'ArtPieceController@addImage');
Route::post('/artPiece/{id}/addImage' ,'ArtPieceController@storeImage');
