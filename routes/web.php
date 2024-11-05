<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSTController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
// admin LTE
Route::get('/', function () {
    return view('welcome');
});
Route::get('/template', function () {
    return view('welcome');
});
Route::get('/form', function () {
    return view('forms.general');
});

Route::get('/form-user', function () {
    return view('forms.form-user');
});
Route::get('/form-level', function () {
    return view('forms.form-level');
});

// admin LTE
Route::get('/', [WelcomeController::class, 'index']);

// kategori 
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori/store', [KategoriController::class, 'store']);

// post
Route::resource('m_user', POSTController::class);





Route::group(['prefix' => 'level'], function() {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function() {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function() {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'stok'], function() {
    Route::get('/', [StockController::class, 'index']);
    Route::post('/list', [StockController::class, 'list']);
    Route::get('/create', [StockController::class, 'create']);
    Route::post('/', [StockController::class, 'store']);
    Route::get('/{id}', [StockController::class, 'show']);
    Route::get('/{id}/edit', [StockController::class, 'edit']);
    Route::put('/{id}', [StockController::class, 'update']);
    Route::delete('/{id}', [StockController::class, 'destroy']);
});

Route::group(['prefix' => 'penjualan'], function() {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/list', [PenjualanController::class, 'list']);
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/{id}', [PenjualanController::class, 'show']);
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
    Route::put('/{id}', [PenjualanController::class, 'update']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
});


route::get('login', [AuthController::class, 'index'])->name('login');
route::get('regsiter', [AuthController::class, 'register'])->name('register');
route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
route::get('logout', [AuthController::class, 'logout'])->name('logout');
route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');


Route::group(['middleware' => ['auth']], function() {

    route::group(['middleware' => ['cek_login:1']], function() {
        route::resource('admin', AdminController::class);
    });
    route::group(['middleware' => ['cek_login:2']], function() {
        Route::resource('manager', ManagerController::class);
    });
});