<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students',[StudentController::class,'index']);
Route::get('/students/{id}',[StudentController::class,'select']);
