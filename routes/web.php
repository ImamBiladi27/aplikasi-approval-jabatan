<?php

use App\Http\Controllers\TodoController;
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

// Route::get('/exportexcel', [TodoController::class, 'exportexcel'])->name('exportexcel');
/**
 * update todo
 */
// Route::put('todos/{todo}', 'TodoController@update');

/**
 * Delete Todo
 */
// Route::get('/todos/{todo}/delete', 'TodoController@delete');

//controller LoginController
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/register', [\App\Http\Controllers\LoginController::class,'register'])->name('register');
Route::post('actionlogin', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');
Route::post('actionregister',[\App\Http\Controllers\LoginController::class,'actionregister'])->name('actionregister');
Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//controller TodoController
Route::resource('/todo', \App\Http\Controllers\TodoController::class)->middleware('auth');

Route::get('/approval', [\App\Http\Controllers\TodoController::class, 'approval'])->name('approval');
Route::post('update', [\App\Http\Controllers\TodoController::class, 'update'])->name('update');
// Route::post('/delete', [\App\Http\Controllers\TodoController::class, 'delete'])->name('delete');
Route::get('/todo/{id}/delete', [\App\Http\Controllers\TodoController::class, 'delete'])->name('todo.delete');

Route::get('/tambah-data',[\App\Http\Controllers\TodoController::class,'create'])->name('tambah-data');
Route::post('/insert',[\App\Http\Controllers\TodoController::class,'store'])->name('store');
Route::post('/tambahBiodata',[\App\Http\Controllers\TodoController::class,'tambahBiodata'])->name('tambahBiodata');
Route::get('home', [\App\Http\Controllers\TodoController::class, 'index'])->name('home')->middleware('auth');
Route::get('/biodata',[\App\Http\Controllers\TodoController::class,'form'])->name('biodata');
Route::get('/getbiodata',[\App\Http\Controllers\TodoController::class,'biodata'])->name('getbiodata');
Route::post('/getkecamatan',[\App\Http\Controllers\TodoController::class,'getkecamatan'])->name('getkecamatan');
Route::post('/getkelurahan',[\App\Http\Controllers\TodoController::class,'getkelurahan'])->name('getkelurahan');
