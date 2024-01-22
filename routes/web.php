<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [FrontController::class,'index'])->name('home');
Route::get('/checkdata', [FrontController::class,'checkdata'])->name('checkdata');
Route::get('/download/file', [FrontController::class,'downloadFile'])->name('downloadFile');
Route::get('/scanbrcd', [FrontController::class,'scan'])->name('scan');
Route::post('/resltbrcd', [FrontController::class,'result'])->name('result');

Route::get('/login/adm', [LoginController::class , 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get("/adm", [AdminController::class,"index"])->name("admdashboard")->middleware('auth');;
Route::get("/adm/create", [AdminController::class,"create"])->name("createdata")->middleware('auth');;
Route::post("/adm/store", [AdminController::class,"store"])->name("storedata")->middleware('auth');;
Route::delete("/adm/destroy", [AdminController::class,"destroy"])->name("destroydata")->middleware('auth');;
Route::post("/adm/importexcel", [AdminController::class,"importExcel"])->name("importdatawithExc")->middleware('auth');;
Route::get("/adm/edit/{file:id}", [AdminController::class,"show"])->name("showeditdata")->middleware('auth');;
Route::put("/adm/put/{file:id}",[AdminController::class, 'update'])->name("updatedata")->middleware('auth');;

Route::get('/test', function(){
    return view('front.pages.soft');
})->name('user');
