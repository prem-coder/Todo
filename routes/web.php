<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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



// Route::get('list', [TaskController::class, 'index']);

// Route::get('login', function () {
//     return view('login');
// });

Route::get('/', [UserController::class, 'loginCheck']);

Route::get('login', [UserController::class, 'loginCheck']);

Route::post('login', [UserController::class, 'login']);

// Route::get('logout', [UserController::class, 'logout']);

Route::get('register', function() {
    return view('register');
});

Route::post('register', [UserController::class, 'register']);

// Route::post('addtask', [TaskController::class, 'addTask']);

Route::group(['middleware' => 'usersession'], function() {
    Route::get('list', [TaskController::class, 'index']); 
    Route::post('addtask', [TaskController::class, 'addTask']);
    Route::get('completed', [TaskController::class, 'completed']);
    Route::get('sDelete/{id}', [TaskController::class, 'sDelete']);
    Route::get('deletePerm/{id}', [TaskController::class, 'deletePermanently']);
    Route::get('edittask/{id}', [TaskController::class, 'editTask']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::post('edittask/update/{id}', [TaskController::class, 'updateTask']);
});
