<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;

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

Route::group(['prefix' => 'user'], function(){

    Route::group(['middleware' => 'guest'], function(){

        //gets the sign up form for students
        Route::get('student/signup', [RegisterController::class, 'getStudentSignup'])->name('student.signup');

        //post request for student registration form
        Route::post('signup',[RegisterController::class, 'postStudent'])->name('student.signups');

        //gets the signin form
        Route::get('signin', [LoginController::class, 'getSignIn'])->name('user.signin');

        //post request for sign in
        Route::post('login', [LoginController::class, 'postSignin'])->name('login');

    });

    Route::group(['middleware' => 'role:student'], function(){
        Route::get('annoucements', [EventsController::class, 'index'])->name('events.index');
    });

    Route::group(['middleware' => 'role:officer'], function(){

        Route::get('officer/profile', [RegisterController::class, 'officerProfile'])->name('officer.profile');
    });

    Route::group(['middleware' => 'role:admin'], function(){

        Route::get('student', [StudentController::class, 'index'])->name('student.index');
        Route::get('users', [UserController::class, 'index'])->name('user.index');
        Route::get('dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard.index');

        // routes for edit roles
        Route::get('role/{id}/edit', [UserController::class, 'editRole'])->name('roles.edit');
        Route::put('role/{id}/update', [UserController::class, 'updateRole'])->name('roles.update');
    });

    Route::group(['middleware' => 'role:unregistered'], function(){
        //gets the form for membership
        Route::get('form', [TransactionsController::class, 'getForms'])->name('member.forms');
        Route::post('forms', [TransactionsController::class, 'register'])->name('member.register');
    });

    Route::group(['middleware' => 'role:student,unregistered'], function(){

        Route::get('student/profile', [RegisterController::class, 'studentProfile'])->name('student.profile');
    });

});


Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
