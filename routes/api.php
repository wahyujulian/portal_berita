<?php

use App\Http\Controllers\kabupatenController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\kecamatanController;
use App\Http\Controllers\KelurahaanController;
use App\Http\Controllers\provinsiController;
use App\Http\Controllers\UsersModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UsersModelController::class, 'login'])->name('login');
Route::post('/register', [UsersModelController::class,'store']);

Route::middleware(['auth:sanctum'])->group(function (){
    
    Route::get('/logout', [UsersModelController::class,'logout']);
//Provinsi
    Route::get('/provinsi', [provinsiController::class, 'index']);
    Route::post('/provinsi', [provinsiController::class, 'store']);
    Route::put('/provinsi/{id}', [provinsiController::class, 'update']);
    Route::post('/provinsi/{id}', [provinsiController::class, 'destroy']);
//Kabupaten
    Route::get('/kabupaten', [kabupatenController::class, 'index']);
    Route::post('/kabupaten', [kabupatenController::class, 'store']);
    Route::put('/kabupaten/{id}', [kabupatenController::class, 'update']);
    Route::post('/kabupaten/{id}', [kabupatenController::class, 'destroy']);
//Kecamatan
    Route::get('/kecamatan', [kecamatanController::class, 'index']);
    Route::post('/kecamatan', [kecamatanController::class, 'store']);
    Route::put('/kecamatan/{id}', [kecamatanController::class, 'update']);
    Route::post('/kecamatan/{id}', [kecamatanController::class, 'destroy']);
//Kelurahaan
    Route::get('/kelurahan', [KelurahaanController::class, 'index']);
    Route::post('/kelurahan', [KelurahaanController::class, 'store']);
    Route::put('/kelurahan/{id}', [KelurahaanController::class, 'update']);
    Route::post('/kelurahan/{id}', [KelurahaanController::class, 'destroy']);
//Kategori
    Route::get('kategori', [kategoriController::class, 'index']);
    Route::post('kategori', [kategoriController::class, 'store']);
    Route::put('/kategori/{id}', [kategoriController::class, 'update']);
    Route::post('/kategori/{id}', [kategoriController::class, 'destroy']);

});
