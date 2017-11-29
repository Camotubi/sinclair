<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */


Route::get('/exhibition/paginate/{amount}','ExhibitionController@apiPaginate');
Route::get('/artPiece/paginate/{amount}','ArtPieceController@apiPaginate');
Route::get('/visitor/paginate/{amount}','VisitorController@apiPaginate');
Route::get('/visit/paginate/{amount}','VisitController@apiPaginate');
Route::get('/tag/paginate/{amount}','TagController@apiPaginate');
Route::get('/sinclairPerson/paginate/{amount}','SinclairPersonController@apiPaginate');
Route::get('/publication/paginate/{amount}','PublicationController@apiPaginate');
Route::get('/insuranceCarrier/paginate/{amount}','InsuranceCarrierController@apiPaginate');
Route::get('/condecoration/paginate/{amount}','CondecorationController@apiPaginate');
Route::get('/furniture/paginate/{amount}','FurnitureController@apiPaginate');
Route::get('/artStyle/paginate/{amount}','ArtStyleController@apiPaginate');
Route::get('/user/findUsername/{username}','UserController@findUsername');
Route::get('/user/findEmail/{email}','UserController@findEmail');

Route::get('/artPiece/{id}/rents/paginate/{amount}','ArtPieceController@apiRentPaginate');
Route::get('/artPiece/{id}/images/paginate/{amount}','ArtPieceController@apiImagesPaginate');
Route::get('/artPiece/{id}/restorations/paginate/{amount}','ArtPieceController@apiRestorationPaginate');
Route::get('/legalEntity/paginate/{amount}','LegalEntityController@apiPaginate');
