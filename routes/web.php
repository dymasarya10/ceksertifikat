<?php

use App\Http\Controllers\CharterController;
use App\Http\Controllers\CharterFrontController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateFrontController;
use App\Http\Controllers\LoginController;
use App\Models\Certificate;
use App\Models\Charter;
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
Route::get('/', function () {
    return view('front.pages.home', [
        'heading' => ''
    ]);
})->name('home');

Route::get('/front/charter', [CharterFrontController::class, 'index'])->name('frontcharter');
Route::get('/front/charter/scancht', [CharterFrontController::class, 'scan'])->name('scancht');
Route::post('/front/charter/scancht/result', [CharterFrontController::class, 'checkscan'])->name('checkdata');
Route::post('/front/charter/download', [CharterFrontController::class, 'downloadfile'])->name('download');

Route::get('/front/certificate', [CertificateFrontController::class, 'index'])->name('frontcertificate');
Route::get('/front/certificate/scancrt', [CertificateFrontController::class, 'scan'])->name('scancrt');
Route::post('/front/certificate/scancrt/result', [CertificateFrontController::class, 'checkscan'])->name('checkdatacrt');
Route::post('/front/certificate/download', [CertificateFrontController::class, 'downloadfile'])->name('downloadcrt');


Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::get('/adm', function () {
    return view('admin.pages.dashboard', [
        'header' => 'Dashboard',
    ]);
})->name('homepage')->middleware('auth');

// ADMIN

Route::get('/adm/charter', [CharterController::class, 'index'])->name('charter')->middleware('auth');
Route::delete('/adm/charter/destroy', [CharterController::class, 'destroy'])->name('destroydch')->middleware('auth');
Route::get('/adm/charter/edit/{charter:serial_number}', [CharterController::class, 'edit'])->name('editdch')->middleware('auth');
Route::put('/adm/charter/put/{charter:id}', [CharterController::class, 'put'])->name('putdch')->middleware('auth');
Route::get('/adm/charter/create', [CharterController::class, 'create'])->name('createdch')->middleware('auth');
Route::post('/adm/charter/store', [CharterController::class, 'store'])->name('storedch')->middleware('auth');
Route::get('/adm/charter/export', [CharterController::class, 'ExportExcel'])->name('exportdch')->middleware('auth');

Route::get('/adm/certificate', [CertificateController::class, 'index'])->name('certificate')->middleware('auth');
route::get('/adm/cerificate/create', [CertificateController::class, 'create'])->name('createcrt')->middleware('auth');
route::post('/adm/cerificate/store', [CertificateController::class, 'store'])->name('storecrt')->middleware('auth');
route::delete('/adm/cerificate/destroy', [CertificateController::class, 'destroy'])->name('destroycrt')->middleware('auth');
Route::get('/adm/certificate/export', [CertificateController::class, 'ExportExcel'])->name('exportcrt')->middleware('auth');


Route::get('/adm/student', [StudentController::class, 'index'])->name('student')->middleware('auth');
Route::delete('/adm/student/destroy', [StudentController::class, 'destroy'])->name('destroystd')->middleware('auth');
Route::get('/adm/student/create', [StudentController::class, 'create'])->name('createstd')->middleware('auth');
Route::post('/adm/student/store', [StudentController::class, 'store'])->name('storestd')->middleware('auth');
Route::post('/adm/student/importexc', [StudentController::class, 'importexcel'])->name('exclstd')->middleware('auth');
Route::get('/adm/student/edit/{student:id}', [StudentController::class, 'edit'])->name('editstd')->middleware('auth');
Route::put('/adm/student/put/{student:id}', [StudentController::class, 'update'])->name('putstd')->middleware('auth');

Route::get('/adm/event', [EventController::class, 'index'])->name('event')->middleware('auth');
Route::get('/adm/event/create', [EventController::class, 'create'])->name('createevt')->middleware('auth');
Route::post('/adm/event/store', [EventController::class, 'store'])->name('storeevt')->middleware('auth');
Route::delete('/adm/event/destroy', [EventController::class, 'destroy'])->name('destroyevt')->middleware('auth');
route::get('/adm/event/edit/{event:id}', [EventController::class, 'edit'])->name('editevt')->middleware('auth');
route::put('/adm/event/put/{event:id}', [EventController::class, 'update'])->name('putevt')->middleware('auth');


Route::get('/test', function () {
    return view('auth.login');
});
