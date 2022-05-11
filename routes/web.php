<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment']);


Route::get('/showappointment',[AdminController::class,'showappointment']);



Route::get('/approved/{id}',[HomeController::class,'approved']);


Route::get('/canceled/{id}',[HomeController::class,'canceled']);



Route::get('/showdoctor',[AdminController::class,'showdoctor']);



Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor']);


Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);


Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);

Route::get('/email_send/{id}',[AdminController::class,'email_send']);

Route::post('/send_email/{id}',[AdminController::class,'send_email']);
