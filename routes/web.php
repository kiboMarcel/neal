<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;


use App\Http\Controllers\Backend\ProfilController;

use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeePaidController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::get('/admin/logout', [AdminController::class, 'Logout']) -> name('admin.logout');

Route::group(['middleware' => 'auth'], function(){


    //User management

    Route::prefix('users')->group( function() {
        
        Route::get('/view', [UserController::class, 'UserView']) -> name('user.view');

        Route::get('/add', [UserController::class, 'UserAdd']) -> name('user.add');

        Route::post('/store', [UserController::class, 'UserStore']) -> name('user.store');

        Route::get('/edit/{id}', [UserController::class, 'UserEdit']) -> name('user.edit');

        Route::post('/update/{id}', [UserController::class, 'UserUpdate']) -> name('user.update');

        Route::get('/delete/{id}', [UserController::class, 'UserDelete']) -> name('user.delete');

    } );


    // User Account Setting

    Route::prefix('profile')->group( function() {
        
        Route::get('/view', [ProfilController::class, 'ProfileView']) -> name('profil.view');

        Route::post('/update', [ProfilController::class, 'ProfileUpdate']) -> name('profil.update');

        Route::get('/password/view', [ProfilController::class, 'ProfilePasswordView']) -> name('profil.password');

        Route::post('/password/update', [ProfilController::class, 'PasswordUpdate']) -> name('password.update');
        
    } );


    Route::prefix('employees')->group( function(){
        
        //employee registration
        Route::get('/reg/view', [EmployeeRegController::class, 'ViewEmployee']) -> 
        name('employee.registration.view');

        Route::get('employee/add/', [EmployeeRegController::class, 'EmployeeAdd']) -> 
        name('employee.add');

        Route::post('employee/store/', [EmployeeRegController::class, 'EmployeeStore']) -> 
        name('employee.store');

        Route::get('employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit']) -> 
        name('employee.edit');

        Route::post('employee/edit/{id}', [EmployeeRegController::class, 'EmployeeUpdate']) -> 
        name('employee.update');

        Route::get('employee/detail/{id}', [EmployeeRegController::class, 'EmployeeDetail']) -> 
        name('employee.detail.pdf');

        //employee salary
        Route::get('/account/salary/view', [EmployeePaidController::class, 'ViewSalary']) -> 
        name('account.salary.view');

        Route::get('/account/salary/add', [EmployeePaidController::class, 'SalaryAdd']) -> 
        name('account.salary.add');

        Route::post('/account/salary/store', [EmployeePaidController::class, 'SalaryStore']) -> 
        name('account.salary.store');

        Route::get('/account/salary/get/employee', [EmployeePaidController::class, 'SalaryEmployeeGet']) -> 
        name('account.salary.getemployee');


        //employee leave view
        Route::get('/employee/leave', [EmployeeLeaveController::class, 'ViewLeave']) -> 
        name('employee.leave.view');

        Route::get('/add/leave', [EmployeeLeaveController::class, 'LeaveAdd']) -> 
        name('leave.add');

        Route::post('/store', [EmployeeLeaveController::class, 'LeaveStore']) -> 
        name('employee.leave.store');
        
        Route::get('/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit']) -> 
        name('employee.leave.edit');

        Route::post('/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate']) -> 
        name('employee.leave.update');

        Route::get('/leave/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete']) -> 
        name('employee.leave.delete');

        


       

        
    });


});