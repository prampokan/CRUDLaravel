<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function (){
//     return view('landing', [
//         'title' => "Beranda"
//     ]);
// });

Route::get('/beranda', [UserController::class, 'landing'])->name('beranda');

Route::get('/dataUser', [UserController::class, 'dataUser'])->name('dataUser');

Route::get('/createUser', [UserController::class, 'createUser'])->name('createUser');

Route::get('/editUser/{user_id}', [UserController::class, 'editUser'])->name('editUser');

Route::post('/update/{user_id}', [UserController::class, 'update'])->name('update');

Route::get('/destroy/{user_id}', [UserController::class, 'destroy'])->name('destroy');

Route::post('/simpanUser', [UserController::class, 'store'])->name('simpanUser');

Route::get('register', [UserController::class, 'register'])->name('register');

Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('/', [UserController::class, 'login'])->name('login');

Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');