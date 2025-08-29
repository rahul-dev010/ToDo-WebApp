<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Auth;

Route::get('/wc', function () {
    return view('welcome');
});

// /route of login page
Route::get('login',function (){
return view('login');
})->name('login');

Route::post('login',[AuthController::class,'login'])->name('loginUser');

// /ropute for register page
Route::get('register',function (){
return view('register');
})->name('register');
Route::post('register',[AuthController::class,'register'])->name('registerUser');

// Route for Show to sql queryes 
Route::get('/show',[AuthController::class,'show'])->name('show');

// Route for home page ----------------all to do--------------------------
// Route::get('home',[AuthController::class,'login'])->name('home');
Route::view('home','home');
Route::get('home',[ToDoController::class,'homePage'])->name('home');


Route::get('create',function (){
    return view('/layout/create');
})->name('create');



// controller routing ---------for form 

Route::post('create',[ToDoController::class,'createToDo']);

// route to delete the task 
Route::delete('delete/{id}',[ToDoController::class,'delete'])->name('delete');

// Route for editing and updating the task
Route::get('edit/{id}',[ToDoController::class,'edit'])->name('edit');
Route::post('update/{id}',[ToDoController::class,'update'])->name('update');

// for logout from home
// Route::post()
