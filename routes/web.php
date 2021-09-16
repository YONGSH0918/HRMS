<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobtitleController;
use App\Http\Controllers\WorkingtimeController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\BanknameController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LeavetypeController;
use App\Http\Controllers\OnlineApplicantController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PositionController;
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

Route::get('/home',[HomeController::class ,'index'])->name('home');
Route::get('/admin/home',[HomeController::class ,'adminHome'])->name('admin.home')->middleware('is_admin');

//Employee Setting Route
Route::get('/addEmployee', [App\Http\Controllers\EmployeeController::class, 'add'])->name('insertEmployee');
Route::post('/addEmployee/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('addEmployee');
Route::get('/viewEmployee', [App\Http\Controllers\EmployeeController::class, 'show'])->name('viewEmployee');
Route::post('/searchEmployee', [App\Http\Controllers\EmployeeController::class, 'search'])->name('searchEmployee');
Route::get('/editEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('editEmployee');
Route::post('/updateEmployee', [App\Http\Controllers\EmployeeController::class, 'update'])->name('updateEmployee');
Route::get('/employee_detail/{id}', [App\Http\Controllers\EmployeeController::class, 'showEmployeeDetail'])->name('employee.detail');
Route::get('/findWorkingSchedule', [App\Http\Controllers\EmployeeController::class, 'findWorkingSchedule'])->name('findWorkingSchedule');
Route::get('/findJobtitle', [App\Http\Controllers\EmployeeController::class, 'findJobtitle'])->name('findJobtitle');
//Personal
Route::get('/viewMe', [App\Http\Controllers\EmployeeController::class, 'showMe'])->name('viewMe');
Route::get('/editMe/{id}', [App\Http\Controllers\EmployeeController::class, 'editMe'])->name('editMe');
Route::post('/updateMe', [App\Http\Controllers\EmployeeController::class, 'updateMe'])->name('updateMe');
Route::get('/me_detail/{id}', [App\Http\Controllers\EmployeeController::class, 'showMeDetail'])->name('me.detail');

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
//Personal
Route::get('/viewMeCPD', [App\Http\Controllers\CPDController::class, 'showMeCPD'])->name('viewMeCPD');
Route::post('/searchMeCPD', [App\Http\Controllers\CPDController::class, 'searchMeCPD'])->name('searchMeCPD');
Route::post('/updateMeCPD/{id}', [App\Http\Controllers\CPDController::class, 'updateMeCPD'])->name('updateMeCPD');
Route::post('/updateMeCPDC/{id}', [App\Http\Controllers\CPDController::class, 'updateMeCPDC'])->name('updateMeCPDC');
Route::get('/cpdMe_detail/{id}', [App\Http\Controllers\CPDController::class, 'showMeCPDDetail'])->name('cpdMe.detail');

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
//Personal
Route::get('/viewMeVA', [App\Http\Controllers\VaccinationController::class, 'showMeVA'])->name('viewMeVA');
Route::post('/searchMeVA', [App\Http\Controllers\VaccinationController::class, 'searchMeVA'])->name('searchMeVA');
Route::post('/updateMeVA/{id}', [App\Http\Controllers\VaccinationController::class, 'updateMeVA'])->name('updateMeVA');
Route::get('/vaMe_detail/{id}', [App\Http\Controllers\VaccinationController::class, 'showMeVADetail'])->name('vaMe.detail');


//Attendance Route
Route::get('/addAttendance/{id}', [App\Http\Controllers\AttendanceController::class, 'addA'])->name('insertA');
Route::post('/addAttendance/store', [App\Http\Controllers\AttendanceController::class, 'storeA'])->name('addA');
Route::get('/viewEmployeeA', [App\Http\Controllers\AttendanceController::class, 'show'])->name('viewEmployeeA');
Route::post('/searchEmployeeA', [App\Http\Controllers\AttendanceController::class, 'search'])->name('searchEmployeeA');
Route::get('/viewAttendance', [App\Http\Controllers\AttendanceController::class, 'showA'])->name('viewA');
Route::post('/searchAttendance', [App\Http\Controllers\AttendanceController::class, 'searchA'])->name('searchA');
Route::get('/editAttendance/{id}', [App\Http\Controllers\AttendanceController::class, 'editA'])->name('editA');
Route::post('/updateAttendance', [App\Http\Controllers\AttendanceController::class, 'updateA'])->name('updateA');
Route::get('/deleteAttendance/{id}', [App\Http\Controllers\AttendanceController::class, 'delete'])->name('deleteA');
//Personal
Route::post('/addMeAttendance/store', [App\Http\Controllers\AttendanceController::class, 'storeMeA'])->name('addMeA');
Route::get('/viewMeAttendance', [App\Http\Controllers\AttendanceController::class, 'showMeA'])->name('viewMeA');
Route::post('/searchMeAttendance', [App\Http\Controllers\AttendanceController::class, 'searchMeA'])->name('searchMeA');
Route::post('/updateMeAttendance/{id}', [App\Http\Controllers\AttendanceController::class, 'updateMeA'])->name('updateMeA');

//Health Facility Route
Route::get('/addHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'add'])->name('insertHealthFacility');
Route::post('/addHealthFacility/store', [App\Http\Controllers\HealthFacilityController::class, 'store'])->name('addHealthFacility');
Route::get('/viewHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'show'])->name('viewHealthFacility');
Route::post('/searchHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'search'])->name('searchHealthFacility');
Route::get('/editHealthFacility/{id}', [App\Http\Controllers\HealthFacilityController::class, 'edit'])->name('editHealthFacility');
Route::post('/updateHealthFacility', [App\Http\Controllers\HealthFacilityController::class, 'update'])->name('updateHealthFacility');
Route::get('/deleteHealthFacility/{id}', [App\Http\Controllers\HealthFacilityController::class, 'delete'])->name('deleteHealthFacility');

// full calendar route -> admin
Route::get('/calendar', [EventController::class, 'index'])->name('showCalendar');
Route::get('/calendar/addevent', [EventController::class, 'display'])->name('showAddEvent');
Route::post('/addevent/store', [EventController::class, 'store'])->name('addEvent');
Route::get('/calendar/showeventdetail', [EventController::class, 'show'])->name('showEventList');
Route::get('/editevent/{id}', [EventController::class, 'edit'])->name('editEvent');
Route::post('/updateevent', [EventController::class, 'update'])->name('updateEvent');
Route::get('/deleteevent/{id}', [EventController::class, 'delete'])->name('deleteEvent'); 
Route::post('/searchbydate', [EventController::class, 'searchDate'])->name('searchByDate');
Route::post('/searchevent', [EventController::class, 'search'])->name('searchEvent');
// full calendar route -> employee
Route::get('/empcalendar', [EventController::class, 'emp_calendar_index'])->name('emp.showCalendar');
Route::get('/empcalendar/showeventdetail', [EventController::class, 'emp_calendar_show'])->name('emp.showEventList');
Route::post('/empsearchbydate', [EventController::class, 'emp_calendar_searchDate'])->name('emp.searchByDate');
Route::post('/empsearchevent', [EventController::class, 'emp_calendar_search'])->name('emp.searchEvent');


// department setting route
Route::get('/department',[DepartmentController::class,'show'])->name('showDept');
Route::get('/department/adddepartment',[DepartmentController::class,'create'])->name('showAddDept');
Route::post('/department/store',[DepartmentController::class,'store'])->name('addDept');
Route::get('/editdepartment/{id}',[DepartmentController::class,'edit'])->name('editDept');
Route::post('/updateDepartment',[DepartmentController::class,'update'])->name('updateDept');
Route::get('/deletedepartment/{id}',[DepartmentController::class,'delete'])->name('deleteDept');
Route::post('/searchdepartment',[DepartmentController::class,'search'])->name('searchDept');

// Position setting route
Route::get('/position',[PositionController::class,'show'])->name('showPosition');
Route::get('/position/addposition',[PositionController::class,'create'])->name('showAddPosition');
Route::post('/position/store',[PositionController::class,'store'])->name('addPosition');
Route::get('/editposition/{id}',[PositionController::class,'edit'])->name('editPosition');
Route::post('/updatePosition',[PositionController::class,'update'])->name('updatePosition');
Route::get('/deleteposition/{id}',[PositionController::class,'delete'])->name('deletePosition');
Route::post('/searchposition',[PositionController::class,'search'])->name('searchPosition');


// job title setting route
Route::get('/jobtitle',[JobtitleController::class,'show'])->name('showJobtitle');
Route::get('/jobtitle/addjobtitle',[JobtitleController::class,'create'])->name('showAddJobtitle');
Route::post('/jobtitle/store',[JobtitleController::class,'store'])->name('addJobtitle');
Route::get('/editjobtitle/{id}',[JobtitleController::class,'edit'])->name('editJobtitle');
Route::post('/updatejobtitle',[JobtitleController::class,'update'])->name('updateJobtitle');
Route::get('/deletejobtitle/{id}',[JobtitleController::class,'delete'])->name('deleteJobtitle');
Route::post('/searchjobtitle',[JobtitleController::class,'search'])->name('searchJobtitle');

// working time setting route
Route::get('/workingtime',[WorkingtimeController::class,'show'])->name('showWRKtime');
Route::get('/workingtime/addworkingtime',[WorkingtimeController::class,'create'])->name('showAddWRKtime');
Route::post('/workingtime/store',[WorkingtimeController::class,'store'])->name('addWRKtime');
Route::get('/editworkingtime/{id}',[WorkingtimeController::class,'edit'])->name('editWRKtime');
Route::post('/updateworkingtime',[WorkingtimeController::class,'update'])->name('updateWRKtime');
Route::get('/deleteworkingtime/{id}',[WorkingtimeController::class,'delete'])->name('deleteWRKtime');
Route::post('/searchworkingtime',[WorkingtimeController::class,'search'])->name('searchWRKtime');

// employment type setting route
Route::get('/employment',[EmploymentController::class,'show'])->name('showEmployment');
Route::get('/employment/addemployment',[EmploymentController::class,'create'])->name('showAddEmployment');
Route::post('/employment/store',[EmploymentController::class,'store'])->name('addEmployment');
Route::get('/editemployment/{id}',[EmploymentController::class,'edit'])->name('editEmployment');
Route::post('/updateemployment',[EmploymentController::class,'update'])->name('updateEmployment');
Route::get('/deleteemployment/{id}',[EmploymentController::class,'delete'])->name('deleteEmployment');
Route::post('/searchemployment',[EmploymentController::class,'search'])->name('searchEmployment');

// country setting route
Route::get('/country',[CountryController::class,'show'])->name('showCountry');
Route::get('/country/addcountry',[CountryController::class,'create'])->name('showAddCountry');
Route::post('/country/store',[CountryController::class,'store'])->name('addCountry');
Route::get('/editcountry/{id}',[CountryController::class,'edit'])->name('editCountry');
Route::post('/updatecountry',[CountryController::class,'update'])->name('updateCountry');
Route::get('/deletecountry/{id}',[CountryController::class,'delete'])->name('deleteCountry');
Route::post('/searchcountry',[CountryController::class,'search'])->name('searchCountry');

// national setting route
Route::get('/national',[NationalityController::class,'show'])->name('showNational');
Route::get('/national/addnational',[NationalityController::class,'create'])->name('showAddCNational');
Route::post('/national/store',[NationalityController::class,'store'])->name('addNational');
Route::get('/editnational/{id}',[NationalityController::class,'edit'])->name('editNational');
Route::post('/updatenational',[NationalityController::class,'update'])->name('updateNational');
Route::get('/deletenational/{id}',[NationalityController::class,'delete'])->name('deleteNational');
Route::post('/searchnational',[NationalityController::class,'search'])->name('searchNational');

// bankname setting route
Route::get('/bankname',[BanknameController::class,'show'])->name('showBankname');
Route::get('/bankname/addbankname',[BanknameController::class,'create'])->name('showAddBankname');
Route::post('/bankname/store',[BanknameController::class,'store'])->name('addBankname');
Route::get('/editbankname/{id}',[BanknameController::class,'edit'])->name('editBankname');
Route::post('/updatebankname',[BanknameController::class,'update'])->name('updateBankname');
Route::get('/deletebankname/{id}',[BanknameController::class,'delete'])->name('deleteBankname');
Route::post('/searchbankname',[BanknameController::class,'search'])->name('searchBankname');

// state setting route
Route::get('/state',[StateController::class,'show'])->name('showState');
Route::get('/state/addstate',[StateController::class,'create'])->name('showAddState');
Route::post('/state/store',[StateController::class,'store'])->name('addState');
Route::get('/editstate/{id}',[StateController::class,'edit'])->name('editState');
Route::post('/updatestate',[StateController::class,'update'])->name('updateState');
Route::get('/deletestate/{id}',[StateController::class,'delete'])->name('deleteState');
Route::post('/searchstate',[StateController::class,'search'])->name('searchState');

// city setting route
Route::get('/city',[CityController::class,'show'])->name('showCity');
Route::get('/city/addcity',[CityController::class,'create'])->name('showAddCity');
Route::post('/city/store',[CityController::class,'store'])->name('addCity');
Route::get('/editcity/{id}',[CityController::class,'edit'])->name('editCity');
Route::post('/updatecity',[CityController::class,'update'])->name('updateCity');
Route::get('/deletecity/{id}',[CityController::class,'delete'])->name('deleteCity');
Route::post('/searchcity',[CityController::class,'search'])->name('searchCity');

// online applicant system
Route::get('/onlinerecruitment',[OnlineApplicantController::class,'show'])->name('showOnlineRecruit');
Route::post('/onlinerecruitment/store',[OnlineApplicantController::class,'store'])->name('addApplicant');
Route::get('/recruitmentadmin',[OnlineApplicantController::class,'adminshow'])->name('admin.recruitment');
Route::get('/adminview/{id}', [OnlineApplicantController::class,'view'])->name('admin.recruitment.view');
Route::get('/adminview/{id}/download',[OnlineApplicantController::class,'download'])->name('resume.download');
Route::get('/employee/{id}',[OnlineApplicantController::class,'moverecord'])->name('move.record');
Route::post('onlinerecruitment/search',[OnlineApplicantController::class,'search'])->name('search.applicant');
// send email
Route::get('/onlinerecruitment/{id}/success',[OnlineApplicantController::class,'sendSuccessful'])->name('send.success');
Route::get('/onlinerecruitment/{id}/fail',[OnlineApplicantController::class,'sendUnfortunately'])->name('send.fail');

//route for leave type
Route::get('createLeaveType', function() {
    return view('admin/leave/createLeaveType');
 })->name('createLeaveType')->middleware('auth');
 Route::post('createLeaveType/store', [App\Http\Controllers\LeaveTypeController::class, 'store'])->name('addLeaveType')->middleware('auth');
 Route::get('leaveType', [App\Http\Controllers\LeaveTypeController::class, 'show'])->name('showLeaveTypes');
 Route::get('leaveType/edit/{id}', [App\Http\Controllers\LeaveTypeController::class, 'edit'])->name('editLeaveType');
Route::post('leaveType/update', [App\Http\Controllers\LeaveTypeController::class, 'update'])->name('updateLeaveType');
Route::get('leaveType/delete/{id}', [App\Http\Controllers\LeaveTypeController::class, 'delete'])->name('deleteLeaveType');

//leave grade
Route::get('createLeaveGrade', function() {
    return view('admin/leave/createLeaveGrade');
 })->name('createLeaveGrade');
 
 Route::post('createLeaveGrade/store', [App\Http\Controllers\LeaveGradeController::class, 'store'])->name('addLeaveGrade');

 Route::get('leaveGrade', [App\Http\Controllers\LeaveGradeController::class, 'show'])->name('showLeaveGrades');

 Route::get('leaveGrade/editLeaveGradeName/{id}', [App\Http\Controllers\LeaveGradeController::class, 'edit'])->name('editLeaveGradeName');

 Route::post('leaveGrade/updateLeaveGradeName', [App\Http\Controllers\LeaveGradeController::class, 'update'])->name('updateLeaveGradeName');

 Route::get('leaveGrade/delete/{id}', [App\Http\Controllers\LeaveGradeController::class, 'delete'])->name('deleteLeaveGrade');

 Route::get('leaveGrade/leaveEntitlement/{id}', [App\Http\Controllers\LeaveEntitlementController::class, 'show'])->name('leaveEntitlement');

Route::post('leaveGrade/leaveEntitlement/{id}/add', [App\Http\Controllers\LeaveEntitlementController::class, 'addLeaveEntitlement'])->name('addLeaveEntitlement');

Route::get('leaveGrade/editLeaveEntitlement/{leaveGradeId}/{id}', [App\Http\Controllers\LeaveEntitlementController::class, 'edit'])->name('editLeaveEntitlement');

Route::post('leaveGrade/leaveEntitlement/edit/{leaveGradeId}/{id}', [App\Http\Controllers\LeaveEntitlementController::class, 'updateLeaveEntitlement'])->name('updateLeaveEntitlement');

Route::get('leaveGrade/deleteLeaveEntitlement/{leaveGradeId}/{id}', [App\Http\Controllers\LeaveEntitlementController::class, 'deleteLeaveEntitlement'])->name('deleteLeaveEntitlement');

Route::get('employeesLeave/all', [App\Http\Controllers\LeaveGradeController::class, 'showAllEmployeesLeaveGrade'])->name('allEmployeesLeaveGrade');

Route::get('employeesLeave/{id}',[App\Http\Controllers\EmployeeLeaveController::class, 'showAnEmployeesLeave'])->name('employeesLeaveGrade');

//leave application
Route::get('admin/leaveApplicationList', [App\Http\Controllers\LeaveApplicationController::class, 'showLeaveApplicationListAdmin'])->name('showLeaveApplicationListAdmin');

Route::get('admin/approveLeave/{employeeId}/{id}', [App\Http\Controllers\LeaveApplicationController::class, 'approve'])->name('approveLeave');

Route::get('admin/approveMultipleLeave', [App\Http\Controllers\LeaveApplicationController::class, 'approveMultiple'])->name('approveMultipleLeave');

Route::get('admin/reject/{employeeId}/{id}', [App\Http\Controllers\LeaveApplicationController::class, 'reject'])->name('rejectLeave');

Route::get('admin/rejectMultipleLeave', [App\Http\Controllers\LeaveApplicationController::class, 'rejectMultiple'])->name('rejectMultipleLeave');

//leave appliation (employee)
Route::get('applyLeave', [App\Http\Controllers\LeaveApplicationController::class, 'showApplyLeavePage'])->name('showApplyLeavePage');
Route::post('applyLeave/submit', [App\Http\Controllers\LeaveApplicationController::class, 'submitApplication'])->name('submitApplication');
Route::get('leaveApplicationList', [App\Http\Controllers\LeaveApplicationController::class, 'showLeaveApplicationList'])->name('showLeaveApplicationList');
Route::get('leaveApplication/cancel/{employeeId}/{id}', [App\Http\Controllers\LeaveApplicationController::class, 'cancel'])->name('cancelLeave');
Route::get('cancelMultipleLeave', [App\Http\Controllers\LeaveApplicationController::class, 'cancelMultiple'])->name('cancelMultiple');
Route::get('employeesLeave',[App\Http\Controllers\EmployeeLeaveController::class, 'showEmployeeOwnLeave'])->name('employeeOwnLeaveGrade');

//leave record
Route::get('employeesLeave/createLeaveRecord',[App\Http\Controllers\EmployeeLeaveController::class, 'createLeaveRecord'])->name('createLeaveRecord');

//payroll
Route::get('categoryOfSalaryComponent',[App\Http\Controllers\CategoryOfSalaryComponentController::class, 'show'])->name('showCategoryOfSalaryComponent');

Route::get('createSalaryComponent',[App\Http\Controllers\SalaryComponentController::class, 'showCreateSalaryComponent'])->name('showCreateSalaryComponent');

Route::post('createSalaryComponent/store', [App\Http\Controllers\SalaryComponentController::class, 'createSalaryComponent'])->name('addSalaryComponent');

Route::get('salaryComponent',[App\Http\Controllers\SalaryComponentController::class, 'showSalaryComponent'])->name('showSalaryComponent');

Route::get('editSalaryComponent/{id}',[App\Http\Controllers\SalaryComponentController::class, 'edit'])->name('editSalaryComponent');

Route::post('editSalaryComponent/update', [App\Http\Controllers\SalaryComponentController::class, 'update'])->name('updateSalaryComponent');

Route::get('salaryComponent/delete/{id}', [App\Http\Controllers\SalaryComponentController::class, 'delete'])->name('deleteSalaryComponent');

Route::get('salaryComponentForAllJobTitle',[App\Http\Controllers\TitleComponentController::class, 'showSalaryComponentForAllJobTitle'])->name('showSalaryComponentForAllJobTitle');

Route::get('salaryComponentForAJobTitle/{id}',[App\Http\Controllers\TitleComponentController::class, 'showSalaryComponentForAJobTitle'])->name('showSalaryComponentForAJobTitle');

Route::post('addSalaryComponentForJobTitle', [App\Http\Controllers\TitleComponentController::class, 'addTitleComponent'])->name('addSalaryComponentForJobTitle');

Route::get('editSalaryComponentForJobTitle/{id}',[App\Http\Controllers\TitleComponentController::class, 'showEdit'])->name('showEditSalaryComponentForJobTitle');

Route::post('editSalaryComponentForJobTitle/update', [App\Http\Controllers\TitleComponentController::class, 'editTitleComponent'])->name('editSalaryComponentForJobTitle');

Route::get('deleteSalaryComponentForJobTitle/{id}', [App\Http\Controllers\TitleComponentController::class, 'deleteTitleComponent'])->name('deleteSalaryComponentForJobTitle');

Route::get('payroll',[App\Http\Controllers\PayrollController::class, 'showPayrollPage'])->name('showPayrollPage');

Route::get('payroll/{id}',[App\Http\Controllers\PayrollController::class, 'showPayrollItemPage'])->name('showPayrollItemPage');

Route::get('payroll/addPayrollItem',[App\Http\Controllers\PayrollController::class, 'addPayrollItem'])->name('addPayrollItem');