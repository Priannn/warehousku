<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuplementController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\WheyController;
use App\Http\Controllers\CreController;
use App\Http\Controllers\GaiController;
use App\Http\Controllers\AdminwController;
use App\Http\Controllers\AdmingController;
use App\Http\Controllers\AdmincController;

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

// landing page
Route::get('/landing', [LandingController::class, 'index']);
Route::post('/landing', [LandingController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/landing.detail', [DetailController::class, 'index'])->name('landing.detail');
Route::get('/landing.whey', [WheyController::class, 'index'])->name('landing.whey');
Route::get('/landing.creatine', [CreController::class, 'index'])->name('landing.creatine');
Route::get('/landing.gainer', [GaiController::class, 'index'])->name('landing.gainer');
// Route::get('/detail/{category}/{id}', [DetailController::class, 'showByCategory'])->name('detail.category');
// Route::get('/landing.detail', [DetailController::class, 'showByCategory'])->name('landing.detail');

// Login
Route::get('/',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

// register
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

// dashboard
// contact
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');

// whey admin
Route::get('/dashboard/whey', [AdminwController::class, 'index'])->name('dashboard.whey');
Route::post('/dashboard/whey/create', [AdminwController::class, 'store'])->name('dashboard.whey.create');
Route::delete('/dashboard/whey/{id}', [AdminwController::class, 'destroy'])->name('dashboard.whey.destroy');
Route::put('/dashboard/whey/{id}', [AdminwController::class, 'update'])->name('dashboard.whey.update');

// Route::put('/dashboard/{id}', [AdminwController::class, 'update'])->name('dashboard.update');
Route::get('/logout', [LoginController::class, 'logout']);

// gainer admin
Route::get('/dashboard/gainer', [AdmingController::class, 'index'])->name('dashboard.gainer');
Route::post('/dashboard/gainer/create', [AdmingController::class, 'store'])->name('dashboard.gainer.create');
Route::delete('/dashboard/gainer/{id}', [AdmingController::class, 'destroy'])->name('dashboard.gainer.destroy');
Route::put('/dashboard/gainer/{id}', [AdmingController::class, 'update'])->name('dashboard.gainer.update');

// creatine admin
Route::get('/dashboard/creatine', [AdmincController::class, 'index'])->name('dashboard.creatine');
Route::post('/dashboard/creatine/create', [AdmincController::class, 'store'])->name('dashboard.creatine.create');
Route::delete('/dashboard/creatine/{id}', [AdmincController::class, 'destroy'])->name('dashboard.creatine.destroy');
Route::put('/dashboard/creatine/{id}', [AdmincController::class, 'update'])->name('dashboard.creatine.update');