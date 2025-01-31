<?php

use App\Http\Controllers\AchievmentController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailContentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\MainInformationController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\PpdbIndexController;
use App\Http\Controllers\SistemInformasiController;
use Doctrine\DBAL\Schema\Index;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use League\Csv\Query\Row;



// ROUTE SISTEM INFORMASI
Route::get('/', [SistemInformasiController::class, 'showData'])->name('moto');
Route::get('/achievment', [AchievmentController::class, "showPrestasi"])->name('prestasi');
Route::get('/activities', [ActivityController::class, "showActivity"])->name('activity');
Route::get('/information', [InformationController::class, 'showInformation'])->name('information');

Route::get('detail-content/{content}/{id}', [DetailContentController::class, 'showContent'])->name('detail-content');
Route::get('main-information', [MainInformationController::class, 'showMainInformation'])->name('main-information');


// ROUTE DAFTAR SISWA
Route::get('/ppdb/register', function () {
    return view('auth.register');
});
Route::post('/ppdb/register', [AuthController::class, 'register'])->name('register');

// ROUTE AUTH PPDB
Route::get('/ppdb/login', [AuthController::class, 'showLoginForm'])->name('ppdb.login');
Route::get('/ppdb/register', [AuthController::class, 'showRegisterForm'])->name('ppdb.register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE PENDAFTARAN
Route::get('/ppdb/pendaftaran', [PpdbController::class, 'ppdbValidation'])
    ->middleware('auth')
    ->name('ppdb.validate');
Route::get('/ppdb/pendaftaran-biodata-siswa', [PpdbController::class, 'showForm'])->name('ppdb.pendaftaran.biodata-siswa');
Route::get('/ppdb/pendataran-biodata-orangtua', [PpdbController::class, 'showBiodataOrangtua'])->name('biodata-orangtua');
Route::post('/ppdb/pendataran-biodata-orangtua', [PpdbController::class, 'saveBiodataOrangtua'])->name('save-biodata-orangtua');
Route::get('/ppdb/input-nilai', [PpdbController::class, 'showFormInputNilai'])->name('input-nilai');
Route::post('/ppdb/input-nilai', [PpdbController::class, 'saveNilai'])->name('save-nilai');
Route::get('/ppdb/upload-document', [PpdbController::class, 'showFormUploadDocument'])->name('upload-document');
Route::get('/ppdb/upload-document-prestasi', [PpdbController::class, 'showFormUploadDocumentPrestasi'])->name('upload-document-prestasi');
Route::get('/ppdb/upload-document-afirmasi', [PpdbController::class, 'showFormUploadDocumentAfirmasi'])->name('upload-document-afirmasi');
Route::post('/ppdb/upload-document', [PpdbController::class, 'saveDocument'])->name('save-document');
Route::post('/ppdb/upload-document-prestasi', [PpdbController::class, 'saveDocumentPrestasi'])->name('save-document-prestasi');
Route::post('/ppdb/upload-document-afirmasi', [PpdbController::class, 'saveDocumentAfirmasi'])->name('save-document-afirmasi');
Route::post('/ppdb/daftar', [PpdbController::class, 'saveBiodataSiswa'])->name('saveBiodataSiswa');

// ROUTE PPDB INDEX
Route::get('/ppdb/index', [PpdbIndexController::class, 'showPpdbIndex'])->name('ppdb-index');
Route::get('/ppdb/peringkat', [PpdbIndexController::class, 'listRangkingSiswa'])->name('rangking-siswa');
Route::get('/ppdb/peringkat-prestasi', [PpdbIndexController::class, 'listRangkingSiswaPrestasi'])->name('rangking-siswa-prestasi');
Route::get('/ppdb/peringkat-afirmasi', [PpdbIndexController::class, 'listRangkingSiswaAfirmasi'])->name('rangking-siswa-afirmasi');
Route::get('/ppdb/bayar-daftar-ulang', [PpdbIndexController::class, 'showFormBayar'])->name('bayar-daftar-ulang');
Route::post('/ppdb/bayar-daftar-ulang', [PpdbIndexController::class, 'saveBuktiBayar'])->name('upload-bukti-bayar');

Route::get('/tes-notif', function () {
    try {
        $recipient = auth()->Auth::user()();

        Notification::make()
            ->title('Saved successfully')
            ->sendToDatabase($recipient);

        Log::info("Notification create by: " . $recipient);
    } catch (\Exception $e) {
        Log::info($e->getMessage());
    }
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
