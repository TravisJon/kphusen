<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('layout.master');
// });

Route::group(['middleware' => 'guest'], function () {
    //Login
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('proses-login');

    //register
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('register.save');
});

//ini untuk menangkap user login yang mana itu bisa diakses di ketiga role
Route::group(['middleware' => 'checkrole: 1,2,3'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [RedirectController::class, 'checkRole'])->name('checkRole.redirect');

    //Data User
    Route::get('/data_user', [UserController::class, 'index'])->name('data_user');
    Route::get('/add_user', [UserController::class, 'create']);
    Route::post('/store_user', [UserController::class, 'store']);
    Route::get('/edit_user/{id}', [UserController::class, 'edit']);
    Route::post('/update_user/{id}', [UserController::class, 'update']);
    Route::post('/update/password/{id}', [UserController::class, 'updatePassword']);
    Route::delete('/delete_user/{id}', [UserController::class, 'destroy'])->name('delete_user');
    //PDF
    Route::get('/pdf_user', [UserController::class, 'pdf']);


    //Kategori Produk
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/add_kategori', [KategoriController::class, 'create']);
    Route::post('/store_kategori', [KategoriController::class, 'store']);
    Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit']);
    Route::post('/update_kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/delete_kategori/{id}', [KategoriController::class, 'destroy'])->name('delete_kategori');
    //PDF
    Route::get('/pdf_kategori', [KategoriController::class, 'pdf']);


    //Satuan Produk
    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan');
    Route::get('/add_satuan', [SatuanController::class, 'create']);
    Route::post('/store_satuan', [SatuanController::class, 'store']);
    Route::get('/edit_satuan/{id}', [SatuanController::class, 'edit']);
    Route::post('/update_satuan/{id}', [SatuanController::class, 'update']);
    Route::delete('/delete_satuan/{id}', [SatuanController::class, 'destroy'])->name('delete_satuan');
    //PDF
    Route::get('/pdf_satuan', [SatuanController::class, 'pdf']);


    //Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/add_produk', [ProdukController::class, 'create']);
    Route::post('/store_produk', [ProdukController::class, 'store']);
    Route::get('/edit_produk/{id}', [ProdukController::class, 'edit']);
    Route::post('/update_produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/delete_produk/{id}', [ProdukController::class, 'destroy'])->name('delete_produk');
    //PDF
    Route::get('/pdf_produk', [ProdukController::class, 'pdf']);
});

// superadmin route middleware | 1 role saja yaitu superadmin
Route::group(['middleware' => 'checkrole: 1'], function () {
    Route::get('/superadmin', [SuperAdminController::class, 'superadmin'])->name('superadmin.dashboard');
});

// admin route middleware | 1 role saja yaitu admin
Route::group(['middleware' => 'checkrole: 2'], function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');
});

// kasir route middleware | 1 role saja yaitu kasir
Route::group(['middleware' => 'checkrole: 3'], function () {
    Route::get('/kasir', [KasirController::class, 'kasir'])->name('kasir.dashboard');
});
