<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
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
    // $role = Role::all()->pluck(['name'  => 'Super Admin']);
    // $permission = Permission::all()->pluck(['name' => 'browse admin']);
    
    //  return $role->permissions;
    return view('auth.login');

});

Route::group(['middleware' => ['auth', 'web']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::get('/user', function () { return view('dashboard.users.users'); })->name('user');
});

Route::group(['middleware' => ['auth', 'web']], function() {

    Route::get('/dashboard', function () {  return view('dashboard'); })->name('dashboard');
    // Route::resource('users', UserController::class);
    // Route::get('/users', function () { return view('dashboard.users.users'); })->name('users');
    // Route::get('/users', function () { return view('users.index'); })->name('users');
    // Route::resource('/test', UserController::class);
    
});

require __DIR__.'/api.php';
require __DIR__.'/auth.php';
