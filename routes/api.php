<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;

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
// Route::apiResource('organizer', OrganizerController::class);
Route::apiResource('event', EventController::class);
Route::apiResource('organizer', OrganizerController::class);
Route::apiResource('participant', ParticipantController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('userdetail', UserDetailController::class);

// Index
// Route::get('/event', [EventController::class, 'index']);

// // Store
// Route::post('/event', [EventController::class, 'store']);

// // Show
// Route::get('/event/{id}', [EventController::class, 'show']);

// // Update
// Route::put('/event/{id}', [EventController::class, 'update']);
// or
// Route::patch('/users/{id}', [UserController::class, 'update']);

// Destroy
// Route::delete('/event/{id}', [EventController::class, 'destroy']);

// Index
// Route::get('/organizer', [Organizer::class, 'index']);

// // Store
// Route::post('/organizer', [Organizer::class, 'store']);

// // Show
// Route::get('/organizer/{id}', [Organizer::class, 'show']);

// // Update
// Route::put('/organizer/{id}', [Organizer::class, 'update']);
// // or
// // Route::patch('/users/{id}', [UserController::class, 'update']);

// // Destroy
// Route::delete('/organizer/{id}', [Organizer::class, 'destroy']);








// Ruta para agregar un participante a un evento(attach)
// Route::post('/event/{event}/ participants/{participant}',
// [EventController::class, 'attachParticipant']);

// // Ruta para eliminar un participante de un evento(detach)
// Route::delete('/event/{event}/ participants/{participant}',
// [EventController::class, 'detachParticipant']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
