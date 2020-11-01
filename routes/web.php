<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
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
Route::get('ad/',function(){

    return view('admin.index');
});
Route::get('/delete/{id}',[studentController::class,'destroy'])->name('student.delete');
Route::get('/edit/{id}',[studentController::class,'edit'])->name('student.edit');
