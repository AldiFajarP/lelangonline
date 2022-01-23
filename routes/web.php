<?php

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

    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');


Route::POST('/masuk', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Auth::routes();

Route::group(['middleware'=>['hakakses:karyawan'],'prefix'=>'admin'],function(){

    Route::get('panel', [App\Http\Controllers\Backend\PanelController::class, 'index'])->name('home');

//MASTER
    //master klasifikasi
        Route::get('master/klasifikasi', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'index'])->name('masterklasifikasi.index');
        Route::get('master/klasifikasi/create', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'create'])->name('masterklasifikasi.create');
        Route::post('master/klasifikasi/store', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'store'])->name('masterklasifikasi.store');
        Route::get('master/klasifikasi/edit/{id}', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'edit'])->name('masterklasifikasi.edit');
        Route::post('master/klasifikasi/update', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'update'])->name('masterklasifikasi.update');
        Route::get('master/klasifikasi/destroy/{id}', [App\Http\Controllers\Backend\Master\KlasifikasiController::class, 'destroy'])->name('masterklasifikasi.destroy');
        


    //master kategori
        Route::get('master/kategori', [App\Http\Controllers\Backend\Master\KategoriController::class, 'index'])->name('masterkategori.index');
        Route::get('master/kategori/create', [App\Http\Controllers\Backend\Master\KategoriController::class, 'create'])->name('masterkategori.create');
        Route::post('master/kategori/store', [App\Http\Controllers\Backend\Master\KategoriController::class, 'store'])->name('masterkategori.store');
        Route::get('master/kategori/edit/{id}', [App\Http\Controllers\Backend\Master\KategoriController::class, 'edit'])->name('masterkategori.edit');
        Route::post('master/kategori/update', [App\Http\Controllers\Backend\Master\KategoriController::class, 'update'])->name('masterkategori.update');
        Route::get('master/kategori/destroy/{id}', [App\Http\Controllers\Backend\Master\KategoriController::class, 'destroy'])->name('masterkategori.destroy');

//DATA BARANG
    //data barang
        Route::get('databarang', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'index'])->name('databarang.index');
        Route::get('databarang/create', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'create'])->name('databarang.create');
        Route::get('databarang/searchKAT/{id}', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'searchKAT'])->name('databarang.searchKAT');
        Route::get('databarang/detail/{id}', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'detail'])->name('databarang.detail');
        Route::get('databarang/detailkonfirmasi/{id}', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'detailkonfirmasi'])->name('databarang.detailkonfirmasi');
        Route::post('databarang/store', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'store'])->name('databarang.store');
        Route::get('databarang/edit/{id}', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'edit'])->name('databarang.edit');
        Route::post('databarang/update', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'update'])->name('databarang.update');
        Route::get('databarang/destroy/{id}', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'destroy'])->name('databarang.destroy');

        Route::get('databarang/konfirmasi', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'konfirmasi'])->name('databarang.konfirmasi');
        Route::get('databarang/konfirmasi/{id}', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'konfirmasiproses'])->name('databarang.konfirmasiproses');
        Route::get('databarang/batalkonfirmasi/{id}', [App\Http\Controllers\Backend\DataBarang\DataBarangController::class, 'konfirmasibatal'])->name('databarang.konfirmasibatal');

//SISTEM LELANG
        //Tambah Lelang
        Route::get('lelang/create', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'create'])->name('lelang.create');
        Route::get('lelang/searchDATA/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'searchDATA'])->name('lelang.searchDATA');
        Route::post('lelang/store', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'store'])->name('lelang.store');
        Route::get('lelang/belumdimulai', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'belumdimulai'])->name('lelang.belumdimulai');
        Route::get('lelang/detail/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'detail'])->name('lelang.detail');
        Route::get('lelang/edit/{id}', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'edit'])->name('lelang.edit');
        Route::post('lelang/update', [App\Http\Controllers\Backend\Lelang\LelangController::class, 'update'])->name('lelang.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

