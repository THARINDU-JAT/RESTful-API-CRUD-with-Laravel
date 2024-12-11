<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//all employees
Route::get('/employees', [EmployeeController::class, 'getEmployee']);
//get specific employees
Route::get('/employees/{id}',[EmployeeController::class, 'getEmployeeById']);
//add specific employees
Route::post('/add-employees',[EmployeeController::class, 'addEmployee']);
//update specific employees
Route::put('/employees/update-employees/{id}',[EmployeeController::class, 'updateEmployee']);
//delete specific employees
Route::delete('/employees/delete-employees/{id}',[EmployeeController::class, 'deleteEmployee']);