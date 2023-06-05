<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KoordinatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Children\AkademicController;
use App\Http\Controllers\Children\BeasiswaController;
use App\Http\Controllers\Children\KegiatanController;
use App\Http\Controllers\ChildrenController;
use App\Models\Role;

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
    Route::get('/dashboard/admin/detail-koor/{id}', [AdminController::class, 'detailKoor'])->name('admin.detail-koor');

    Route::get('/dashboard/admin/register', [AuthController::class, 'registerKoor'])->name('admin.register');
    Route::post('/dashboard/admin/register', [AuthController::class, 'storeRegisterKoor'])->name('admin.store-register');
    Route::get('/dashboard/admin/riwayatAkun', [AdminController::class, 'riwayatAkun'])->name('admin.riwayat-akun');

    Route::get('/dashboard/admin/anak', [AdminController::class, 'anak'])->name('admin.anak');
    Route::get('/dashboard/admin/detail-anak/{id}', [AdminController::class, 'detailAnak'])->name('admin.detail-anak');

    Route::get('/dashboard/admin/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::get('/dashboard/admin/riwayat-pengajuan', [AdminController::class, 'riwayatPengajuan'])->name('admin.riwayat-pengajuan');
    Route::get('/dashboard/admin/update-pengajuan/{id}', [AdminController::class, 'editPengajuanChildren'])->name('admin.edit-pengajuan-anak');
    Route::put('/dashboard/admin/update-pengajuan/{id}', [AdminController::class, 'updatePengajuanChildren'])->name('admin.update-pengajuan-anak');
});

Route::group(['middleware' => ['auth', 'koor']], function () {
    Route::get('/dashboard/koordinator', [KoordinatorController::class, 'index'])->name('koordinator.index');
    Route::get('/dashboard/koordinator/detail-anak/{id}', [KoordinatorController::class, 'detailIndex'])->name('koordinator.detail-index');

    Route::get('/dashboard/koordinator/about', [KoordinatorController::class, 'about'])->name('koordinator.about');
    Route::get('/dashboard/koordinator/create-data', [KoordinatorController::class, 'createData'])->name('koordinator.create-data');
    Route::post('/dashboard/koordinator/about', [KoordinatorController::class, 'storeData'])->name('koordinator.store');
    Route::get('/dashboard/koordinator/edit-data/{id}', [KoordinatorController::class, 'editData'])->name('koordinator.edit-data');
    Route::put('/dashboard/koordinator/edit-data/{id}', [KoordinatorController::class, 'updateData'])->name('koordinator.update-data');

    // register akun
    Route::get('/dashboard/koordinator/register', [AuthController::class, 'registerAnak'])->name('koordinator.register');
    Route::post('/dashboard/koordinator/register', [AuthController::class, 'storeRegisterAnak'])->name('koordinator.store-register');

    // pengajuan
    Route::get('/dashboard/koordinator/pengajuan', [KoordinatorController::class, 'pengajuan'])->name('koordinator.pengajuan');
    Route::get('/dashboard/koordinator/edit-pengajuan/{id}', [KoordinatorController::class, 'editPengajuan'])->name('koordinator.edit-pengajuan');
    Route::put('/dashboard/koordinator/edit-pengajuan/{id}', [KoordinatorController::class, 'updatePengajuan'])->name('koordinator.update-pengajuan');

    // beasiswa
    Route::get('/dashboard/koordinator/beasiswa', [KoordinatorController::class, 'beasiswa'])->name('koordinator.beasiswa');
    Route::get('/dashboard/koordinator/update-beasiswa/{id}', [KoordinatorController::class, 'editBeasiswa'])->name('koordinator.edit-beasiswa');
    Route::put('/dashboard/koordinator/update-beasiswa/{id}', [KoordinatorController::class, 'updateBeasiswa'])->name('koordinator.update-beasiswa');

    // akademik
    Route::get('/dashboard/koordinator/akademik', [KoordinatorController::class, 'akademik'])->name('koordinator.akademik');
    Route::get('/dashboard/koordinator/update-akademik/{id}', [KoordinatorController::class, 'editAkademik'])->name('koordinator.edit-akademik');
    Route::put('/dashboard/koordinator/update-akademik/{id}', [KoordinatorController::class, 'updateAkademik'])->name('koordinator.update-akademik');

    // kegiatan reguler
    Route::get('/dashboard/koordinator/kegiatan', [KoordinatorController::class, 'kegiatanReguler'])->name('koordinator.kegiatan');
    Route::get('/dashboard/koordinator/update-kegiatan/{id}', [KoordinatorController::class, 'editKegiatanReguler'])->name('koordinator.edit-kegiatan');
    Route::put('/dashboard/koordinator/update-kegiatan/{id}', [KoordinatorController::class, 'updateKegiatanReguler'])->name('koordinator.update-kegiatan');

    // kegiatan ppa
    Route::get('/dashboard/koordinator/kegiatan-ppa', [KoordinatorController::class, 'kegiatanPpa'])->name('koordinator.kegiatan-ppa');
    Route::get('/dashboard/koordinator/update-kegiatan-ppa/{id}', [KoordinatorController::class, 'editKegiatanPpa'])->name('koordinator.edit-kegiatan-ppa');
    Route::put('/dashboard/koordinator/update-kegiatan-ppa/{id}', [KoordinatorController::class, 'updateKegiatanPpa'])->name('koordinator.update-kegiatan-ppa');
});

