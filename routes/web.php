<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EnrollmentController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/user', [AdminController::class, 'userindex'])->name('user.index');
    Route::get('/enroll-form', [EnrollmentController::class, 'showregister'])->name('admin.pages.registerform');
    Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enrollment.store');
    Route::get('/enroll/list', [EnrollmentController::class, 'showList'])->name('admin.pages.index');
    Route::get('/enroll/view/{id}', [EnrollmentController::class, 'viewDatabyId'])->name('admin.pages.view');
    Route::delete('/enroll/delete/{id}', [EnrollmentController::class, 'delete'])->name('delete');
    Route::get('/enrollment/{id}/edit', [EnrollmentController::class, 'edit'])->name('enrollment.edit');
    Route::put('/enrollment/{id}', [EnrollmentController::class, 'update'])->name('enrollment.update');
    Route::get('/enroll-form/export-pdf', [EnrollmentController::class, 'exportPDF'])->name('enroll-form.pdf');
    Route::get('/enroll-form/export-csv', [EnrollmentController::class, 'exportCSV'])->name('enroll-form.csv');
    Route::get('/users/list', [UserController::class, 'showUsersList'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'showUsersForm'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
