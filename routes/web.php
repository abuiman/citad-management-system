<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\DashboardController;

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

Auth::routes(['verify' => true]);

// Route::get('/', function() {
//     #User must verify email
// })->middleware('verified');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('events', EventController::class);
    Route::resource('viewevents', CoordinatorController::class);
    Route::get('home', [HomeController::class, 'index'])->name('home');

});

//CHANGE PASSWORD
Route::get('update-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('update-password');
Route::post('update-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

//
Route::view('charts', 'graphs/chart');