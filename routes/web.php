<?php

use App\Http\Controllers\CharterController;
use App\Http\Controllers\CharterFrontController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateFrontController;
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
Route::get('/', function(){
    return view('front.pages.home',[
        'heading' => ''
    ]);
})->name('home');

Route::get('/front/charter', [CharterFrontController::class,'index'])->name('frontcharter');
Route::get('/front/charter/scancht', [CharterFrontController::class,'scan'])->name('scancht');
Route::post('/front/charter/scancht/result', [CharterFrontController::class,'checkscan'])->name('checkdata');
Route::post('/front/charter/download', [CharterFrontController::class,'downloadfile'])->name('download');

Route::post('/front/certificate/download', [CertificateFrontController::class,'downloadfile'])->name('downloadcrt');



Route::get('/adm', function () {
    return view('admin.pages.dashboard',[
        'header' => 'Dashboard',
    ]);
})->name('homepage');

// ADMIN

Route::get('/adm/charter', [CharterController::class, 'index'])->name('charter');
Route::delete('/adm/charter/destroy', [CharterController::class, 'destroy'])->name('destroydch');
Route::get('/adm/charter/edit/{charter:serial_number}', [CharterController::class, 'edit'])->name('editdch');
Route::put('/adm/charter/put/{charter:id}', [CharterController::class, 'put'])->name('putdch');
Route::get('/adm/charter/create', [CharterController::class, 'create'])->name('createdch');
Route::post('/adm/charter/store', [CharterController::class, 'store'])->name('storedch');
Route::get('/adm/charter/export', [CharterController::class, 'ExportExcel'])->name('exportdch');

Route::get('/adm/certificate', [CertificateController::class, 'index'])->name('certificate');
route::get('/adm/cerificate/create', [CertificateController::class,'create'])->name('createcrt');
route::post('/adm/cerificate/store', [CertificateController::class,'store'])->name('storecrt');
route::delete('/adm/cerificate/destroy', [CertificateController::class,'destroy'])->name('destroycrt');
Route::get('/adm/certificate/export', [CertificateController::class, 'ExportExcel'])->name('exportcrt');


Route::get('/adm/student', [StudentController::class, 'index'])->name('student');
Route::delete('/adm/student/destroy', [StudentController::class, 'destroy'])->name('destroystd');
Route::get('/adm/student/create', [StudentController::class, 'create'])->name('createstd');
Route::post('/adm/student/store', [StudentController::class, 'store'])->name('storestd');
Route::post('/adm/student/importexc', [StudentController::class, 'importexcel'])->name('exclstd');
Route::get('/adm/student/edit/{student:id}', [StudentController::class, 'edit'])->name('editstd');
Route::put('/adm/student/put/{student:id}', [StudentController::class,'update'])->name('putstd');

Route::get('/adm/event', [EventController::class,'index'])->name('event');
Route::get('/adm/event/create', [EventController::class,'create'])->name('createevt');
Route::post('/adm/event/store', [EventController::class,'store'])->name('storeevt');
Route::delete('/adm/event/destroy', [EventController::class,'destroy'])->name('destroyevt');
route::get('/adm/event/edit/{event:id}', [EventController::class,'edit'])->name('editevt');
route::put('/adm/event/put/{event:id}', [EventController::class,'update'])->name('putevt');


Route::get('/test', function(){
    return view('exportsbarcode2',[
        'collection'=> Certificate::with(['student','event'])->get(),
    ]);
});
