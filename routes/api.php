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

Route::get('/v1/courses',[\App\Http\Controllers\API\CourseAPIController::class,'index']);
Route::get('/v1/course/show/{id}/lesson',[\App\Http\Controllers\API\CourseAPIController::class,'getLesson']);
Route::get('/v1/course/show/{slug}/content',[\App\Http\Controllers\API\CourseAPIController::class,'getContent']);

Route::get('v1/lesson/show/{course}/{lesson}',[\App\Http\Controllers\API\LessonAPIController::class,'findBySlug']);


Route::post('/v1/auth/register',[\App\Http\Controllers\API\AuthController::class,'register']);
Route::post('/v1/auth/login',[\App\Http\Controllers\API\AuthController::class,'login']);
Route::post('/v1/auth/me',[\App\Http\Controllers\API\AuthController::class,'me'])->middleware('jwt');;
Route::post('/v1/auth/refresh',[\App\Http\Controllers\API\AuthController::class,'refresh']);


