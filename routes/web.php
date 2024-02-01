<?php

use App\Http\Controllers\ProfileController;

//ROUTE MANAGER UNIT
use App\Http\Controllers\Unit\Manager_Unit\Dashboard\DashboardController as MNGRUnitDashboardController;
use App\Http\Controllers\Unit\Manager_Unit\Harga\HargaPasangController as MNGRUnitHargaPasangController;
use App\Http\Controllers\Unit\Manager_Unit\Pelanggan\DataPelangganController as MNGRUnitDataPelangganController;

//ROUTE TL TEKNIK
use App\Http\Controllers\Unit\TL_Teknik\Dashboard\DashboardController as TLTeknikDashboardController;
use App\Http\Controllers\Unit\TL_Teknik\Harga\HargaBongkarController as TLTeknikHargaBongkarController;
use App\Http\Controllers\Unit\TL_Teknik\Harga\HargaPasangController as TLTeknikHargaPasangController;
use App\Http\Controllers\Unit\TL_Teknik\Pelanggan\DataPelangganController as TLTeknikDataPelangganController;

//ROUTE MANAGER PERENCANAAN
use App\Http\Controllers\UP3\Manager_Perencanaan\Dashboard\DashboardController as MNGRUP3DashboardController;
use App\Http\Controllers\UP3\Manager_Perencanaan\Harga\HargaBongkarController as MNGRUP3HargaBongkarController;
use App\Http\Controllers\UP3\Manager_Perencanaan\Harga\HargaPasangController as MNGRUP3HargaPasangController;
use App\Http\Controllers\UP3\Manager_Perencanaan\Pelanggan\DataPelangganController as MNGRUP3DataPelangganController;

//ROUTE TL RENSIS
use App\Http\Controllers\UP3\TL_Rensis\Dashboard\DashboardController as TLRensisDashboardController;
use App\Http\Controllers\UP3\TL_Rensis\Harga\HargaBongkarController as TLRensisHargaBongkarController;
use App\Http\Controllers\UP3\TL_Rensis\Harga\HargaPasangController as TLRensisHargaPasangController;
use App\Http\Controllers\UP3\TL_Rensis\Pelanggan\DataPelangganController as TLRensisDataPelangganController;
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
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

