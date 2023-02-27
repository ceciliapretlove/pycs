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

//About
Route::get('/about', [WebsiteController::class, 'about']);
Route::get('/discipline-standards-and-policies', [WebsiteController::class, 'disciplineStandardsandPolicies']);
Route::get('/health-standards-and-policies', [WebsiteController::class, 'healthStandardsandPolicies']);
Route::get('/offenses-and-sanctions', [WebsiteController::class, 'offensesandSanctions']);
Route::get('/general-policies', [WebsiteController::class, 'generalPolicies']);


// Admission
Route::get('/enrollment', [WebsiteController::class, 'enrollment']);
Route::get('/admission', [WebsiteController::class, 'admission']);
Route::get('/class-periods-and-learning-cycle', [WebsiteController::class, 'classPeriodsAndLearningCycle']);
Route::get('/enrollment-of-learners', [WebsiteController::class, 'enrollmentOfLearners']);
Route::get('/admission-requirements', [WebsiteController::class, 'admissionRequirements']);
Route::get('/admission-procedure', [WebsiteController::class, 'admissionProcedure']);
Route::get('/policies-for-early-registration', [WebsiteController::class, 'policiesForEarlyRegistration']);
Route::get('/policy-on-withholding-of-credentials', [WebsiteController::class, 'policyOnWithholdingOfCredentials']);

Route::get('/school-calendar', [WebsiteController::class, 'schoolcalendar']);
Route::get('/galleries', [WebsiteController::class, 'galleries']);

//Academics
Route::get('/curriculum', [WebsiteController::class, 'curriculum']);
Route::get('/pre-elementary', [WebsiteController::class, 'preelementary']);
Route::get('/grade-school', [WebsiteController::class, 'gradeschool']);
Route::get('/junior-hs', [WebsiteController::class, 'juniorhs']);
Route::get('/senior-hs', [WebsiteController::class, 'seniorhs']);
Route::get('/special-program', [WebsiteController::class, 'specialprogram']);
Route::get('/academic-standard', [WebsiteController::class, 'academicstandard']);
Route::get('/school-year-end-activities', [WebsiteController::class, 'schoolyearendactivities']);
Route::get('/school-programs', [WebsiteController::class, 'schoolprograms']);
Route::get('/clubs-organization', [WebsiteController::class, 'clubsorganization']);
Route::get('/grading-system', [WebsiteController::class, 'gradingsystem']);
Route::get('/promotion-and-retention', [WebsiteController::class, 'promotionandretention']);
Route::get('/others', [WebsiteController::class, 'others']);

Route::group( ['middleware' => 'auth' ], function()
{
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
});