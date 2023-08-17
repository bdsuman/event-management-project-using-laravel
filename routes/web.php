<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/',[HomeController::class,'IndexPage']);

Route::get('/post/{id}',[HomeController::class,'PostPage']);

Route::post('/event-registration',[HomeController::class,'EventRegistration']);
  