Route::group(['middleware' => ['auth', 'child']], function () {
    Route::get('/dashboard/children', [ChildrenController::class, 'index'])->name('child.index');
    Route::get('/dashboard/children/about', [ChildrenController::class, 'about'])->name('child.about');

    // data wali
    Route::get('/dashboard/children/data-wali', [ChildrenController::class, 'showParent'])->name('child.show-parent');
    Route::get('/dashboard/children/detail-parent/{id}', [ChildrenController::class, 'detailParent'])->name('child.detail-parent');
    Route::get('/dashboard/children/create-parent', [ChildrenController::class, 'createParentData'])->name('child.create-parent');
    Route::post('/dashboard/children/create-parent', [ChildrenController::class, 'storeParentData'])->name('child.store-parent');
    Route::get('/dashboard/children/edit-parent/{id}', [ChildrenController::class, 'editParentData'])->name('child.edit-parent');
    Route::put('/dashboard/children/update-parent/{id}', [ChildrenController::class, 'updateParentData'])->name('child.update-parent');
    Route::delete('/dashboard/children/delete-parent/{id}', [ChildrenController::class, 'deleteParentData'])->name('child.delete-parent');

    // data diri
    Route::get('/dashboard/children/create-child', [ChildrenController::class, 'createChildrenData'])->name('child.create-child');
    Route::post('/dashboard/children/create-child', [ChildrenController::class, 'storeChildrenData'])->name('child.store-child');
    Route::get('/dashboard/children/edit-child/{id}', [ChildrenController::class, 'editChildrenData'])->name('child.edit-child');
    Route::put('/dashboard/children/update-child/{id}', [ChildrenController::class, 'updateChildrenData'])->name('child.update-child');
    Route::delete('/dashboard/children/delete-child/{id}', [ChildrenController::class, 'deleteChildrenData'])->name('child.delete-child');

    // data beasiswa
    Route::get('/dashboard/children/beasiswa', [BeasiswaController::class, 'beasiswa'])->name('child.beasiswa');
    Route::get('/dashboard/children/create-beasiswa', [BeasiswaController::class, 'createBeasiswa'])->name('child.create-beasiswa');
    Route::post('/dashboard/children/create-beasiswa', [BeasiswaController::class, 'storeBeasiswa'])->name('child.store-beasiswa');

    // data akademik
    Route::get('/dashboard/children/akademik', [AkademicController::class, 'akademik'])->name('child.akademik');
    Route::get('/dashboard/children/create-akademik', [AkademicController::class, 'createAkademik'])->name('child.create-akademik');
    Route::post('/dashboard/children/create-akademik', [AkademicController::class, 'storeAkademik'])->name('child.store-akademik');

    // data kegiatan
    Route::get('/dashboard/children/kegiatan', [KegiatanController::class, 'kegiatanReguler'])->name('child.kegiatan');
    Route::get('/dashboard/children/create-kegiatan', [KegiatanController::class, 'createKegiatanReguler'])->name('child.create-kegiatan');
    Route::post('/dashboard/children/create-kegiatan', [KegiatanController::class, 'storeKegiatanReguler'])->name('child.store-kegiatan');

    Route::get('/dashboard/children/kegiatan-ppa', [KegiatanController::class, 'kegiatanPpa'])->name('child.kegiatan-ppa');
    Route::get('/dashboard/children/create-kegiatan-ppa', [KegiatanController::class, 'createKegiatanPpa'])->name('child.create-kegiatan-ppa');
    Route::post('/dashboard/children/create-kegiatan-ppa', [KegiatanController::class, 'storeKegiatanPpa'])->name('child.store-kegiatan-ppa');
});




