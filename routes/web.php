<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsValid;
use App\Http\Middleware\EnsureHospitalIsValid;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HospitalController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin/login', [AdminController::class, 'viewloginpage']);
Route::post('admin/connect', [AdminController::class, 'connect']);

Route::get('hospital/hospitallogin', [HospitalController::class, 'viewhospitallogin']);
Route::post('hospital/connect', [HospitalController::class, 'connect']);

Route::middleware([EnsureUserIsValid::class])->group(function () {

    Route::get('admin/adminlogout', [AdminController::class, 'adminlogout']);
    Route::get('admin/dashboard', [AdminController::class, 'viewadmindashboard']);
    Route::get('admin/hospitals', [AdminController::class, 'viewhospitals']);
    Route::get('admin/addhospital', [AdminController::class, 'addhospital']);
    Route::post('admin/savehospital', [AdminController::class, 'savehospital']);
    Route::get('admin/edithospital/{id}', [AdminController::class, 'edithospital']);
    Route::put('admin/updatehospital/{id}', [AdminController::class, 'updatehospital']);
    Route::delete('admin/deletehospital/{id}', [AdminController::class, 'deletehospital']);
    Route::get('admin/bloodbags', [AdminController::class, 'bloodbags']);
    Route::get('admin/addbloodbag', [AdminController::class, 'addbloodbag']);
    Route::post('admin/createbloodsbag', [AdminController::class, 'createbloodsbag']);
    Route::get('admin/editbloodbag/{id}', [AdminController::class, 'editbloodbag']);
    Route::get('admin/stocks', [AdminController::class, 'viewstocks']);
    Route::put('admin/updatebloodsbag/{id}', [AdminController::class, 'updatebloodsbag']);
    Route::delete('admin/deletebloodbag/{id}', [AdminController::class, 'deletebloodbag']);
    Route::get('admin/stocktrace', [AdminController::class, 'viewstocktrace']);
    Route::get('admin/bloodgiftprogram', [AdminController::class, 'bloodgiftprogram']);
    Route::get('admin/addbloodgift', [AdminController::class, 'addbloodgift']);
    Route::post('admin/savebloodgiftprogram', [AdminController::class, 'savebloodgiftprogram']);
    Route::get('admin/editbloodgiftprogram/{id}', [AdminController::class, 'editbloodgiftprogram']);
    Route::put('admin/updatebloodgiftprogram/{id}', [AdminController::class, 'updatebloodgiftprogram']);
    Route::delete('admin/deletebloodgiftprogram/{id}', [AdminController::class, 'deletebloodgiftprogram']);
});

Route::middleware([EnsureHospitalIsValid::class])->group(function () {

    Route::get('hospital/hospitaldashboard', [HospitalController::class, 'hospitaldashboard']);
    Route::get('hospital/stocks', [HospitalController::class, 'viewstocks']);
    Route::get('hospital/addstock', [HospitalController::class, 'addstock']);
    Route::post('hospital/savestock', [HospitalController::class, 'savestock']);
    Route::get('hospital/editquantity/{id}', [HospitalController::class, 'editquantity']);
    Route::patch('hospital/updatestockquantity/{id}', [HospitalController::class, 'updatestockquantity']);
    Route::get('hospital/hospitallogout', [HospitalController::class, 'hospitallogout']);
    Route::get('hospital/stocktrace', [HospitalController::class, 'viewstocktrace']);
    Route::delete('hospital/deletequantity/{id}', [HospitalController::class, 'deletequantity']);

});