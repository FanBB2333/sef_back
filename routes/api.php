<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/searchStuById/{id}',function($id){
    $ret = (new App\Http\Controllers\ViewStudent)->viewStudent($id);
    return $ret;
});

Route::get('/getAllCourse',function(){
    $ret = (new App\Http\Controllers\CourseController)->getAll();
    return $ret;
});

Route::get('/getDistinctCourse',function(){
    $ret = (new App\Http\Controllers\CourseController)->getDistinct();
    return $ret;
});

Route::get('/chooseCourse', function() {
    $ret = (new App\Http\Controllers\CourseController)->chooseCourse($_GET['stu'], $_GET['cid']);
    return $ret;
});

Route::get('/choosePlan', function() {
    $ret = (new App\Http\Controllers\CourseController)->choosePlan($_GET['stu'], $_GET['cid']);
    return $ret;
});

Route::get('/getPlanByID', function() {
    $ret = (new App\Http\Controllers\CourseController)->getPlanByID($_GET['id']);
    return $ret;
});

Route::get('/delCourseinPlan', function() {
    $ret = (new App\Http\Controllers\CourseController)->delCourseinPlan($_GET['stu'], $_GET['cid']);
    return $ret;
});

Route::get('/delCourse', function() {
    $ret = (new App\Http\Controllers\CourseController)->delCourse($_GET['stu'], $_GET['cid']);
    return $ret;
});

Route::get('/managerChooseCourse', function() {
    $ret = (new App\Http\Controllers\CourseController)->managerChooseCourse($_GET['stu'], $_GET['cid']);
    return $ret;
});

Route::get('/managerState', function() {
    $ret = (new App\Http\Controllers\TimeManagementController)->set_state($_GET['state']);
    return $ret;
});

Route::get('/getManageState', function() {
    $ret = (new App\Http\Controllers\TimeManagementController)->get_state();
    return $ret[0]->state;
});