<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('admin', [AdminController::class, 'viewadmin']);
Route::get('admin/hopitaux', [AdminController::class, 'viewhospital']);
Route::get('admin/ajouterhopital', [AdminController::class, 'addhospital']);
Route::post('admin/ajouterhopital', [AdminController::class, 'ajouterhopital']);
Route::get('admin/edithospital/{id}', [AdminController::class, 'edithospital']);
Route::put('admin/updatehospital/{id}', [AdminController::class, 'updatehospital']);
Route::delete('admin/deletehospital/{id}', [AdminController::class, 'deletehospital']);
