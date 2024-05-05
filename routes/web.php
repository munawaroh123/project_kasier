<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GrafikController;
use App\Models\DetailTransaksi;
use App\Http\Controllers\ProdukController;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Absensi;
use App\Models\Menu;
use App\Models\Meja;
use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Transaksi;
use App\Models\User;

Route::get('/', [HomeController::class, 'index']);
Route::get('/grafik', [GrafikController::class, 'index']);
Route::resource('menu', MenuController::class);
Route::resource('jenis', JenisController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('stok', StokController::class);
Route::resource('user', UserController::class);
Route::post('user', [UserController::class,'store']);
Route::get('user', [UserController::class,'user'])->name('user');


Route::resource('meja', MejaController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('nota/{nofaktur}',[TransaksiController::class, 'faktur']);
Route::resource('detail', DetailTransaksiController::class);
Route::resource('produk', ProdukController::class);
Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');
Route::post('menu/import', [MenuController::class, 'importData'])->name('import-menu');
Route::get('export/jenis', [JenisController::class, 'exportData'])->name('export-jenis');
Route::post('jenis/import', [JenisController::class, 'importData'])->name('import-jenis');
Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');
Route::post('meja/import', [MejaController::class, 'importData'])->name('import-meja');
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export-pelanggan');
Route::post('pelanggan/import', [PelangganController::class, 'importData'])->name('import-pelanggan');
Route::get('export/kategori', [KategoriController::class,'exportData'])->name('export-kategori');
Route::post('kategori/import', [KategoriController::class,'importData'])->name('import-kategori');
Route::get('export/absensi', [AbsensiController::class,'exportData'])->name('export-absensi');
Route::post('absensi/import', [AbsensiController::class, 'importData'])->name('import-absensi');
Route::get('export/stok', [StokController::class, 'exportData'])->name('export-stok');
Route::post('stok/import', [StokController::class, 'importData'])->name('import-stok');
Route::get('generate/absensi', [AbsensiController::class,'absensipdf'])->name('absensi-pdf');


//login 
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekUserLogin'])->name('cekUserLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//route yang sudah login
Route::group(['middleware' => 'auth' ], function(){
Route::get('/', [HomeController::class, 'index']);    
Route::get('profile', [HomeController::class, 'profile']); 
Route::get('contact', [HomeController::class, 'contact']); 
Route::get('hub', [HomeController::class, 'hub']); 
Route::resource('transaksi', TransaksiController::class);    
});

//route untuk admin
Route::group(['middleware' => ['cekUserLogin:1' ]], function(){

});

//route untuk kasir
Route::group(['middleware' => ['cekUserLogin:2' ]], function(){ 
    Route::resource('transaksi', TransaksiController::class); 

  });
