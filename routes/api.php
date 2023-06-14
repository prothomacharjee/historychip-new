<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [ApiController::class, 'api_login'])->name('api.login');
Route::post('/register', [ApiController::class, 'api_register'])->name('api.register');
Route::post('/logout', [ApiController::class, 'api_logout'])->name('api.logout');

Route::get('/stories/{slug?}', [ApiController::class, 'api_read_story'])->name('api.story.read');

Route::get('/partners/{slug?}', [ApiController::class, 'api_partners'])->name('api.partners');

