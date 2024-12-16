<?php

use App\Http\Controllers\AsignarRolController;
use App\Http\Controllers\BrazaletController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('clients', ClientController::class)->names('clients');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('permisos', PermisoController::class)->names('permisos');
Route::get('asignar-rol', [AsignarRolController::class, 'index'])->name('asignar-rol');

Route::put('/asignar/{user}', [AsignarRolController::class, 'update'])->name('asignar');

Route::resource('user', AsignarRolController::class);


Route::resource('users', UserController::class);

Route::get('/update-rol/{rol}', [RoleController::class, 'updaterol'])->name('update-rol');
Route::put('/update-rol/{rol}', [RoleController::class, 'updaterol'])->name('update-rol');

Route::put('roles/updaterol/{role}', [RoleController::class, 'updaterol'])->name('roles.updaterol');

Route::resource('supliers', SuplierController::class);
Route::delete('supliers/estado/{suplier}', [SuplierController::class, 'estado'])->name('suplier/estado');

Route::resource('staff', StaffController::class);
Route::delete('staff/estado/{staff}', [StaffController::class, 'estado'])->name('staff/estado');

Route::resource('categories', CategoryController::class);
Route::delete('category/estado/{category}', [CategoryController::class, 'estado'])->name('category/estado');

Route::resource('products', ProductController::class);
Route::delete('product/estado/{product}', [ProductController::class, 'estado'])->name('product/estado');

Route::resource('brazalets', BrazaletController::class);
Route::delete('brazalet/estado/{brazalet}', [ProductController::class, 'estado'])->name('brazalet/estado');