<?php


use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return view('frontend.pages.index-page');
});
Route::get('/post{id?}',function(){
    return view('frontend.pages.post-page');
});