//ROUTE FOR MANAGER PERENCANAAN
Route::middleware(['auth', 'verified', 'checkrole:Manager Perencanaan'])->group(function () {
    //redirect to dashboard manager
    Route::get('/dashboard-mngr-ren', [MNGRUP3DashboardController::class, 'index'])->name('dashboard.mngr.perencanaan');
    Route::get('/dashboard-ren-persetujuan-terkonfirmasi', [MNGRUP3DashboardController::class, 'DashboardRenTerkonfirmasi'])->name('dashboard-mngr-ren.DashboardRenTerkonfirmasi');
    Route::get('/dashboard-ren-persetujuan-tunggu', [MNGRUP3DashboardController::class, 'DashboardRenTunggu'])->name('dashboard-mngr-ren.DashboardRenTunggu');

    //redirect data harga
    Route::resource('/hargapasang-mngr-ren', MNGRUP3HargaPasangController::class);
    Route::get('/index-hargapasang-ren', [MNGRUP3HargaPasangController::class, 'IndexDataHargaPasang'])->name('hargapasang-mngr-rem.index-hargapasang-ren');
    Route::resource('/hargabongkar-mngr-ren', MNGRUP3HargaBongkarController::class);

    //redirect data pelanggan
    Route::resource('/pelanggan-mngr-ren', MNGRUP3DataPelangganController::class);
    Route::get('/index-dapel-ren', [MNGRUP3DataPelangganController::class, 'IndexDataPelanggan'])->name('pelanggan-mngr-ren.index-dapel-ren');
    Route::get('/detail-dapel-ren/{id}', [MNGRUP3DataPelangganController::class, 'ShowDetailDataPelanggan'])->name('pelanggan-mngr-ren.detail-dapel-ren');
    Route::put('/update-approve-dapel-ren/{id}', [MNGRUP3DataPelangganController::class, 'UpdateApprovalRen'])->name('pelanggan-mngr-ren.UpdateApprovalRen');
    Route::get('/download-survei-ren/{fileName}', [MNGRUP3DataPelangganController::class, 'downloadSurvei'])->name('download-survei-ren');
    Route::post('/download-dapel-ren', [MNGRUP3DataPelangganController::class, 'downloadData'])->name('download-dapel-ren.downloadData');

    //redirect to configure profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//END ROUTE FOR MANAGER PERENCANAAN

//ROUTE FOR TL TEKNIK
Route::middleware(['auth', 'verified', 'checkrole:TL Teknik'])->group(function () {

    //redirect to dashboard tl teknik
    Route::get('/dashboard-tl-teknik', [TLTeknikDashboardController::class, 'index'])->name('dashboard.tl.teknik');
    Route::get('/dashboard-teknik-progress', [TLTeknikDashboardController::class, 'DashboardTeknikProgress'])->name('dashboard-tl-teknik.DashboardTeknikProgress');

    //redirect data harga
    Route::resource('/hargapasang-tl-teknik', TLTeknikHargaPasangController::class);
    Route::resource('/hargabongkar-tl-teknik', TLTeknikHargaBongkarController::class);
    Route::get('/index-hargapasang-teknik', [TLTeknikHargaPasangController::class, 'IndexDataHargaPasang'])->name('hargapasang-tl-teknik.index-hargapasang-teknik');

    //redirect data pelanggan
    Route::resource('/pelanggan-tl-teknik', TLTeknikDataPelangganController::class);
    Route::get('/index-dapel-teknik', [TLTeknikDataPelangganController::class, 'IndexDataPelanggan'])->name('pelanggan-tl-teknik.index-dapel-teknik');
    Route::post('/create-dapel-teknik', [TLTeknikDataPelangganController::class, 'AddDataPelanggan'])->name('pelanggan-tl-teknik.create-dapel-teknik');
    Route::get('/detail-dapel-teknik/{id}', [TLTeknikDataPelangganController::class, 'ShowDetailDataPelanggan'])->name('pelanggan-tl-teknik.detail-dapel-teknik');
    Route::post('/edit-dapel-teknik/{id}', [TLTeknikDataPelangganController::class, 'EditDataPelanggan'])->name('pelanggan-tl-teknik.edit-dapel-teknik');
    Route::get('/download-survei-teknik/{fileName}', [TLTeknikDataPelangganController::class, 'downloadSurvei'])->name('download-survei-teknik');
    Route::post('/download-dapel-teknik', [TLTeknikDataPelangganController::class, 'downloadData'])->name('download-dapel-teknik.downloadData');

    //redirect to configure profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//END ROUTE FOR TL TEKNIK

//ROUTE FOR MANAGER UNIT
Route::middleware(['auth', 'verified', 'checkrole:Manager Unit'])->group(function () {

    //redirect to dashboard manager unit
    Route::get('/dashboard-mngr-unit', [MNGRUnitDashboardController::class, 'index'])->name('dashboard.mngr.unit');
    Route::get('/dashboard-unit-persetujuan-terkonfirmasi', [MNGRUnitDashboardController::class, 'DashboardUnitTerkonfirmasi'])->name('dashboard-mngr-unit.DashboardUnitTerkonfirmasi');
    Route::get('/dashboard-unit-persetujuan-tunggu', [MNGRUnitDashboardController::class, 'DashboardUnitTunggu'])->name('dashboard-mngr-unit.DashboardUnitTunggu');

    //redirect data harga
    Route::resource('/hargapasang-mngr-unit', MNGRUnitHargaPasangController::class);
    Route::get('/index-hargapasang-unit', [MNGRUnitHargaPasangController::class, 'IndexDataHargaPasang'])->name('hargapasang-mngr-unit.index-hargapasang-unit');

    //redirect to data pelanggan
    Route::resource('/pelanggan-mngr-unit', MNGRUnitDataPelangganController::class);
    Route::get('/index-dapel-unit', [MNGRUnitDataPelangganController::class, 'IndexDataPelanggan'])->name('pelanggan-mngr-unit.index-dapel-unit');
    Route::get('/detail-dapel-unit/{id}', [MNGRUnitDataPelangganController::class, 'ShowDetailDataPelanggan'])->name('pelanggan-mngr-unit.detail-dapel-unit');
    Route::get('/download-survei-unit/{fileName}', [MNGRUnitDataPelangganController::class, 'downloadSurvei'])->name('download-survei-unit');
    Route::post('/download-dapel-unit', [MNGRUnitDataPelangganController::class, 'downloadData'])->name('download-dapel-unit.downloadData');

    //redirect to configure profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//END ROUTE FOR MANAGER UNIT

//ROUTE FOR TL RENSIS
Route::middleware(['auth', 'verified', 'checkrole:TL Rensis'])->group(function () {

    // redirect dashboard
    Route::get(
        '/dashboard-tl-rensis',
        [TLRensisDashboardController::class, 'index']
    )->name('dashboard.tl.rensis');
    Route::get('/dashboard-rensis-persetujuan-ren', [TLRensisDashboardController::class, 'DashboardPersetujuanRen'])->name('dashboard-tl-rensis.DashboardPersetujuanRen');
    Route::get('/dashboard-rensis-persetujuan-rensis', [TLRensisDashboardController::class, 'DashboardPersetujuanRensis'])->name('dashboard-tl-rensis.IndexDashboardRensis');
    Route::get('/dashboard-rensis-progress', [TLRensisdashboardController::class, 'DashboardRensisProgress'])->name('dashboard-tl-rensis.DashboardRensisProgress');

    //redirect data harga
    Route::resource('/hargapasang-tl-rensis', TLRensisHargaPasangController::class);
    Route::resource('/hargabongkar-tl-rensis', TLRensisHargaBongkarController::class);
    Route::get('/index-hargapasang-rensis', [TLRensisHargaPasangController::class, 'IndexDataHargaPasang'])->name('hargapasang-tl-rensis.index-hargapasang-rensis');

    //redirect data pelanggan
    Route::resource('/pelanggan-tl-rensis', TLRensisDataPelangganController::class);
    Route::post('/index-dapel-rensis', [TLRensisDataPelangganController::class, 'IndexDataPelanggan'])->name('pelanggan-tl-rensis.index-dapel-rensis');
    Route::post('/create-dapel-rensis', [TLRensisDataPelangganController::class, 'AddDataPelanggan'])->name('pelanggan-tl-rensis.create-dapel-rensis');
    Route::get('/detail-dapel-rensis/{id}', [TLRensisDataPelangganController::class, 'ShowDetailDataPelanggan'])->name('pelanggan-tl-rensis.detail-dapel-rensis');
    Route::post('/edit-dapel-rensis/{id}', [TLRensisDataPelangganController::class, 'EditDataPelanggan'])->name('pelanggan-tl-rensis.edit-dapel-rensis');
    Route::put('/update-approve-dapel-rensis/{id}', [TLRensisDataPelangganController::class, 'UpdateApprovalRensis'])->name('pelanggan-tl-rensis.UpdateApprovalRensis');
    Route::get('/download-survei-rensis/{fileName}', [TLRensisDataPelangganController::class, 'downloadSurvei'])->name('download-survei-rensis');
    Route::post('/download-dapel-rensis', [TLRensisDataPelangganController::class, 'downloadData'])->name('download-dapel-rensis.downloadData');

    //redirect to configure profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//END ROUTE FOR TL Rensis

require __DIR__ . '/auth.php';
