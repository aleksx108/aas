<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\ReviewController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ReviewController::class, 'index'])->name('home');
Route::get('/review/create', [App\Http\Controllers\ReviewController::class, 'create'])->name('review-create');
Route::post('/review/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('review-store');
Route::get('/review/show/{instructor_id}', [App\Http\Controllers\ReviewController::class, 'show'])->name('review-show');

//moderation
Route::get('/review/moderate-list', [App\Http\Controllers\ReviewController::class, 'moderateList'])->name('review-moderate-list');
Route::get('/review/ban-author/{creator_id}', [App\Http\Controllers\ReviewController::class, 'banReviewAuthor'])->name('review-ban-author');
Route::get('/review/unban-author/{creator_id}', [App\Http\Controllers\ReviewController::class, 'unbanReviewAuthor'])->name('review-unban-author');
Route::get('/review/delete/{review_id}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review-delete');