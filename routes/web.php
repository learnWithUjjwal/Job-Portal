<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\JobController::class, 'index'])->name('jobs.list');
Route::get('/jobs/{id}/{job}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::get('/companies/{id}/{company}', [App\Http\Controllers\CompanyController::class, 'show'])->name('companies.show');

Route::get('/user/profile', [App\Http\Controllers\UserProfileController::class, 'index'])->name('user.profile');
Route::post('/user/profile/update', [App\Http\Controllers\UserProfileController::class, 'store'])->name('user.profile.create');
Route::post('/user/profile/cover-letter', [App\Http\Controllers\UserProfileController::class, 'updateCoverLetter'])->name('user.profile.coverLetter');
Route::post('/user/profile/resume', [App\Http\Controllers\UserProfileController::class, 'updateResume'])->name('user.profile.resume');
Route::post('/user/profile/avatar', [App\Http\Controllers\UserProfileController::class, 'updateAvatar'])->name('user.profile.avatar');