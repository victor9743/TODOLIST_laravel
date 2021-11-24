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
use App\Http\Controllers\issue_controller;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/issues', [issue_controller::class, 'issues']);
Route::post('/issues', [issue_controller::class, 'store_issue']);
Route::get("/issues/{id}",[issue_controller::class, 'findById']);
Route::put('/issues/{id}',[issue_controller::class, 'update_issue']);