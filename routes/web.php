<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\HomeController;
use App\HTTP\Controllers\DashboardController;
use App\HTTP\Controllers\ArticleController;
use App\HTTP\Controllers\GovController;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('/masuk', [Authentication::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [Authentication::class, 'login'])->middleware('guest');
Route::post('/keluar', [Authentication::class, 'logout'])->middleware('auth');
Route::get('/artikel', [HomeController::class, 'list_artikel']);
Route::get('/artikel/{artikel}', [HomeController::class, 'show_artikel']);

Route::resource('/admin/article', ArticleController::class)->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/admin/pemerintahan', [GovController::class, 'index'])->middleware('auth');
Route::put('/admin/pemerintahan', [GovController::class, 'ubah_visi'])->middleware('auth');