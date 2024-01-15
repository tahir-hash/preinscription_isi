<?php

use App\Livewire\EditDepartment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\PreInscriptionController;

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


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});



Route::middleware('auth')->group(function () {
    //logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //departments
    Route::resource('departments', DepartmentController::class);

    //filieres 
    Route::resource('filieres', FiliereController::class);

    //preinscription 
    Route::resource('preinscriptions', PreInscriptionController::class);

});
