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
Route::post('/searchEmployee', [App\Http\Controllers\EmployeeController::class, 'search'])->name('searchEmployee');
Route::get('/editEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('editEmployee');
Route::post('/updateEmployee', [App\Http\Controllers\EmployeeController::class, 'update'])->name('updateEmployee');
Route::get('/employee_detail/{id}', [App\Http\Controllers\EmployeeController::class, 'showEmployeeDetail'])->name('employee.detail');

//Career Path Development Route
Route::get('/addCPD/{id}', [App\Http\Controllers\CPDController::class, 'addCPD'])->name('insertCPD');
Route::post('/addCPD/store', [App\Http\Controllers\CPDController::class, 'storeCPD'])->name('addCPD');
Route::get('/viewEmployeeCPD', [App\Http\Controllers\CPDController::class, 'show'])->name('viewEmployeeCPD');
Route::post('/searchEmployeeCPD', [App\Http\Controllers\CPDController::class, 'search'])->name('searchEmployeeCPD');
Route::get('/viewCPD', [App\Http\Controllers\CPDController::class, 'showCPD'])->name('viewCPD');
Route::post('/searchCPD', [App\Http\Controllers\CPDController::class, 'searchCPD'])->name('searchCPD');
Route::get('/editCPD/{id}', [App\Http\Controllers\CPDController::class, 'editCPD'])->name('editCPD');
Route::post('/updateCPD', [App\Http\Controllers\CPDController::class, 'updateCPD'])->name('updateCPD');
Route::get('/deleteCPD/{id}', [App\Http\Controllers\CPDController::class, 'delete'])->name('deleteCPD');
Route::get('/cpd_detail/{id}', [App\Http\Controllers\CPDController::class, 'showCPDDetail'])->name('cpd.detail');

//Vaccination Appointment Route
Route::get('/addVA/{id}', [App\Http\Controllers\VaccinationController::class, 'addVA'])->name('insertVA');
Route::post('/addVA/store', [App\Http\Controllers\VaccinationController::class, 'storeVA'])->name('addVA');
Route::get('/viewEmployeeVA', [App\Http\Controllers\VaccinationController::class, 'show'])->name('viewEmployeeVA');
Route::post('/searchEmployeeVA', [App\Http\Controllers\VaccinationController::class, 'search'])->name('searchEmployeeVA');
Route::get('/viewVA', [App\Http\Controllers\VaccinationController::class, 'showVA'])->name('viewVA');
Route::post('/searchVA', [App\Http\Controllers\VaccinationController::class, 'searchVA'])->name('searchVA');
Route::get('/editVA/{id}', [App\Http\Controllers\VaccinationController::class, 'editVA'])->name('editVA');
Route::post('/updateVA', [App\Http\Controllers\VaccinationController::class, 'updateVA'])->name('updateVA');
Route::get('/deleteVA/{id}', [App\Http\Controllers\VaccinationController::class, 'delete'])->name('deleteVA');
Route::get('/va_detail/{id}', [App\Http\Controllers\VaccinationController::class, 'showVADetail'])->name('va.detail');
Route::get('/findAddress', [App\Http\Controllers\VaccinationController::class, 'findAddress'])->name('findAddress');

//Health Facility Route
Route::get('/addHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'add'])->name('insertHealthFacility');
Route::post('/addHealthFacility/store', [App\Http\Controllers\HealthFacilityController::class, 'store'])->name('addHealthFacility');
Route::get('/viewHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'show'])->name('viewHealthFacility');
Route::post('/searchHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'search'])->name('searchHealthFacility');
Route::get('/editHealthFacility/{id}', [App\Http\Controllers\HealthFacilityController::class, 'edit'])->name('editHealthFacility');
Route::post('/updateHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'update'])->name('updateHealthFacility');
Route::get('/deleteHealthFacility/{id}', [App\Http\Controllers\HealthFacilityController::class, 'delete'])->name('deleteHealthFacility');
