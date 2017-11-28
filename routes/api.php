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
Route::get('/user/findUsername/{username}','UserController@findUsername');
Route::get('/user/findEmail/{email}','UserController@findEmail');

Route::get('/artPiece/{id}/images/paginate/{amount}','ArtPieceController@apiImagesPaginate');
Route::get('/artPiece/{id}/restorations/paginate/{amount}','ArtPieceController@apiRestorationPaginate');
Route::get('/legalEntity/paginate/{amount}','LegalEntityController@apiPaginate');
