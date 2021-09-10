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

//Employee Setting Route
Route::get('/addEmployee', [App\Http\Controllers\EmployeeController::class, 'add'])->name('insertEmployee');
Route::post('/addEmployee/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('addEmployee');
Route::get('/viewEmployee', [App\Http\Controllers\EmployeeController::class, 'show'])->name('viewEmployee');
Route::post('/searchEmployee',[App\Http\Controllers\EmployeeController::class,'search'])->name('searchEmployee');
Route::get('/editEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('editEmployee');
Route::post('/updateEmployee', [App\Http\Controllers\EmployeeController::class, 'update'])->name('updateEmployee');
Route::get('/employee_detail/{id}', [App\Http\Controllers\EmployeeController::class, 'showEmployeeDetail'])->name('employee.detail');

//Career Path Development Route
Route::get('/addCPD', [App\Http\Controllers\EmployeeController::class, 'addCPD'])->name('insertCPD');
Route::post('/addCPD/store', [App\Http\Controllers\EmployeeController::class, 'storeCPD'])->name('addCPD');
Route::get('/viewCPD', [App\Http\Controllers\EmployeeController::class, 'showCPD'])->name('viewCPD');
Route::post('/searchCPD',[App\Http\Controllers\EmployeeController::class,'searchCPD'])->name('searchCPD');
Route::get('/editCPD/{id}', [App\Http\Controllers\EmployeeController::class, 'editCPD'])->name('editCPD');
Route::post('/updateCPD', [App\Http\Controllers\EmployeeController::class, 'updateCPD'])->name('updateCPD');