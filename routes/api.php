<?php

use App\Http\Controllers\ApisController;
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

Route::get('files', [ApisController::class, 'getAll']);
Route::get('files/type/{type}', [ApisController::class, 'getAllByType']);
Route::get('files/category/{id}', [ApisController::class, 'getAllByCategory']);
Route::get('category', [ApisController::class, 'getAllCategory']);
