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

Route::get('/searchname', function() {
    $ret = (new App\Http\Controllers\CourseController)->search_by_name($_GET['name']);
    return $ret;
});

Route::get('/searchid', function() {
    $ret = (new App\Http\Controllers\CourseController)->search_by_id($_GET['id']);
    return $ret;
});


Route::get('/searchteacher', function() {
    $ret = (new App\Http\Controllers\CourseController)->search_by_teacher($_GET['t']);
    return $ret;
});


Route::post('/changetime', 'TimeManagementController@update()');

Route::get('/searchcourseById/{id}',function ($id){
    $ret = (new App\Http\Controllers\ViewResult)->viewResult($id);
    return $ret;
});

Route::get('/getAllCourse',function(){
    $ret = (new App\Http\Controllers\CourseController)->getAll();
    return $ret;
});

Route::get('/chooseCourse', function() {
    $ret = (new App\Http\Controllers\CourseController)->chooseCourse($_GET['stu'], $_GET['cid']);
    return $ret;
});