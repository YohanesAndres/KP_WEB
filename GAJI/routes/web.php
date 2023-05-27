<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;

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
// Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::get('/', function () {
       return view('welcome');
    });
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/data_tonase', [App\Http\Controllers\Data_tonase_Controller::class, 'index'])->name('data_tonase.index');
    Route::get('/data_tonase/create', [App\Http\Controllers\Data_tonase_Controller::class, 'create'])->name('data_tonase.create');
    Route::post('/data_tonase/store', [App\Http\Controllers\Data_tonase_Controller::class, 'store'])->name('data_tonase.store');
    Route::get('/data_tonase/edit/{id}', [App\Http\Controllers\Data_tonase_Controller::class, 'edit'])->name('data_tonase.edit');
    Route::patch('/data_tonase/update/{id}', [App\Http\Controllers\Data_tonase_Controller::class, 'update'])->name('data_tonase.update');
    Route::delete('/data_tonase/delete/{id}', [App\Http\Controllers\Data_tonase_Controller::class, 'delete'])->name('data_tonase.delete');
    
    Route::get('/kas_uj', [App\Http\Controllers\Kas_uj_Controller::class, 'index'])->name('kas_uj.index');
    Route::get('/kas_uj/create', [App\Http\Controllers\Kas_uj_Controller::class, 'create'])->name('kas_uj.create');
    Route::get('/kas_uj/create_daribos', [App\Http\Controllers\Kas_uj_Controller::class, 'create_daribos'])->name('kas_uj.create_daribos');
    Route::get('/kas_uj/create_credit', [App\Http\Controllers\Kas_uj_Controller::class, 'create_credit'])->name('kas_uj.create_credit');
    Route::get('/kas_uj/create_debit', [App\Http\Controllers\Kas_uj_Controller::class, 'create_debit'])->name('kas_uj.create_debit');
    Route::post('/kas_uj/store', [App\Http\Controllers\Kas_uj_Controller::class, 'store'])->name('kas_uj.store');
    Route::post('/kas_uj/store_daribos', [App\Http\Controllers\Kas_uj_Controller::class, 'store_daribos'])->name('kas_uj.store_daribos');
    Route::post('/kas_uj/store_credit', [App\Http\Controllers\Kas_uj_Controller::class, 'store_credit'])->name('kas_uj.store_credit');
    Route::post('/kas_uj/store_debit', [App\Http\Controllers\Kas_uj_Controller::class, 'store_debit'])->name('kas_uj.store_debit');
    Route::get('/kas_uj/edit/{id}', [App\Http\Controllers\Kas_uj_Controller::class, 'edit'])->name('kas_uj.edit');
    Route::patch('/kas_uj/update/{id}', [App\Http\Controllers\Kas_uj_Controller::class, 'update'])->name('kas_uj.update');
    Route::delete('/kas_uj/delete/{id}', [App\Http\Controllers\Kas_uj_Controller::class, 'delete'])->name('kas_uj.delete');
    
    Route::get('/kategori', [App\Http\Controllers\Kategori_Controller::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [App\Http\Controllers\Kategori_Controller::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [App\Http\Controllers\Kategori_Controller::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [App\Http\Controllers\Kategori_Controller::class, 'edit'])->name('kategori.edit');
    Route::patch('/kategori/update/{id}', [App\Http\Controllers\Kategori_Controller::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/delete/{id}', [App\Http\Controllers\Kategori_Controller::class, 'delete'])->name('kategori.delete');
    
    Route::get('/kendaraan', [App\Http\Controllers\Kendaraan_Controller::class, 'index'])->name('kendaraan.index');
    Route::get('/kendaraan/create', [App\Http\Controllers\Kendaraan_Controller::class, 'create'])->name('kendaraan.create');
    Route::post('/kendaraan/store', [App\Http\Controllers\Kendaraan_Controller::class, 'store'])->name('kendaraan.store');
    Route::get('/kendaraan/edit/{id}', [App\Http\Controllers\Kendaraan_Controller::class, 'edit'])->name('kendaraan.edit');
    Route::patch('/kendaraan/update/{id}', [App\Http\Controllers\Kendaraan_Controller::class, 'update'])->name('kendaraan.update');
    Route::delete('/kendaraan/delete/{id}', [App\Http\Controllers\Kendaraan_Controller::class, 'delete'])->name('kendaraan.delete');
    
    Route::get('/muat_bongkar', [App\Http\Controllers\Muat_bongkar_Controller::class, 'index'])->name('muat_bongkar.index');
    Route::get('/muat_bongkar/create', [App\Http\Controllers\Muat_bongkar_Controller::class, 'create'])->name('muat_bongkar.create');
    Route::post('/muat_bongkar/store', [App\Http\Controllers\Muat_bongkar_Controller::class, 'store'])->name('muat_bongkar.store');
    Route::get('/muat_bongkar/edit/{id}', [App\Http\Controllers\Muat_bongkar_Controller::class, 'edit'])->name('muat_bongkar.edit');
    Route::patch('/muat_bongkar/update/{id}', [App\Http\Controllers\Muat_bongkar_Controller::class, 'update'])->name('muat_bongkar.update');
    Route::delete('/muat_bongkar/delete/{id}', [App\Http\Controllers\Muat_bongkar_Controller::class, 'delete'])->name('muat_bongkar.delete');
    
    Route::get('/namasopir', [App\Http\Controllers\Namasopir_Controller::class, 'index'])->name('namasopir.index');
    Route::get('/namasopir/create', [App\Http\Controllers\Namasopir_Controller::class, 'create'])->name('namasopir.create');
    Route::post('/namasopir/store', [App\Http\Controllers\Namasopir_Controller::class, 'store'])->name('namasopir.store');
    Route::get('/namasopir/edit/{id}', [App\Http\Controllers\Namasopir_Controller::class, 'edit'])->name('namasopir.edit');
    Route::patch('/namasopir/update/{id}', [App\Http\Controllers\Namasopir_Controller::class, 'update'])->name('namasopir.update');
    Route::delete('/namasopir/delete/{id}', [App\Http\Controllers\Namasopir_Controller::class, 'delete'])->name('namasopir.delete');
    
    Route::get('/rekap', [App\Http\Controllers\Rekap_Controller::class, 'index'])->name('rekap.index');
    Route::get('/rekap/create', [App\Http\Controllers\Rekap_Controller::class, 'create'])->name('rekap.create');
    Route::post('/rekap/store', [App\Http\Controllers\Rekap_Controller::class, 'store'])->name('rekap.store');
    Route::get('/rekap/edit/{id}', [App\Http\Controllers\Rekap_Controller::class, 'edit'])->name('rekap.edit');
    Route::patch('/rekap/update/{id}', [App\Http\Controllers\Rekap_Controller::class, 'update'])->name('rekap.update');
    Route::delete('/rekap/delete/{id}', [App\Http\Controllers\Rekap_Controller::class, 'delete'])->name('rekap.delete');
    
    Route::get('/rekap_detail/create', [App\Http\Controllers\Rekap_Controller::class, 'createDetail'])->name('rekap_detail.create');
    Route::post('/rekap_detail/store', [App\Http\Controllers\Rekap_Controller::class, 'storeDetail'])->name('rekap_detail.store');
    Route::get('/rekap_detail/edit/{id}', [App\Http\Controllers\Rekap_Controller::class, 'edit'])->name('rekap_detail.edit');
    Route::patch('/rekap_detail/update/{id}', [App\Http\Controllers\Rekap_Controller::class, 'update'])->name('rekap_detail.update');
    Route::delete('/rekap_detail/delete/{id}', [App\Http\Controllers\Rekap_Controller::class, 'delete'])->name('rekap_detail.delete');
    
    Route::get('/rekap_fuso', [App\Http\Controllers\Rekap_fuso_Controller::class, 'index'])->name('rekap_fuso.index');
    Route::get('/rekap_fuso/create', [App\Http\Controllers\Rekap_fuso_Controller::class, 'create'])->name('rekap_fuso.create');
    Route::post('/rekap_fuso/store', [App\Http\Controllers\Rekap_fuso_Controller::class, 'store'])->name('rekap_fuso.store');
    Route::get('/rekap_fuso/edit/{id}', [App\Http\Controllers\Rekap_fuso_Controller::class, 'edit'])->name('rekap_fuso.edit');
    Route::patch('/rekap_fuso/update/{id}', [App\Http\Controllers\Rekap_fuso_Controller::class, 'update'])->name('rekap_fuso.update');
    Route::delete('/rekap_fuso/delete/{id}', [App\Http\Controllers\Rekap_fuso_Controller::class, 'delete'])->name('rekap_fuso.delete');
    
    Route::get('/rekap_fusoDetail/create', [App\Http\Controllers\Rekap_fuso_Controller::class, 'createDetail'])->name('rekap_fuso_detail.create');
    Route::post('/rekap_fusoDetail/store', [App\Http\Controllers\Rekap_fuso_Controller::class, 'storeDetail'])->name('rekap_fuso_detail.store');
    Route::get('/rekap_fusoDetail/edit/{id}', [App\Http\Controllers\Rekap_fuso_Controller::class, 'editDetail'])->name('rekap_fuso_detail.edit');
    Route::patch('/rekap_fusoDetail/update/{id}', [App\Http\Controllers\Rekap_fuso_Controller::class, 'updateDetail'])->name('rekap_fuso_detail.update');
    Route::delete('/rekap_fusoDetail/delete/{id}', [App\Http\Controllers\Rekap_fuso_Controller::class, 'deleteDetail'])->name('rekap_fuso_detail.delete');
    
    Route::get('/uang_jalan', [App\Http\Controllers\Uang_jalan_Controller::class, 'index'])->name('uang_jalan.index');
    Route::get('/uang_jalan/create', [App\Http\Controllers\Uang_jalan_Controller::class, 'create'])->name('uang_jalan.create');
    Route::post('/uang_jalan/store', [App\Http\Controllers\Uang_jalan_Controller::class, 'store'])->name('uang_jalan.store');
    Route::get('/uang_jalan/edit/{id}', [App\Http\Controllers\Uang_jalan_Controller::class, 'edit'])->name('uang_jalan.edit');
    Route::patch('/uang_jalan/update/{id}', [App\Http\Controllers\Uang_jalan_Controller::class, 'update'])->name('uang_jalan.update');
    Route::delete('/uang_jalan/delete/{id}', [App\Http\Controllers\Uang_jalan_Controller::class, 'delete'])->name('uang_jalan.delete');
    
    Route::get('/update_mobil', [App\Http\Controllers\Update_mobil_Controller::class, 'index'])->name('update_mobil.index');
    Route::get('/update_mobil/create', [App\Http\Controllers\Update_mobil_Controller::class, 'create'])->name('update_mobil.create');
    Route::post('/update_mobil/store', [App\Http\Controllers\Update_mobil_Controller::class, 'store'])->name('update_mobil.store');
    Route::get('/update_mobil/edit/{id}', [App\Http\Controllers\Update_mobil_Controller::class, 'edit'])->name('update_mobil.edit');
    Route::patch('/update_mobil/update/{id}', [App\Http\Controllers\Update_mobil_Controller::class, 'update'])->name('update_mobil.update');
    Route::delete('/update_mobil/delete/{id}', [App\Http\Controllers\Update_mobil_Controller::class, 'delete'])->name('update_mobil.delete');

    Route::get('/tujuan', [App\Http\Controllers\tujuan_Controller::class, 'index'])->name('tujuan.index');
    Route::get('/tujuan/create', [App\Http\Controllers\tujuan_Controller::class, 'create'])->name('tujuan.create');
    Route::post('/tujuan/store', [App\Http\Controllers\tujuan_Controller::class, 'store'])->name('tujuan.store');
    Route::get('/tujuan/edit/{id}', [App\Http\Controllers\tujuan_Controller::class, 'edit'])->name('tujuan.edit');
    Route::patch('/tujuan/update/{id}', [App\Http\Controllers\tujuan_Controller::class, 'update'])->name('tujuan.update');
    Route::delete('/tujuan/delete/{id}', [App\Http\Controllers\tujuan_Controller::class, 'delete'])->name('tujuan.delete');

    Route::get('/hasil', [App\Http\Controllers\Rekap_fuso_Controller::class, 'hasil'])->name('hasil.index');
    Route::post('/logout', [User_Controller::class, 'logout'])->name('logout');

    Route::get('/user', [App\Http\Controllers\User_Controller::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\User_Controller::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\User_Controller::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\User_Controller::class, 'edit'])->name('user.edit');
    Route::patch('/user/update/{id}', [App\Http\Controllers\User_Controller::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [App\Http\Controllers\User_Controller::class, 'delete'])->name('user.delete');
    
    Route::get('/kendaraan/get-kategori/{id}', [App\Http\Controllers\Kendaraan_Controller::class, 'getKategori']);
    Route::get('/muat_bongkar/get-uang_jalan/{id}', [App\Http\Controllers\Muat_bongkar_Controller::class, 'getUangjalan']);
    Route::get('/muat_bongkar/get-tujuan/{id}', [App\Http\Controllers\Muat_bongkar_Controller::class, 'getTujuan']);
    Route::get('/data_tonase/get-tonase/{id}', [App\Http\Controllers\Data_tonase_Controller::class, 'getTonase']);
    Route::get('/uang_jalan/get-dataJalan/{id}', [App\Http\Controllers\Uang_jalan_Controller::class, 'getDatajalan']);

// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'auth.session')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
