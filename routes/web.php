<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

    Route::get('/category_admin', [AdminController::class, 'category'])->name('category.admin');

    Route::get('all_posts', [PostController::class, 'post'])->name('post.admin');
    Route::get('/logout_admin', [AdminController::class, 'logout'])->name('logout.admin');
});
Route::get('category', [CategoryController::class, 'category'])->name('show.modal');

Route::post('/savedata', [PostController::class, 'savedata'])->name('savedata');
Route::post('/editdata', [PostController::class, 'editdata'])->name('editdata');
Route::post('/deletedata', [PostController::class, 'deletedata'])->name('deletedata');
Route::post('/saveCat', [CategoryController::class, 'saveCat'])->name('saveCat');
Route::post('/editCat', [CategoryController::class, 'editCat'])->name('editCat');
Route::post('/deleteCat', [CategoryController::class, 'deleteCat'])->name('deleteCat');
Route::post('/login_post', [AdminController::class, 'loginpost'])->name('login.post');
Route::get('/login_admin', [AdminController::class, 'login'])->name('login');

Route::get('/', [ProjectController::class, 'index'])->name('home');
Route::get('/listing', [ProjectController::class, 'listingPage'])->name('listing.page');
Route::get('/medicalGuide', [ProjectController::class, 'medicalGuide'])->name('medicalGuide');
Route::get('/travelGuide', [ProjectController::class, 'travelGuide'])->name('travelGuide');
Route::get('/studyGuide', [ProjectController::class, 'studyGuide'])->name('studyGuide');
Route::get('/scientificGuide', [ProjectController::class, 'scientificGuide'])->name('scientificGuide');

Route::get('/test', [ProjectController::class, 'test'])->name('test');
Route::get('/postdetail/{id}', [ProjectController::class, 'postDetail'])->name('post.show');
Route::post('/save-comment', [CommentController::class, 'savecomment'])->name('save.comment');

Route::get('/registerationClient', [ClientController::class, 'register'])->name('registerClient');
Route::get('/loginClient', [ClientController::class, 'login'])->name('loginClient');

Route::post('/registeration_Client', [ClientController::class, 'registeration'])->name('register.client');
Route::post('/login_Client', [ClientController::class, 'loginpost'])->name('login.client');
Route::get('/logout_Client', [ClientController::class, 'logout'])->name('logout.client');
