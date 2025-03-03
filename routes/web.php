<?php

use App\Http\Controllers\AuthController; //Import AuthController
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\AdminProfileController;


Route::get('/BookDetails', [BookingController::class,'index'])->name('BookDetails'); //ແກ້ແລ່້ວ



//User Homepage, redirected after successful login
        Route::get('/',[UserHomeController::class,'index'])->name('welcome'); 

Route::get('/admin-dashboard', [AdminHomeController::class, 'index']);

Route::group(['prefix' => 'account'],function(){
    Route::post('/bookings', [BookingController::class, 'store'])->name('account.store');

    // Guest Middleware - routes only accessible if NOT logged in
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login',[AuthController::class,'login'])->name('login');  //Updated Controller
        Route::get('register',[AuthController::class,'register'])->name('register');  //Updated Controller
        Route::post('authenticate',[AuthController::class,'loginAction'])->name('account.authenticate'); //Updated Controller
        Route::post('registerSave',[AuthController::class,'registerSave'])->name('account.registerSave'); //Updated Controller
    });

    // Auth Middleware - routes only accessible if LOGGED in
    Route::group(['middleware' => 'auth'], function() {
       //User Homepage, redirected after successful login
        Route::get('logout',[AuthController::class,'logout'])->name('account.logout'); //Updated Controller
    });
});


   Route::get('rooms',[RoomController::class,'index'])->name('rooms'); 
   Route::match(['get', 'post'], '/bookingform/{id}', [RoomController::class, 'roomdata'])->name('bookingform');
   

//    Route::get('bookingform',[RoomController::class,'bookingroom'])->name('bookingroom'); 
Route::group(['prefix' => 'admin'],function(){
    Route::get('dashboard',[AdminHomeController::class,'index'])->name('adminpage/admin.dashboard');
    Route::get('Add_Room',[AdminHomeController::class,'AddRoom'])->name('Add_Room');
    Route::post('upload',[AdminHomeController::class,'upload'])->name('admin/upload');
    Route::get('/admin/edit/{id}',[AdminHomeController::class,'edit'])->name('admin/edit');
    Route::get('history', [BookingController::class, 'history'])->name('history');
    Route::get('delete/{id}', [BookingController::class, 'delete'])->name('admin.delete');
    Route::get('roomadmin', [RoomController::class, 'roomadmin'])->name('admin.roomadmin');
    Route::get('deleteroomadmin/{room_id}', [RoomController::class, 'deleteroomadmin'])->name('roomadmin.delete');

    Route::post('/admin/update/{id}',[AdminHomeController::class,'update'])->name('admin/update');
    
    //guest middleware
    Route::group(['middleware' => 'guest:admin'],function (){  // Use a named guard 'admin'
        Route::get('login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
    //authed middleware
    Route::group(['middleware' => 'auth:admin'],function (){  // Use a named guard 'admin'
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    });
});

Route::get('/ProfileUser',[ProfileUserController::class,'index'])->name('ProfileUser');

Route::get('/ProfileAdmin', [AdminProfileController::class, 'index'])->name('ProfileAdmin');



