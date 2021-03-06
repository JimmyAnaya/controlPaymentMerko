<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentReportController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/home', PaymentReportController::class);
Route::resource('/home/category', CategoryController::class);
Route::get('/home/{id}/confirmDelete', [PaymentReportController::class, 'confirmDelete']);
