<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/students',[StudentController::class,'index']);
Route::get('/students/{id}',[StudentController::class,'select']);
Route::post('/students', [StudentController::class,'create']);
Route::patch('/students/{id}', [StudentController::class,'update']);
Route::delete('/students/{id}', [StudentController::class,'delete']);

Route::get('/teachers',[TeacherController::class,'index']);
Route::post('/teachers', [TeacherController::class,'create']);
Route::patch('/teachers/{id}', [TeacherController::class,'update']);
Route::delete('/teachers/{id}', [TeacherController::class,'delete']);
Route::get('/teachers/{id}',[TeacherController::class,'caclAve']);