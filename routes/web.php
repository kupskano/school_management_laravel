<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\UserController;
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

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function() {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::group(['prefix' =>'admin', 'middleware'=> ['isAdmin']])

Route::group(['prefix'=>'admin' , 'middleware'=> ['isAdmin', 'auth', 'PreventBackHistory']], function() {

    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    // users
    Route::get('active-user', [AdminUserController::class, 'index'])->name('admin.active-user');
    Route::post('active-user', [AdminUserController::class, 'store'])->name('admin.adduser');
    // Route::put('edit_user/{id}', [AdminUserController::class, 'update']);

});

Route::group(['prefix'=>'user' , 'middleware'=> ['isUser', 'auth', 'PreventBackHistory']], function() {

    Route::get('user', [UserController::class, 'index'])->name('user.index');
});