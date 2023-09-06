<?php

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

    Route::get('/provinsi', [provinsiController::class, 'index']);
    Route::post('/provinsi', [provinsiController::class, 'store']);
    Route::put('/provinsi/{id}', [provinsiController::class, 'update']);
    Route::post('/provinsi/{id}', [provinsiController::class, 'destroy']);

    
});
