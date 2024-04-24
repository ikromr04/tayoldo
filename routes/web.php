<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/ae', [HomeController::class, 'ae'])->name('ae');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/download', [ProductController::class, 'download'])->name('products.download');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
  Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

  Route::group(['middleware' => ['AdminCheck'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashController::class, 'index'])->name('dashboard');
    Route::get('/state', [DashController::class, 'state'])->name('dashboard.state');
    Route::post('/update-text', [DashController::class, 'updateText']);

    Route::get('/products/{action?}/{product?}', [DashController::class, 'products'])->name('dashboard.products');
    Route::post('/products/{action?}', [DashController::class, 'productsPost'])->name('dashboard.products.post');
  });
});
