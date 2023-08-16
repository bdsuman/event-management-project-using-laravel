<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
// User Logout
Route::get('/logout',[UserController::class,'UserLogout']);
// Page Routes
Route::get('/userLogin',[UserController::class,'LoginPage'])->name('login');
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->name('home');
    Route::get('/resetPassword',[UserController::class,'ResetPasswordPage']);
    Route::get('/userProfile',[UserController::class,'ProfilePage']);
   
    Route::get('/categoryPage',[CategoryController::class,'CategoryPage']);
    Route::get('/eventPage',[EventController::class,'EventPage']);
    Route::get('/reportPage',[ReportController::class,'index']);
   

    Route::post('/reset-password',[UserController::class,'ResetPassword']);
    Route::get('/user-profile',[UserController::class,'UserProfile']);
    Route::post('/user-update',[UserController::class,'UpdateProfile']);

    // Category API
    Route::post("/create-category",[CategoryController::class,'CategoryCreate']);
    Route::get("/list-category",[CategoryController::class,'CategoryList']);
    Route::post("/delete-category",[CategoryController::class,'CategoryDelete']);
    Route::post("/update-category",[CategoryController::class,'CategoryUpdate']);
    Route::post("/category-by-id",[CategoryController::class,'CategoryByID']);

    // Event API
    Route::post("/create-event",[EventController::class,'EventCreate']);
    Route::get("/list-event",[EventController::class,'EventList']);
    Route::post("/delete-event",[EventController::class,'EventDelete']);
    Route::post("/update-event",[EventController::class,'EventUpdate']);
    Route::post("/event-by-id",[EventController::class,'EventByID']);

});