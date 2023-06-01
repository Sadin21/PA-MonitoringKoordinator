<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KoordinatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChildrenController;

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

Route::get('/', function () {
    return redirect('/dashboard/login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/dashboard/login', [AuthController::class, 'index'])->name('login');
    Route::post('/dashboard/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/dashboard/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::group(['middleware' => ['auth', 'koor']], function () {
    Route::get('/dashboard/koordinator', [KoordinatorController::class, 'index'])->name('koordinator.index');
    Route::get('/dashboard/koordinator/about', [KoordinatorController::class, 'about'])->name('koordinator.about');
    Route::post('/dashboard/koordinator/about', [KoordinatorController::class, 'storeData'])->name('koordinator.store');

    Route::get('/dashboard/koordinator/pengajuan', [KoordinatorController::class, 'pengajuan'])->name('koordinator.pengajuan');
    Route::get('/dashboard/koordinator/edit-pengajuan/{id}', [KoordinatorController::class, 'editPengajuan'])->name('koordinator.edit-pengajuan');
    Route::get('/dashboard/koordinator/edit-pengajuan/{id}', [KoordinatorController::class, 'updatePengajuan'])->name('koordinator.update-pengajuan');
});

Route::group(['middleware' => ['auth', 'child']], function () {
    Route::get('/dashboard/children', [ChildrenController::class, 'index'])->name('child.index');
    Route::get('/dashboard/children/about', [ChildrenController::class, 'about'])->name('child.about');

    // data wali
    Route::get('/dashboard/children/create-parent', [ChildrenController::class, 'createParentData'])->name('child.create-parent');
    Route::post('/dashboard/children/create-parent', [ChildrenController::class, 'storeParentData'])->name('child.store-parent');
    Route::get('/dashboard/children/edit-parent/{id}', [ChildrenController::class, 'editParentData'])->name('child.edit-parent');
    Route::put('/dashboard/children/update-parent/{id}', [ChildrenController::class, 'updateParentData'])->name('child.update-parent');
    Route::delete('/dashboard/children/delete-parent/{id}', [ChildrenController::class, 'deleteParentData'])->name('child.delete-parent');

    // data anak
    Route::get('/dashboard/children/create-child', [ChildrenController::class, 'createChildrenData'])->name('child.create-child');
    Route::post('/dashboard/children/create-child', [ChildrenController::class, 'storeChildrenData'])->name('child.store-child');
    Route::get('/dashboard/children/edit-child/{id}', [ChildrenController::class, 'editChildrenData'])->name('child.edit-child');
    Route::put('/dashboard/children/update-child/{id}', [ChildrenController::class, 'updateChildrenData'])->name('child.update-child');
    Route::delete('/dashboard/children/delete-child/{id}', [ChildrenController::class, 'deleteChildrenData'])->name('child.delete-child');
});




