<?php

use App\Http\Controllers\Schedulings;
use App\Http\Controllers\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-doctor', [User::class, 'index']);
Route::get('/doctor-agenda', [User::class, 'agenda'])->name('doctor-agenda');
Route::post('/agenda/{user_id}', [User::class, 'storeAgenda'])->name('storeAgenda');
Route::get('/consulta', [Schedulings::class, 'create']);
Route::post('/create-consulta', [Schedulings::class, 'store']);
Route::post('/get-scheduling-open', [Schedulings::class, 'getSchedulingOpen']);
Route::get('/meus-agendamentos/{user_id}', [Schedulings::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->resource('/offices', \App\Http\Controllers\OfficesController::class);
