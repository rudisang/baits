<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/dashboard/account', [DashboardController::class, 'editAccount']);
Route::patch('/dashboard/account/update-password', [DashboardController::class, 'updatePassword']);
Route::patch('/dashboard/account/update-details', [DashboardController::class, 'updateDetails']);
Route::resource('/dashboard', DashboardController::class);

require __DIR__.'/auth.php';
