<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttandController;
use App\Http\Controllers\DesigController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Models\Attandance;
use Illuminate\Support\Facades\Auth;
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


// Route::get('clock', [HomeController::class, 'clock'])->name('clock');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'home'])->name('welcome');

// USERS
Route::get('user/index', [UserController::class, 'index'])->name('user.index');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id?}' , [UserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id?}', [UserController::class, 'update'])->name('user.update');
Route::post('user/delete', [UserController::class, 'destroy'])->name('user.delete');
Route::get('user/detail/{id?}', [UserController::class, 'show'])->name('user.show');

// Roles
Route::get('roles/index', [RolesController::class, 'index'])->name('roles.index');
Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('roles/store', [RolesController::class, 'store'])->name('roles.store');
Route::get('roles/edit/{id?}', [RolesController::class, 'edit'])->name('roles.edit');
Route::post('roles/update/{id?}', [RolesController::class, 'update'])->name('roles.update');
Route::post('roles/delete', [RolesController::class, 'destroy'])->name('role.delete');

// Department
Route::get('dept/index', [DeptController::class, 'index'])->name('dept.index');
Route::get('dept/create', [DeptController::class, 'create'])->name('dept.create');
Route::post('dept/store' , [DeptController::class, 'store'])->name('dept.store');
Route::get('dept/edit/{id?}' , [DeptController::class, 'edit'])->name('dept.edit');
Route::post('dept/update/{id?}' , [DeptController::class, 'update'])->name('dept.update');
Route::post('dept/delete', [DeptController::class, 'destroy'])->name('dept.delete');

//Designation
Route::get('desg/index', [DesigController::class, 'index'])->name('desg.index');
Route::get('desg/create', [DesigController::class, 'create'])->name('desg.create');
Route::post('desg/store', [DesigController::class, 'store'])->name('desg.store');
Route::get('desg/edit/{id?}', [DesigController::class, 'edit'])->name('desg.edit');
Route::post('desg/update/{id?}', [DesigController::class, 'update'])->name('desg.update');
Route::post('desg/delete', [DesigController::class, 'destroy'])->name('desg.delete');

//Vehicle
Route::get('vehicle/index', [VehicleController::class, 'index'])->name('vehicle.index');
Route::get('vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
Route::post('vehicle/store', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('vechile/edit/{id?}', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::post('vehicle/update/{id?}',[VehicleController::class, 'update'])->name('vehicle.update');
Route::post('vehicle/delete', [VehicleController::class, 'destroy'])->name('vehicle.delete');

//Vehicle Type
Route::resource('vehicletype', VehicleTypeController::class);
Route::post('vehicletype/update', [VehicleTypeController::class , 'update'])->name('vehtype.update');
Route::post('vehicletype/delete' , [VehicleTypeController::class, 'destroy'])->name('vehtype.delete');
//CHECK IN
Route::post('check/store' , [AttandController::class, 'store'])->name('store.check');
Route::get('detail', [AttandController::class, 'index'])->name('detail');

//Ajax

Route::get('get/user/{id}' , [AttandanceController::class, 'get_user'])->name('get.user');
