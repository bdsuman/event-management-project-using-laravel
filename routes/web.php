<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/',[HomeController::class,'IndexPage']);

Route::get('/post{id?}',function(){
    return view('frontend.pages.post-page');
});

