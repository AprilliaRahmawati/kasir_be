<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\DetailTransactionController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::post('/login', [LoginController::class, 'login']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{id}',[ProductController::class,'detail']);
Route::delete('/product/{id}',[ProductController::class,'delete']);
Route::post('/product', [ProductController::class, 'store']);
Route::put('/product/{id}', [ProductController::class, 'update']);


Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::get('/transactions/{id}', [TransactionController::class, 'show']);
Route::put('/transactions/{id}', [TransactionController::class, 'update']);
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

Route::get('/detail-transactions', [DetailTransactionController::class, 'index']);
Route::get('/detail-transactions/{id}', [DetailTransactionController::class, 'show']);
Route::post('/detail-transactions', [DetailTransactionController::class, 'store']);
Route::put('/detail-transactions/{id}', [DetailTransactionController::class, 'update']);
Route::delete('/detail-transactions/{id}', [DetailTransactionController::class, 'destroy']);





