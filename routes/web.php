<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/table', [CrudController::class, 'showData']);
Route::get('/dashboard', [CrudController::class, 'dashboard']);
Route::get('/report', [CrudController::class, 'showReport']);
Route::get('/show-admin', [CrudController::class, 'showAdmin']);
Route::get('/get-attendance', [CrudController::class, 'getAttendance']);
Route::get('/add-data', [CrudController::class, 'addData']);
Route::post('/store-data', [CrudController::class, 'storeData']);
Route::get('/edit-data/{id}', [CrudController::class, 'editData']);
Route::post('/update-data/{id}', [CrudController::class, 'updateData']);
Route::get('/attendance-report', [CrudController::class, 'search']);
Route::post('/submit-attendance', [CrudController::class, 'submitAttendance']);
Route::get('/delete-data/{id}', [CrudController::class, 'deleteData']);
