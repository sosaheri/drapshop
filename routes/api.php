<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\PeopleController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([], function () {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::apiResource('products', ProductController::class)->only([ 'index', 'show',]);
    Route::apiResource('people', PeopleController::class)->only([ 'index', 'show',]);



});


Route::group(['middleware' => ['auth:api']], function () {

        Route::apiResource('products', ProductController::class)->except([ 'index', 'show',]);
        Route::apiResource('people', PeopleController::class)->except([ 'index', 'show',]);


});

