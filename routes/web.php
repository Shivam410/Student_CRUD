<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[StudentController::class,'index'])->name('Student.Index');

Route::get('/AddView',[StudentController::class,'create'])->name('Add.View');

Route::post('/AddStudent',[StudentController::class,'addStudent'])->name('Add.Student');

Route::get('/Edit/{id}',[StudentController::class,'editStudent'])->name('Edit.Student');

Route::post('/Update/{id}',[StudentController::class,'updateStudent'])->name('Update.Student');

Route::delete('/Delete/{id}',[StudentController::class,'deleteStudent'])->name('Delete.Student');

Route::get('/viewStudent/{id}',[StudentController::class,'viewStudent'])->name('View.Student');
