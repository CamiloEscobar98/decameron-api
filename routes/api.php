<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomTypeController;
use App\Http\Controllers\Api\RoomAccommodationController;
use App\Http\Controllers\Api\RoomController;

// Rutas para Hotel
Route::apiResource('hotels', HotelController::class);

// Rutas para RoomType
Route::apiResource('room_types', RoomTypeController::class);

// Rutas para RoomAccommodation
Route::apiResource('room_accommodations', RoomAccommodationController::class);

// Rutas para Room
Route::apiResource('rooms', RoomController::class);
