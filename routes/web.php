<?php

use App\Http\Controllers\AsignarRolController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
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
