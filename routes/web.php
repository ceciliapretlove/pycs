<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItechAdminController;
use App\Http\Controllers\SystemAdminController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();

//website views

Route::get('/', [WebsiteController::class, 'home']);
Route::get('/about', [WebsiteController::class, 'about']);
Route::get('/enrollment', [WebsiteController::class, 'enrollment']);
Route::get('/admission', [WebsiteController::class, 'admission']);
Route::get('/school-calendar', [WebsiteController::class, 'schoolcalendar']);
Route::get('/galleries', [WebsiteController::class, 'galleries']);
Route::get('/curriculum', [WebsiteController::class, 'curriculum']);



Route::group( ['middleware' => 'auth' ], function()
{
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
});