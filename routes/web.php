<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnimalController;

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
Route::get('/search', [AnimalController::class, 'search']);


Route::patch('/permit/action/{id}', [DashboardController::class, 'permitAction']);
Route::get('/permits', [DashboardController::class, 'permits']);
Route::post('/permit/apply', [DashboardController::class, 'permitApply']);
Route::patch('/request/action/{id}', [DashboardController::class, 'requestAction']);
Route::post('/transfer/request/{id}', [DashboardController::class, 'requestTransfer']);

Route::get('/chat/room', [DashboardController::class, 'chatIndex']);
Route::get('/chat/room/{id}', [DashboardController::class, 'chatShow']);
Route::post('/chat/send/{id}', [DashboardController::class, 'sendMessage']);

Route::get('/animal/create', [DashboardController::class, 'createAnimalForm']);
Route::post('/animal/create', [DashboardController::class, 'storeAnimal']);
Route::patch('/animal/edit/{id}', [DashboardController::class, 'updateAnimal']);

Route::post('/brand/register', [DashboardController::class, 'registerBrand']);
Route::patch('/location/edit/{id}', [DashboardController::class, 'editLocation']);
Route::post('/location/register', [DashboardController::class, 'registerLocation']);
Route::post('/keeper/register', [DashboardController::class, 'registerKeeper']);
Route::post('/dashboard/create-user', [DashboardController::class, 'storeNewUser']);
Route::get('/dashboard/create-user', [DashboardController::class, 'createUser']);
Route::get('/dashboard/account', [DashboardController::class, 'editAccount']);
Route::get('/dashboard/account/user/{id}', [DashboardController::class, 'editUser']);
Route::delete('/dashboard/account/user/{id}', [DashboardController::class, 'deleteUser']);
Route::patch('/dashboard/account/update-password/{id}', [DashboardController::class, 'updatePassword']);
Route::patch('/dashboard/account/update-details/{id}', [DashboardController::class, 'updateDetails']);
Route::resource('/dashboard', DashboardController::class);

require __DIR__.'/auth.php';
