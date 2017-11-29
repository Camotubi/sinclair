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
// 	Main Page Routes
Route::get('/', function () {return view('frontend.index');});
Route::get('/index', function () {return view('frontend.index');});
Route::get('/quienes_somos', function () {return view('frontend.quienes_somos');});
Route::get('/alfredo', function () {return view('frontend.alfredo');});
Route::get('/f/artPiece/index', 'ArtPieceController@frontIndex');
Route::get('/f/artPiece/show/{id}', 'ArtPieceController@frontShow');
Route::get('/contacto', function () {return view('frontend.contacto');});
Route::get('/cita', function () {return view('frontend.cita');});


//	Backend Routes
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
//	Custom routes
//		Login
//
Route::post('/login','Auth\LoginController@authenticate');
//		Dashboard
Route::get('/dashboard','DashboardController@index');
//		ArtPiece
//
Route::get('artPiece/{id}/delete','ArtPieceController@showDeleteConfirmation');
Route::get('artPiece/{id}/restoration/create','ArtPieceController@createRestoration');
Route::post('/artPiece/{id}/restoration','ArtPieceController@addRestoration');


Route::post('/artPiece/restoration/{id}/delete','RestorationController@destroyArtPieceRestoration');
Route::post('/furniture/restoration/{id}/delete','RestorationController@destroyFurnitureRestoration');
Route::get('/artPiece/restoration/{id}/delete','RestorationController@showDeleteArtPieceRestorationConfirmation');
Route::get('/furniture/restoration/{id}/delete','RestorationController@showDeleteFurnitureRestorationConfirmation');
Route::get('/artPiece/{id}/addImage' ,'ArtPieceController@addImage');
Route::get('/artPiece/{id}/addRent' ,'ArtPieceController@addRent');
Route::post('/artPiece/{id}/addRent' ,'ArtPieceController@storeRent');
Route::post('/artPiece/{id}/addImage' ,'ArtPieceController@storeImage');
//		ArtStyle
//
Route::get('artStyle/{id}/delete','ArtStyleController@showDeleteConfirmation');
//		Condecoration
//
Route::get('condecoration/{id}/delete','CondecorationController@showDeleteConfirmation');
//		Exhibition
//
Route::get('exhibition/{id}/delete','ExhibitionController@showDeleteConfirmation');
//		Furniture
//
Route::get('furniture/{id}/delete','FurnitureController@showDeleteConfirmation');
Route::get('restoration/furniture/{id}/delete','RestorationController@showDeleteFurnitureConfirmation');
//		Insurance
//
Route::get('insurance/{id}/delete','InsuranceController@showDeleteConfirmation');
//		InsuranceCarrier
//
Route::get('insuranceCarrier/{id}/delete','InsuranceCarrierController@showDeleteConfirmation');
//		LegalEntity
//
Route::get('legalEntity/{id}/delete','LegalEntityController@showDeleteConfirmation');
//		Multimedia
//
Route::get('multimedia/{id}/delete','MultimediaController@showDeleteConfirmation');
//		Publication
//
Route::get('publication/{id}/delete','PublicationController@showDeleteConfirmation');
//		Rent
//
Route::get('rent/{id}/delete','RentController@showDeleteConfirmation');
//		SincalirPerson
//
Route::get('sinclairPerson/{id}/delete','SinclairPersonController@showDeleteConfirmation');
//		Tag
//
Route::get('tag/{id}/delete','TagController@showDeleteConfirmation');
//		Visit
//
Route::get('visit/{id}/delete','VisitController@showDeleteConfirmation');
//		Visitor
//
Route::get('visitor/{id}/delete','VisitorController@showDeleteConfirmation');
