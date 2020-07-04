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


Route::middleware('guest')->prefix('v1')->group(function () {
    
    // Auth controller
    Route::post('/register', 'Api\AuthController@register');
    Route::post('/login', 'Api\AuthController@login');
    // Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');
    // Route::post('/password/reset', 'Api\ResetPasswordController@reset');
    // Route::get('/user/{id}', 'Api\UserController@show');
});

Route::middleware('auth:api')->prefix('v1')->group(function () {
    
    //User
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    //authors
    // Route::get('/authors/{author}', 'AuthorsController@show');
    // Route::get('/authors', 'AuthorsController@index');
    Route::apiResource('authors', 'AuthorsController');
});
