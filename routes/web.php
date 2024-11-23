<?php

use App\Http\Controllers\CatogoriesController;
use App\Http\Controllers\tasksControler;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserValid;
use App\Http\Middleware\AdminAccess;

Route::get('/',[UsersController::class,'index'])->name('index');
Route::post('/register',[UsersController::class,'register'])->name('register');
Route::get('/login',[UsersController::class,'login'])->name('login');
Route::post('/login',[UsersController::class,'loginMatch'])->name('loginMatch');
Route::get('/dashboard',[UsersController::class,'dashboard'])->name('dashboard');
// Route::get('/dashboard/inner',[UsersController::class,'InnerPage'])->name('InnerPage');
Route::get('/logout', [UsersController::class,'logout'])->name('logout');

// CRUD operations
// create 
Route::get('/create',[tasksControler::class,'index'])->name('index')->middleware(UserValid::class);
Route::middleware([UserValid::class])->group(function(){
    Route::post('/create_task',[tasksControler::class,'create_task'])->name('create_task');
    Route::get('/display_Tasks',[tasksControler::class,'displayTask'])->name('displayTask');
   //categories
});


// Edit
Route::middleware([AdminAccess::class])->group(function(){
    Route::get('/edit/{id}',[tasksControler::class,'edit'])->name('edit');
    Route::put('/update/{id}',[tasksControler::class,'update'])->name('update');
    Route::get('/delete/{id}',[tasksControler::class,'destroy'])->name('destroy');
});

//Categori Crud
Route::middleware([UserValid::class])->group(function(){
Route::get('/create_categori',[CatogoriesController::class,'Cateindex'])->name('Cateindex');;
Route::post('/add_categori',[CatogoriesController::class,'add_catogories'])->name('add_catogories');
Route::get('/showCategori',[CatogoriesController::class,'showCategori'])->name('showCategori');
});

Route::middleware([AdminAccess::class])->group(function(){
Route::get('/catedit/{id}',[CatogoriesController::class,'catEdit'])->name('catEdit');
Route::post('/cateupdate/{id}',[CatogoriesController::class,'CateUpdate'])->name('CateUpdate');
Route::get('/delete/{id}',[CatogoriesController::class,'delete'])->name('delete');
});