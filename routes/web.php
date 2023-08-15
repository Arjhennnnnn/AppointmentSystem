<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Models\Appointment;
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


Route::get('/', [UserController::class, 'index']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

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


Route::post('/create/appointment', [AppointmentController::class, 'store'])->middleware('auth');
Route::get('/appointment/show', [AppointmentController::class, 'show'])->middleware('auth');

// Route::get('/admin/show', [AdminController::class, 'show']);

// Route::get('/admin/show', function () {
//     $appointments = Appointment::with('stats')->where('status',2)->get();
//     return view('admin.adminside',
//     ['section' => 'adminlist',
//     'message' => 'Admin Login Successfully',
//     'appointments' => $appointments
//     ]);
// });

Route::get('/admin/request', function () {
    $appointments = Appointment::with('stats')->where('status',1)->get();
    return view('admin.adminrequest',
    ['section' => 'adminlist',
    'message' => 'Admin Login Successfully',
    'appointments' => $appointments
    ]);
});

Route::get('/admin/show', [AdminController::class,'show'])->middleware('admin');
Route::get('/admin/history', [AdminController::class,'history'])->middleware('admin');

Route::post('/admin/approve/{id}', [AdminController::class, 'approve']);
Route::post('/appointment/edit/{id}', [AppointmentController::class,'edit']);
Route::put('/appointment/update/{id}', [AppointmentController::class, 'update']);
Route::put('/appointment/cancel/{id}', [AppointmentController::class, 'cancel']);









