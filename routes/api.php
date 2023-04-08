<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/chart/member-chart', [DashboardController::class, 'MemberChart'])->name('member.chart');
Route::get('/chart/service-chart', [DashboardController::class, 'ServiceChart'])->name('service.chart');
Route::get('/chart/service-qty', [DashboardController::class, 'serviceQty'])->name('service.quantity');
Route::get('/chart/service-color', [DashboardController::class, 'serviceColor'])->name('service.color');
Route::get('/chart/user-role', [DashboardController::class, 'userRole'])->name('users.role');
Route::get('/chart/orders', [DashboardController::class, 'orderProducts'])->name('order.products');