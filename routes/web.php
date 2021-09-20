<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::group(['middleware' => 'api'], function(){
    
    Route::get('/index',[EmployeeController::class, 'index']);
    Route::post('/create',[EmployeeController::class, 'create']);
    Route::get('/edit/{id}',[EmployeeController::class, 'edit']);
    Route::post('/update/{id}',[EmployeeController::class, 'update']);
    Route::get('/delete/{id}',[EmployeeController::class, 'destroy']);



});
