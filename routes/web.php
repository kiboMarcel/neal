<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;


use App\Http\Controllers\Backend\ProfilController;

use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeePaidController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeDesignationController;
use App\Http\Controllers\Backend\Employee\PaySalaryController;

use App\Http\Controllers\Backend\Equipement\EquipementController;

use App\Http\Controllers\Backend\Produit\CategoryProduitController;
use App\Http\Controllers\Backend\Produit\ProduitController;

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

        Route::get('/promotion/view/{id}', [EmployeeRegController::class, 'EmployeePromotion']) -> 
        name('employee.promotion');

        Route::post('/promotion/store/{id}', [EmployeeRegController::class, 'EmployeePromotionStore']) -> 
        name('employee.promotion.store');


        //employee Designation
        Route::get('/designation/view', [EmployeeDesignationController::class, 'ViewDesignation']) -> 
        name('employee.designation.view');

        Route::get('designation/add/', [EmployeeDesignationController::class, 'DesignationAdd']) -> 
        name('employee.designation.add');

        Route::post('designation/store/', [EmployeeDesignationController::class, 'DesignationStore']) -> 
        name('employee.designation.store');

        Route::get('designation/edit/{id}', [EmployeeDesignationController::class, 'DesignationEdit']) -> 
        name('employee.designation.edit');

        Route::post('designation/update/{id}', [EmployeeDesignationController::class, 'DesignationUpdate']) -> 
        name('employee.designation.update');

        Route::get('designation/delete/{id}', [EmployeeDesignationController::class, 'DesignationDelete']) -> 
        name('employee.designation.delete');


        //pay employee salary
        Route::get('/pay/salary/view', [PaySalaryController::class, 'ViewPaySalary']) -> 
        name('pay.salary.view');

        Route::get('/pay/salary/get/employee/', [PaySalaryController::class, 'SalaryPayEmployeeGet']) -> 
        name('pay.salary.getemployee');

        Route::get('/pay/salary/store/{id}/{date}', [PaySalaryController::class, 'PaySalaryStore']) -> 
        name('pay.salary.store');





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

    Route::prefix('equipement')->group( function(){
        
        //equipement recuperable registration
        Route::get('/equip/reg/view', [EquipementController::class, 'ViewEquipement']) -> 
        name('equip.registration.view');

        Route::get('equipement/add/', [EquipementController::class, 'EquipementAdd']) -> 
        name('equipement.add');

        Route::post('equipement/store/', [EquipementController::class, 'EquipementStore']) -> 
        name('equipement.store');

        Route::get('equipement/edit/{id}', [EquipementController::class, 'EquipementEdit']) -> 
        name('equipement.edit');

        Route::post('equipement/edit/{id}', [EquipementController::class, 'EquipementUpdate']) -> 
        name('equipement.update');

        Route::get('equipement/detail/{id}', [EquipementController::class, 'EquipementDetail']) -> 
        name('equipement.detail.pdf');



        //equipement  non recuperable registration
        Route::get('/reg/view', [EquipementController::class, 'ViewEqui_non']) -> 
        name('equipement.registration.view');

        Route::get('equipement/add/', [EquipementController::class, 'EquipementAdd']) -> 
        name('equipement.add');

        Route::post('equipement/store/', [EquipementController::class, 'EquipementStore']) -> 
        name('equipement.store');

        Route::get('equipement/edit/{id}', [EquipementController::class, 'EquipementEdit']) -> 
        name('equipement.edit');

        Route::post('equipement/edit/{id}', [EquipementController::class, 'EquipementUpdate']) -> 
        name('equipement.update');

        Route::get('equipement/detail/{id}', [EquipementController::class, 'EquipementDetail']) -> 
        name('equipement.detail.pdf');

        
    });


    Route::prefix('product')->group( function(){
        
        //Category produit
        Route::get('/category/product/view', [CategoryProduitController::class, 'ViewCategory']) -> 
        name('category.product.view');

        Route::get('/category/product/add', [CategoryProduitController::class, 'CategoryAdd']) -> 
        name('category.product.add');

        Route::post('category/product/store/', [CategoryProduitController::class, 'CategoryStore']) -> 
        name('category.product.store');

        Route::get('/category/product/edit/{id}', [CategoryProduitController::class, 'CategoryEdit']) -> 
        name('category.product.edit');

        Route::post('/category/product/update/{id}', [CategoryProduitController::class, 'CategoryUpdate']) -> 
        name('category.product.update');

        Route::get('/category/product/delete/{id}', [CategoryProduitController::class, 'CategoryDelete']) -> 
        name('category.product.delete');



        //Category produit
        Route::get('/product/view', [ProduitController::class, 'ViewProduit']) -> 
        name('product.view');

        Route::get('/product/add', [ProduitController::class, 'ProduitAdd']) -> 
        name('product.add');

        Route::post('/product/store/', [ProduitController::class, 'ProduitStore']) -> 
        name('product.store');

        Route::get('/product/edit/{id}', [ProduitController::class, 'ProduitEdit']) -> 
        name('product.edit');

        Route::post('/product/update/{id}', [ProduitController::class, 'ProduitUpdate']) -> 
        name('product.update');

        Route::get('/product/delete/{id}', [ProduitController::class, 'ProduitDelete']) -> 
        name('product.delete');

        
    });


});