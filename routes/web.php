<?php
  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CowController;
  
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
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/sapi',[CowController::class, 'indexAdminCow']);
    /* Route::get('/admin/sapi/tambah',[CowController::class, 'createCow']);
    Route::patch('/admin/sapi/store',[CowController::class, 'storeCow']);
    Route::get('/admin/sapi/edit/{id}', [CowController::class,'editCow']);
    Route::patch('/admin/sapi/update/{id}', [CowController::class, 'updateCow']); */
});
  
/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:penjaga'])->group(function () {
  
    Route::get('/penjaga/home', [HomeController::class, 'penjagaHome'])->name('penjaga.home');
    Route::get('/penjaga/sapi',[CowController::class, 'indexPenjagaCow']);
    Route::get('/penjaga/sapi/tambah',[CowController::class, 'createCow']);
    Route::patch('/penjaga/sapi/store',[CowController::class, 'storeCow']);
    Route::get('/penjaga/sapi/edit/{id}', [CowController::class,'editCow']);
    Route::patch('/penjaga/sapi/update/{id}', [CowController::class, 'updateCow']);
});


