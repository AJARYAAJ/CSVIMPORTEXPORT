<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
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

Route::get('/', [ImportController::class, 'index'])->name('index');
Route::get('export', [ImportController::class, 'export'])->name('export');
Route::post('/import', [ImportController::class, 'import'])->name('import');
Route::get('/destroy/{id}', [ImportController::class, 'destroy'])->name('emp.destroy');