<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Front\homeController;
use App\Http\Controllers\Front\coursesController;
use App\Http\Controllers\Front\contactController;
use App\Http\Controllers\Front\messageController;
use App\Http\Controllers\Admin\homepageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\trainersController;
use App\Http\Controllers\Admin\catsController;
use App\Http\Controllers\Admin\courseController;
use App\Http\Controllers\Admin\studentController;


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
//Routs of front controller
Route::name('Front.')->group(function(){

    Route::get('/home',[homeController::class,'index'])->name('home') ;
    Route::get('/courses/cat/{id}',[coursesController::class,'index'])->name('cat') ;
    Route::get('/cat/{id}/course/{c_id}',[coursesController::class,'show'])->name('course') ;
    Route::get('/contact',[contactController::class,'index'])->name('contact') ;
    Route::post('/message/newsletter',[messageController::class,'newsletter'])->name('message.newsletter') ;
    Route::post('/message/contact',[messageController::class,'contact'])->name('message.contact') ;
    Route::post('/message/enroll',[messageController::class,'enroll'])->name('message.enroll') ;

});

Route::name('Admin.')->prefix('dashboard')->group(function(){
    
    Route::get('/login',[AuthController::class,'login'])->name('login') ;
    Route::post('/dologin',[AuthController::class,'dologin'])->name('dologin') ;

Route::middleware('admin:admin')->group(function(){
     
  
    
    Route::get('/logout',[AuthController::class,'logout'])->name('logout') ;
    Route::get('/',[homepageController::class,'index'])->name('home') ;
    //routes of categories
    
    Route::get('/cats',[catsController::class,'index'])->name('cats') ;
    Route::get('/cat/delete/{id}',[catsController::class,'delete'])->name('cats.delete') ;
    Route::get('/cats/create',[catsController::class,'create'])->name('cats.create') ;
    Route::post('/cats/store',[catsController::class,'store'])->name('cats.store') ;
    Route::get('/cats/edit/{id}',[catsController::class,'edit'])->name('cats.edit') ;
    Route::post('/cats/update',[catsController::class,'update'])->name('cats.update') ;

    //routes of trainers

    Route::get('/trainers',[trainersController::class,'index'])->name('trainers') ;
    Route::get('/trainers/delete/{id}',[trainersController::class,'delete'])->name('trainers.delete') ;
    Route::get('/trainers/create',[trainersController::class,'create'])->name('trainers.create') ;
    Route::post('/trainers/store',[trainersController::class,'store'])->name('trainers.store') ;
    Route::get('/trainers/edit/{id}',[trainersController::class,'edit'])->name('trainers.edit') ;
    Route::post('/trainers/update',[trainersController::class,'update'])->name('trainers.update') ;

    //routes of courses

    Route::get('/courses',[courseController::class,'index'])->name('courses') ;
    Route::get('/courses/delete/{id}',[courseController::class,'delete'])->name('courses.delete') ;
    Route::get('/courses/create',[courseController::class,'create'])->name('courses.create') ;
    Route::post('/courses/store',[courseController::class,'store'])->name('courses.store') ;
    Route::get('/courses/edit/{id}',[courseController::class,'edit'])->name('courses.edit') ;
    Route::post('/courses/update',[courseController::class,'update'])->name('courses.update') ;
    Route::get('/courses/show/{id}',[courseController::class,'show'])->name('courses.show') ;

    //routes of students

    Route::get('/students',[studentController::class,'index'])->name('students') ;
    Route::get('/students/delete/{id}',[studentController::class,'delete'])->name('students.delete') ;
    Route::get('/students/create',[studentController::class,'create'])->name('students.create') ;
    Route::post('/students/store',[studentController::class,'store'])->name('students.store') ;
    Route::get('/students/edit/{id}',[studentController::class,'edit'])->name('students.edit') ;
    Route::post('/students/update',[studentController::class,'update'])->name('students.update') ;
    Route::get('/students/show/{id}',[studentController::class,'show'])->name('students.show') ;
    Route::get('/students/showcourses/{id}',[studentController::class,'showcourses'])->name('students.showcourses') ;
    Route::get('/students/showcourses/{id}',[studentController::class,'showcourses'])->name('students.showcourses') ;
    Route::get('/students/{id}/courses/{c_id}/approve',[studentController::class,'approve'])->name('students.approve') ;
    Route::get('/students/{id}/courses/{c_id}/reject',[studentController::class,'reject'])->name('students.reject') ;





});
   
});
