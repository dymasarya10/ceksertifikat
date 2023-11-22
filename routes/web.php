<?php

use App\Http\Controllers\CharterController;
use App\Http\Controllers\CharterFrontController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EventController;
use App\Models\Charter;
use Illuminate\Http\Request;
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
Route::get('/front/charter/download/{filename}', [CharterFrontController::class,'downloadfile'])->name('download');


Route::get('/adm', function () {
    return view('admin.pages.dashboard',[
        'header' => 'Dashboard',
    ]);
})->name('homepage');

// ADMIN

Route::get('/charter', [CharterController::class, 'index'])->name('charter');
Route::delete('/charter/destroy', [CharterController::class, 'destroy'])->name('destroydch');
Route::get('/charter/edit/{charter:serial_number}', [CharterController::class, 'edit'])->name('editdch');
Route::put('/charter/put/{charter:id}', [CharterController::class, 'put'])->name('putdch');

Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::delete('/student/destroy', [StudentController::class, 'destroy'])->name('destroystd');
Route::get('/student/create', [StudentController::class, 'create'])->name('createstd');
Route::post('/student/store', [StudentController::class, 'store'])->name('storestd');
Route::post('/student/importexc', [StudentController::class, 'importexcel'])->name('exclstd');
Route::get('/student/edit/{student:id}', [StudentController::class, 'edit'])->name('editstd');
Route::put('/student/put/{student:id}', [StudentController::class,'update'])->name('putstd');

Route::get('/event', [EventController::class,'index'])->name('event');
