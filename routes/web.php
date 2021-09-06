<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/addEmployee', [App\Http\Controllers\EmployeeController::class, 'add'])->name('insertEmployee');

Route::post('/addEmployee/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('addEmployee');

Route::get('/viewEmployee', [App\Http\Controllers\EmployeeController::class, 'show'])->name('viewEmployee');

Route::post('/searchEmployee', [App\Http\Controllers\EmployeeController::class, 'search'])->name('searchEmployeeAndDepartment');