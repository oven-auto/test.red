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

Route::get('/v1/front/posts', [\App\Http\Controllers\Api\v1\Front\Post\PostController::class, 'index']);
Route::get('/v1/front/post/similar/{slug}', [\App\Http\Controllers\Api\v1\Front\Post\PostController::class, 'similar']);
Route::get('/v1/front/post/show/{slug}', [\App\Http\Controllers\Api\v1\Front\Post\PostController::class, 'show']);
Route::patch('/v1/front/post/favorite/{post}', [\App\Http\Controllers\Api\v1\Front\Post\PostController::class, 'favorite']);

Route::get('/v1/front/cities', [\App\Http\Controllers\Api\v1\Front\City\CityController::class, 'index']);
