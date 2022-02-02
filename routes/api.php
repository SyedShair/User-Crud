<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
////////////////// Rack ///////////////////////
    Route::get('/rack/list',[ApiController::class,'rack_list']);// http://127.0.0.1:8000/api/rack/list  | type = GET Postman
    Route::post('/rack/add', [ApiController::class, 'rack_add']); // url in header type post in postman http://127.0.0.1:8000/api/rack/add | type POSt Postman no auth and in body form-data put values
    Route::get('/rack/fetch/{id}', [ApiController::class, 'rack_edit']);
    Route::post('/rack/update/{id}', [ApiController::class, 'rack_update']);
    Route::get('/rack/delete/{id}', [ApiController::class, 'rack_delete']);




/////////////////  Book ////////////////////////


Route::get('/book/list', [ApiController::class,'book_list']);
Route::post('/book/add', [ApiController::class,'book_add']);
Route::get('/book/fetch/{id}', [ApiController::class,'book_edit']);
Route::post('/book/update/{id}', [ApiController::class,'book_update']);
Route::get('/book/delete/{id}', [ApiController::class,'book_delete']);
Route::get('/book/search', [ApiController::class,'books_search']);



