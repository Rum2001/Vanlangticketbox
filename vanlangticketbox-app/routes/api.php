<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']); // Lấy danh sách Users
Route::get('/users/{id}', [UserController::class, 'show']); // Lấy thông tin một User theo id
Route::post('/users', [\App\Http\Controllers\UserController::class, 'store']); // Thêm một User mới
Route::put('/users/{id}', [UserController::class, 'update']); // Cập nhật thông tin một User
Route::delete('/users/{id}', [UserController::class, 'destroy']); // Xóa một User
Route::get('/tickets', [TicketController::class, 'index']); // Lấy danh sách Ticket
Route::get('/tickets/{id}', [TicketController::class, 'show']); // Lấy thông tin một Ticket theo id
Route::post('/tickets', [TicketController::class, 'store']); // Thêm một Ticket mới
Route::put('/tickets/{id}', [TicketController::class, 'update']); // Cập nhật thông tin một Ticket
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);//Xóa một Ticket mới
Route::get('/events', [\App\Http\Controllers\EventController::class, 'index']);
Route::get('/events/{id}', [\App\Http\Controllers\EventController::class, 'show']);
Route::get('/events/search', [\App\Http\Controllers\EventController::class, 'search']);
Route::post('/events', [\App\Http\Controllers\EventController::class, 'store']);
Route::put('/events/{id}', [\App\Http\Controllers\EventController::class, 'update']);
Route::delete('/events/{id}', [\App\Http\Controllers\EventController::class, 'destroy']);