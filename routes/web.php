<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\adminController;
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


Route::get('/',[studentController::class,'index'])->name('student.index');
Route::get('/create',[studentController::class,'create'])->name('student.create');
Route::post('/store',[studentController::class,'store'])->name('student.store');
Route::get('ad/',[adminController::class, 'index'])->name('admin.dashboard')->middleware('verified');;
Route::get('/delete/{id}',[studentController::class,'destroy'])->name('student.delete');
Route::get('/edit/{id}',[studentController::class,'edit'])->name('student.edit');
Route::post('/update/{id}',[studentController::class, 'update'])->name('student.update');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//---------------------- trash routes-----------------//

Route::get('student/trash',[studentController::class,'trash'])->name('student.trash');
Route::get('student/permanentDelete/{id}',[studentController::class,'permanentDelete'])->name('student.permanentDelete');
Route::get('student/restore/{id}',[studentController::class,'restore'])->name('student.restore');
