<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogBookController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ServiceController;

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

// Route::resource('TransactionController');
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

        //routes for services
        Route::get('services/form', [ServiceController::class, 'create'])->name('service.create');
        Route::post('services/store', [ServiceController::class, 'store'])->name('service.store');

    });

    Route::group(['middleware' => 'role:student'], function(){
        Route::get('annoucements', [EventsController::class, 'index'])->name('events.index'); // routes for accessing events
        Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('students.edit'); // routes for student editing
        Route::put('student/{id}/update', [StudentController::class, 'update'])->name('students.update'); //routes for updating
    });

    Route::group(['middleware' => 'role:officer'], function(){
        
        Route::get('officer/profile', [RegisterController::class, 'officerProfile'])->name('officer.profile');
        Route::get('membership', [TransactionsController::class, 'index'])->name('members.index');
        Route::get('memberships', [TransactionsController::class, 'getMembers'])->name('members.datatable');
        Route::get('membership/{id}/edit', [TransactionsController::class, 'editMember'])->name('members.edit');
        Route::put('membership/{id}/update', [TransactionsController::class, 'updateMember'])->name('members.update');

        //routes for time in and time out
        Route::get('officer/timein', [LogBookController::class, 'timeIn'])->name('officer.timeIn');
        Route::post('officer/store', [LogBookController::class, 'store'])->name('officer.store');

        //routes for time in and time out
        Route::get('officer/{id}/timeout', [LogBookController::class, 'edit'])->name('officer.timeOut');
        Route::put('officer/{id}/timeout/update', [LogBookController::class, 'update'])->name('officer.timeouts');

        //routes for editing and updating officer's data
        Route::get('officer/{id}/edit', [OfficerController::class, 'edit'])->name('officers.edit');
        Route::put('officer/{id}/update', [OfficerController::class, 'update'])->name('officers.update');

        //service index
        Route::get('service', [ServiceController::class, 'index'])->name('service.index');

        //edit service
        Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
        Route::put('service/{id}/update', [ServiceController::class, 'update'])->name('service.update');
        Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.delete');
        Route::get('services', [ServiceController::class, 'getService'])->name('service.datatable');
    });

    Route::group(['middleware' => 'role:admin'], function(){

        Route::get('student', [StudentController::class, 'index'])->name('student.index');
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard.index');

        //datatable routes
        Route::get('/students', [StudentController::class, 'getStudents'])->name('students.datatable');
        Route::get('/users/datatable', [UserController::class, 'getUsers'])->name('users.datatable');

        // routes for edit roles
        Route::get('role/{id}/edit', [UserController::class, 'editRole'])->name('roles.edit');
        Route::put('role/{id}/update', [UserController::class, 'updateRole'])->name('roles.update');

        //Routes for Excel Import
        Route::post('student/import', [StudentController::class, 'import'])->name('student.imports');

        //Route for delete
        Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.delete');

        Route ::delete('users/{id}', [UserController::class, 'delete'])->name('users.delete');
    });

    Route::group(['middleware' => 'role:unregistered'], function(){
        //gets the form for membership
        Route::get('form', [TransactionsController::class, 'getForms'])->name('member.forms');
        Route::post('forms', [TransactionsController::class, 'register'])->name('member.register');
    });

    Route::group(['middleware' => 'role:student,unregistered'], function(){

        Route::get('student/profile', [RegisterController::class, 'studentProfile'])->name('student.profile');
    });

    Route::group(['middleware' => 'role:student,officer'], function(){

        Route::get('password/form', [UserController::class, 'changePassword'])->name('getPassword');
        Route::post('password/update', [UserController::class, 'updatePassword'])->name('updatePassword');
    });

});


Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
