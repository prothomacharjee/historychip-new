<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NoticePromptController;
use App\Http\Controllers\WritingPromptController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/founder', [SiteController::class, 'founder'])->name('founder');
Route::get('/who-is-historychip-for', [SiteController::class, 'historychipfor'])->name('historychipfor');
Route::get('/frequently-asked-questions', [SiteController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [SiteController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/terms-and-conditions', [SiteController::class, 'termsandconditions'])->name('termsandconditions');
Route::get('/contact-us', [SiteController::class, 'contactus'])->name('contactus');


Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


// Notice Prompts
Route::get('/notice-prompts', [NoticePromptController::class, 'index'])->name('notice-prompts');
Route::get('/load-notice-prompts-data', [NoticePromptController::class, 'LoadNoticePromptDataTable'])->name('notice-prompts.loadDataTable');
Route::post('/store-notice-prompts-data', [NoticePromptController::class, 'store'])->name('notice-prompts.store');
Route::post('/fetch-notice-prompts-data', [NoticePromptController::class, 'FetchNoticePromptDataById'])->name('notice-prompts.fetch');
Route::post('/delete-notice-prompts/{id}', [NoticePromptController::class, 'destroy'])->name('notice-prompts.destroy');

// Contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/load-contacts-data', [ContactController::class, 'LoadContactDataTable'])->name('contacts.loadDataTable');
Route::get('/reply-contacts-data/{id}', [ContactController::class, 'reply'])->name('contacts.reply');
Route::post('/send-contacts-reply', [ContactController::class, 'send'])->name('contacts.send');
Route::post('/fetch-contacts-data', [ContactController::class, 'FetchNoticePromptDataById'])->name('contacts.fetch');
Route::post('/delete-contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// Writing Prompts
Route::get('/writing-prompts', [WritingPromptController::class, 'index'])->name('writing-prompts');
Route::get('/load-writing-prompts-data', [WritingPromptController::class, 'LoadWritingPromptDataTable'])->name('writing-prompts.loadDataTable');
Route::post('/store-writing-prompts-data', [WritingPromptController::class, 'store'])->name('writing-prompts.store');
Route::post('/fetch-writing-prompts-data', [WritingPromptController::class, 'FetchWritingPromptDataById'])->name('writing-prompts.fetch');
Route::post('/delete-writing-prompts/{id}', [WritingPromptController::class, 'destroy'])->name('writing-prompts.destroy');
