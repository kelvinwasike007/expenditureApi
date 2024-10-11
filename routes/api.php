<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function (Request $request) : JsonResponse {
    return response()->json($request);
});


Route::prefix('auth')->namespace('App\Http\Controllers\Api')->controller('AuthController')->group(function ()  {
    Route::post('register', 'register');  
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');  
});


Route::namespace('App\Http\Controllers\Api')->middleware('auth:sanctum')->group(function()  {
    Route::prefix("/expenses")->group(function ()  {
        Route::controller('ExpenseCategoryController')->group(function ()  {

            Route::post("/category", "add");
            Route::get("/category/{id}", "view");
            Route::put("/category/{edit}", "edit");
            Route::get("/category", "list");
            Route::delete("/category/{id}", "delete");
            
        });       
    });
});