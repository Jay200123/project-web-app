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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TallyController;



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

        //Route for Admin
        Route::get('admin/create', [RegisterController::class, 'createAdmin'])->name('admin.create');

        Route::post('admin/store', [RegisterController::class, 'storeAdmin'])->name('admin.store');

    });


    Route::group(['middleware' => 'role:student'], function(){
        Route::get('annoucements', [EventsController::class, 'getPage'])->name('events.page'); // routes for accessing events
        Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('students.edit'); // routes for student editing
        Route::put('student/{id}/update', [StudentController::class, 'update'])->name('students.update'); //routes for updating
        Route::get('students/service-form', [ServiceController::class, 'studentCreate'])->name('students.service'); // routes for service form exclusive for students

        //shop routes
        Route::get('/shop', [CartController::class, 'shop'])->name('shop.index'); //routes for shop index

        Route::get('/shopping-cart', [CartController::class, 'getCart'])->name('shop.shoppingCart'); //routes for getting the cart
        Route::get('add-to-cart/{id}', [CartController::class,  'getAddToCart'])->name('shops.addToCart'); //routes for adding product to cart
        Route::get('remove{id}', [CartController::class, 'getRemoveItem'])->name('shop.remove'); //routes for removing all product to cart
        Route::get('reduce/{id}', [CartController::class, 'getReduceByOne'])->name('shop.reduceByOne'); //routes for removing one product to cart
        Route::get('checkout', [CartController::class, 'postCheckout'])->name('checkout'); //routes for checkout

        Route::get('/show-product/{id}', [ProductController::class, 'show'])->name('product.show'); //routes for product search
        Route::get('/show-event/{id}', [EventsController::class, 'show'])->name('event.show');
    });

    Route::group(['middleware' => 'role:officer,president'], function(){

        Route::get('officer/profile', [RegisterController::class, 'officerProfile'])->name('officer.profile'); //routes for officer profile

         //routes for editing and updating officer's data
         Route::get('officer/{id}/edit', [OfficerController::class, 'edit'])->name('officers.edit'); //routes for officer profile edit
         Route::put('officer/{id}/update', [OfficerController::class, 'update'])->name('officers.update'); //routes for update 
         
         //routes for time in and time out
        Route::get('officer/timein', [LogBookController::class, 'timeIn'])->name('officer.timeIn'); //routes for getting the form for Time In
        Route::post('officer/store', [LogBookController::class, 'store'])->name('officer.store'); //routes for storing time in and time out
        Route::get('officer/{id}/timeout', [LogBookController::class, 'edit'])->name('officer.timeOut'); //routes for getting the form for Time Out
        Route::put('officer/{id}/timeout/update', [LogBookController::class, 'update'])->name('officer.timeouts'); //routes for updating time out

        Route::get('/show-user/{id}', [StudentController::class, 'show'])->name('student.show');
        Route::get('/show-service/{id}', [ServiceController::class, 'show'])->name('service.show');

    });

    Route::group(['middleware' => 'role:president'], function(){

        Route::get('/membership', [TransactionsController::class, 'index'])->name('members.index'); //routes for membership index
        Route::get('membership/{id}/edit', [TransactionsController::class, 'editMember'])->name('members.edit'); //routes for edit membership
        Route::put('membership/{id}/update', [TransactionsController::class, 'updateMember'])->name('members.update'); //routes for update

        Route::get('services', [ServiceController::class, 'getService'])->name('service.datatable'); //routes for service datatable
        Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit'); //routes for service edit
        Route::put('service/{id}/update', [ServiceController::class, 'update'])->name('service.update'); //routes for service update
        Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.delete'); //Routes for Service Delete

        //Routes for Orders
        Route::get('order', [OrderController::class, 'index'])->name('order.index');
        Route::get('order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
        Route::put('order/{id}/update', [OrderController::class, 'update'])->name('order.update');
        Route::delete('order/{id}', [OrderController::class, 'destroy'])->name('order.delete');
        
    });

    Route::group(['middleware' => 'role:officer'], function(){
        
        //service index
        Route::get('service', [ServiceController::class, 'index'])->name('service.index'); //routes for service index

        //Product Routes
        Route::get('/product', [ProductController::class, 'index'])->name('product.index'); //routes for product index
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create'); //routes for getting the create form for product
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store'); //routes for storing product data
        Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit'); //routes for editing product data
        Route::put('product/{id}/update', [ProductController::class, 'update'])->name('product.update'); //routes for updating product data
        Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.delete'); //routes for product delete

        //product datatable
        Route::get('/products', [ProductController::class, 'getProduct'])->name('products.datatable'); //routes for product datatable
        //routes for excel product import
        Route::post('product/import', [ProductController::class, 'import'])->name('product.import');

        //routes for events
        Route::get('/event', [EventsController::class, 'index'])->name('events.index');
        Route::get('event/create', [EventsController::class, 'create'])->name('events.create'); //routes for getting the create form
        Route::post('event/store', [EventsController::class, 'store'])->name('events.store'); //routes for store data in events
        Route::get('/events', [EventsController::class, 'getEvents'])->name('getEvents'); //routes for event datatable
        Route::get('/event/{id}/edit', [EventsController::class, 'edit'])->name('events.edit');
        Route::put('/event/{id}/update', [EventsController::class, 'update'])->name('events.update');
        Route::delete('/event/{id}', [EventsController::class, 'destroy'])->name('events.destroy'); //routes for deleting event

    });

    Route::group(['middleware' => 'role:admin'], function(){

        Route::get('student', [StudentController::class, 'index'])->name('student.index'); //routes for student index
        Route::get('user', [UserController::class, 'index'])->name('user.index'); //routes for user index

        //datatable routes
        Route::get('/students', [StudentController::class, 'getStudents'])->name('students.datatable'); //routes for student datatable
        Route::get('/users/datatable', [UserController::class, 'getUsers'])->name('users.datatable'); //routes for user datatable
        Route::get('/logs/datatable', [LogBookController::class, 'getLogs'])->name('log.datatable');
        // routes for edit roles
        Route::get('role/{id}/edit', [UserController::class, 'editRole'])->name('roles.edit'); //routes for user edit role
        Route::put('role/{id}/update', [UserController::class, 'updateRole'])->name('roles.update'); //routes for user update role

        //Routes for Excel Student Import
        Route::post('student/import', [StudentController::class, 'import'])->name('student.imports'); 

        //Route for delete
        Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.delete');    //Routes for deleting student 

        //Routes for deleting user 
        Route ::delete('users/{id}', [UserController::class, 'delete'])->name('users.delete');    //Routes for deleting user 

        Route::delete('members/{id}', [TransactionsController::class, 'deletemembers'])->name('members.delete'); //Routes for members Delete

        Route::delete('logs/{id}', [LogBookController::class, 'destroy'])->name('log.delete');

        //Routes for Chart
        Route::get('chart', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/member-chart', [DashboardController::class, 'MemberChart']);
        Route::get('/service-chart', [DashboardController::class, 'ServiceChart']);
        Route::get('/service-qty', [DashboardController::class, 'serviceQty']);
        Route::get('/service-color', [DashboardController::class, 'serviceColor']);
        Route::get('/user-role', [DashboardController::class, 'userRole']);

    });

    Route::group(['middleware' => 'role:unregistered'], function(){
        //gets the form for membership
        Route::get('form', [TransactionsController::class, 'getForms'])->name('member.forms');
        Route::post('forms', [TransactionsController::class, 'register'])->name('member.register');
    });

    Route::group(['middleware' => 'role:student,unregistered'], function(){

        Route::get('student/profile', [RegisterController::class, 'studentProfile'])->name('student.profile');
    });

    Route::group(['middleware' => 'role:student,officer,president'], function(){
 
        //password form for students
        Route::get('password/form', [UserController::class, 'changePassword'])->name('getPassword');
        //password form for officer & president of MTICS
        Route::get('password/officer', [UserController::class, 'officerPassword'])->name('officerPassword');
        //password update
        Route::post('password/update', [UserController::class, 'updatePassword'])->name('updatePassword');
    });

    Route::group(['middleware' => 'role:president,admin'], function(){
        Route::get('memberships', [TransactionsController::class, 'getMembers'])->name('members.datatable');
    });

    //routes for services
Route::get('services/form', [ServiceController::class, 'create'])->name('service.create');
Route::post('services/store', [ServiceController::class, 'store'])->name('service.store');

//route for service message
Route::get('service/message', [ServiceController::class, 'getMessage'])->name('service.msg');

Route::get('reciept', [TransactionsController::class, 'getpdf'])->name('pdf');

//Routes for Login
Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');

   Route::get('/search/{search?}', [SearchController::class, 'search'])->name('search'); // routes for searching a specific product

});

Route::get('/orders', [DashboardController::class, 'orderProducts']);

Route::get('/order-datatable', [OrderController::class, 'getOrder'])->name('order.datatable');

Route::get('/transactions',[TallyController::class, 'testTally'])->name('test.tally');

Route::get('transactions-pdf', [TallyController::class, 'generatePDF'])->name('records.pdf');