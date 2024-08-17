<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class,'index'])->name('index');
Route::get('/employees/create', [EmployeeController::class,'create'])->name('create-employee');
Route::post('/employees/store', [EmployeeController::class,'store'])->name('store-employee');
Route::get('/employees/{employee}', [EmployeeController::class,'show'])->name('show-employee');
Route::get('/employees/{id}/edit', [EmployeeController::class,'edit'])->name('edit-employee');
Route::put('/employees/{employee}', [EmployeeController::class,'update'])->name('update-employee');
Route::delete('/employees/{employee}', [EmployeeController::class,'destroy'])->name('destroy-employee');
