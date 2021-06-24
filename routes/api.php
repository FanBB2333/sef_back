<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ViewResult;
use app\Http\Controllers\CourseController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', 'CourseController@search_classes');


Route::post('/changetime', 'TimeManagementController@update()');

Route::get('/result/{id}',function ($id){
    $ret = (new App\Http\Controllers\ViewResult)->viewResult($id);
    return $ret;
});
