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

Route::get('/comments/{story_id}', [ApiController::class, 'api_story_comments'])->name('api.story.comment');
Route::post('/write-comments', [ApiController::class, 'api_write_story_comments'])->name('api.story.comment.write');

Route::post('/save-story', [ApiController::class, 'api_save_update_story'])->name('api.story.save');

Route::get('/user-details/{user_id}', [ApiController::class, 'api_user_details'])->name('api.user-details');

Route::get('/author-stories/{author_id}', [ApiController::class, 'api_author_stories'])->name('api.author.story');




