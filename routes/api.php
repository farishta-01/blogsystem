<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login endpoint
Route::post('/login', [ClientController::class, 'loginpost']);
Route::post('/register', [ClientController::class, 'registeration']);

// Protected endpoint
Route::middleware('auth:sanctum')->get('/protected-endpoint', [ClientController::class, 'protectedEndpoint']);

// Post endpoints
Route::post('/savedata', [PostController::class, 'saveData'])->name('savedata');
// Route::get('/editdata/{id}', [PostController::class, 'editData'])->name('editdata');
Route::post('/deletedata/{id}', [PostController::class, 'deleteData'])->name('deletedata');
Route::get('/getallposts', [PostController::class, 'getAllPosts'])->name('getallposts');
Route::post('/updatedata/{id}', [PostController::class, 'updateData'])->name('updatedata');
