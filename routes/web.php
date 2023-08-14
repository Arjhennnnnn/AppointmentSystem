<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
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
    return view('welcome',['section' => 'welcome']);
});

Route::get('/login', function () {
    return view('welcome',['section' => 'login']);
});

Route::get('/register', function () {
    return view('welcome',['section' => 'register']);
});

// Route::post('/process', function (Request $request) {
//     dd($request);
//     $request->validate([
//         'email' => 'required',
//         'password' => 'required'
//     ]);
// });

Route::post('/store', [UserController::class, 'store']);
Route::post('/process', [UserController::class, 'process']);
Route::post('/logout', [UserController::class, 'logout']);


Route::post('/create/appointment', [AppointmentController::class, 'store']);
Route::get('/appointment/show', [AppointmentController::class, 'show']);










