<?php
  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CowController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MilkController;
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
  
Route::get('/', function () {
    return view('welcome');
});
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'dashboard'])->name('admin.home');
    Route::get('/admin/sapi', [CowController::class, 'indexAdminCow'])->name('admin.sapi');
    Route::get('/admin/penjaga', [UserController::class, 'indexAdminPenjaga'])->name('admin.penjaga');
    Route::get('/admin/penjaga/tambah', [UserController::class, 'createPenjaga'])->name('admin.penjaga.create');
    Route::post('/admin/penjaga/store', [UserController::class, 'storePenjaga']);
    Route::get('/admin/penjaga/edit/{id}', [UserController::class,'editPenjaga'])->name('admin.penjaga.edit');
    Route::patch('/admin/penjaga/update/{id}', [UserController::class, 'updatePenjaga']);
    Route::get('/admin/profil',[UserController::class,'adminProfile']);
    Route::get('/admin/profil/edit/{id}', [UserController::class,'editAdminProfil']);
    Route::patch('/admin/profil/update/{id}', [UserController::class, 'updateAdminProfil']);
    Route::get('/admin/profil/password/edit', [UserController::class, 'editAdminPassword']);
    Route::get('/admin/penjaga/password/edit/{id}', [UserController::class, 'editPenjagaPassword'])->name('admin.penjaga.password.edit');
    Route::post('/admin/profil/password/update', [UserController::class, 'updateAdminPassword']);
    Route::post('/admin/penjaga/password/update/{id}', [UserController::class, 'updatePenjagaPassword']);
    Route::get('/admin/penjadwalan', [ScheduleController::class, 'indexAdminSchedule'])->name('admin.penjadwalan');
    Route::get('/admin/transaksi', [TransactionController::class, 'indexAdminTransaction'])->name('admin.transaksi');
    Route::get('/admin/transaksi/tambah',[TransactionController::class, 'createTransaction'])->name('admin.transaksi.create');
    Route::post('/admin/transaksi/store',[TransactionController::class, 'storeTransaction']);
    Route::get('/admin/transaksi/edit/{id}', [TransactionController::class,'editTransaction'])->name('admin.transaksi.edit');
    Route::patch('/admin/transaksi/update/{id}', [TransactionController::class, 'updateTransaction']);
    Route::delete('/admin/transaksi/delete/{id}', [TransactionController::class, 'deleteTransaction'])->name('admin.transaksi.delete');
    Route::get('/admin/pemerahan', [MilkController::class, 'indexAdminMilk'])->name('admin.pemerahan');
});
  
/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:penjaga'])->group(function () {
  
    Route::get('/penjaga/home', [HomeController::class, 'penjagaHome'])->name('penjaga.home');
    Route::get('/penjaga/sapi', [CowController::class, 'indexPenjagaCow'])->name('penjaga.sapi');
    Route::get('/penjaga/sapi/tambah', [CowController::class, 'createCow'])->name('penjaga.sapi.create');
    Route::post('/penjaga/sapi/store', [CowController::class, 'storeCow']);
    Route::get('/penjaga/sapi/edit/{id}', [CowController::class,'editCow'])->name('penjaga.sapi.edit');
    Route::patch('/penjaga/sapi/update/{id}', [CowController::class, 'updateCow']);
    Route::get('/penjaga/profil', [UserController::class,'penjagaProfile']);
    Route::get('/penjaga/penjadwalan', [ScheduleController::class, 'indexPenjagaSchedule'])->name('penjaga.penjadwalan');
    Route::get('/penjaga/penjadwalan/status', [ScheduleController::class, 'changeStatus']);
    Route::get('/penjaga/penjadwalan/tambah', [ScheduleController::class, 'createSchedule'])->name('penjaga.penjadwalan.create');
    Route::post('/penjaga/penjadwalan/store',[ScheduleController::class, 'storeSchedule']);
    Route::get('/penjaga/penjadwalan/edit/{id}', [ScheduleController::class,'editSchedule'])->name('penjaga.penjadwalan.edit');
    Route::patch('/penjaga/penjadwalan/update/{id}', [ScheduleController::class, 'updateSchedule']);
    Route::get('/penjaga/pemerahan', [MilkController::class, 'indexPenjagaMilk'])->name('penjaga.pemerahan');
    Route::get('/penjaga/pemerahan/tambah', [MilkController::class, 'createMilk'])->name('penjaga.pemerahan.create');
    Route::post('/penjaga/pemerahan/store', [MilkController::class, 'storeMilk']);
    Route::get('/penjaga/pemerahan/edit/{id}', [MilkController::class,'editMilk'])->name('penjaga.pemerahan.edit');
    Route::patch('/penjaga/pemerahan/update/{id}', [MilkController::class, 'updateMilk']);
});

