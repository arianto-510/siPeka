<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DapurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Guest
Route::get('/', [Controller::class, 'index']);
Route::get('/kontak', [Controller::class, 'kontak']);
Route::get('/checkout', [Controller::class, 'checkout'])->middleware('auth');


// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route Product
Route::get('/menu', [ProductController::class, 'index'])->middleware('auth');
Route::get('/cart/{id}', [ProductController::class, 'addToCart'])->middleware('auth');
Route::get('/cart', [ProductController::class, 'cart'])->middleware('auth');
Route::delete('/delete', [ProductController::class, 'hapusItem'])->name('remove-from-cart')->middleware('auth');
Route::get('/emptycart', [ProductController::class, 'empty'])->middleware('auth');
Route::get('/checkout/store', [ProductController::class, 'store'])->middleware('auth');
Route::post('/checkout/store', [ProductController::class, 'store'])->middleware('auth');

// Route Dapur
Route::get('/dapur', [DapurController::class, 'index'])->middleware('auth');
Route::get('/dapur/pesanan', [DapurController::class, 'dapur'])->middleware('auth');
Route::get('/dapur/kontak', [DapurController::class, 'kontak'])->middleware('auth');


//Route Admin
Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/adminmenu', [DashboardController::class, 'menu'])->middleware('auth');
Route::post('/tambahmenu', [DashboardController::class, 'store'])->middleware('auth');
Route::delete('/deletemenu/{id}', [DashboardController::class, 'delete'])->middleware('auth');
Route::post('/detailmenu/{id}', [DashboardController::class, 'detailMenu'])->middleware('auth');
Route::get('/admin/kasir', [DashboardController::class, 'kasir'])->middleware('auth');
Route::get('/admin/{id}/struk', [DashboardController::class, 'cetak'])->middleware('auth');
Route::put('/admin/{id}/update', [DashboardController::class, 'statusDone'])->middleware('auth');
Route::get('/admin/laporan', [DashboardController::class, 'laporan'])->middleware('auth');
