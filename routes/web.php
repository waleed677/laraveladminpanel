<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\filesController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    if (!$request->session()->has('user')) {
        return view('login');
    } else {
        return redirect('dashboard');
    }
});

Route::get('login', [LoginController::class, 'showLogin']);
Route::post('login', [LoginController::class, 'doLogin']);

Route::get('dashboard', [dashboardController::class, 'index']);



Route::get('logout', [LoginController::class, 'logout']);

Route::get('profile', [profileController::class, 'index'])->middleware('loggedin');
Route::post('update', [profileController::class, 'updateProfile']);

Route::post('addCategory', [filesController::class, 'insert'])->middleware('loggedin');
Route::get('addCategory', [filesController::class, 'addCategory']);

Route::post('upload', [filesController::class, 'upload'])->middleware('loggedin');
Route::get('upload', [filesController::class, 'index'])->middleware('loggedin');

Route::get('files/{id}', [filesController::class, 'delete']);
Route::get('files/{id}/edit', [filesController::class, 'edit']);
Route::post('updateFile', [filesController::class, 'update']);

Route::get('category/{id}', [filesController::class, 'deleteCategory']);
Route::get('category/{id}/edit', [filesController::class, 'editCategory']);
Route::post('updateCategory', [filesController::class, 'updateCategory']);
