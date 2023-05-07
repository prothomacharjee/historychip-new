<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PartnerTypeController;
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

Auth::routes(['verify' => true]);

// User Authentications
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');
Route::get('/register', [UserAuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.submit');
Route::get('/password/reset', [UserAuthController::class, 'showResetPasswordForm'])->name('password.request');


//User Profile
Route::get('/profile', [SiteController::class, 'profile'])->name('profile');
Route::get('/my-stories', [SiteController::class, 'my_stories'])->name('my-stories');


Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/founder', [SiteController::class, 'founder'])->name('founder');
Route::get('/who-is-historychip-for', [SiteController::class, 'historychipfor'])->name('historychipfor');
Route::get('/frequently-asked-questions', [SiteController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [SiteController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/terms-and-conditions', [SiteController::class, 'termsandconditions'])->name('termsandconditions');
Route::get('/contact-us', [SiteController::class, 'contactus'])->name('contactus');
Route::get('/writing-prompts', [SiteController::class, 'writingprompt'])->name('writingprompt');
Route::get('/blogs', [SiteController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug?}', [SiteController::class, 'blogs'])->name('blogs');

Route::get('/story/create', [SiteController::class, 'blogs'])->name('story.create');

Route::post('/getwritingprompts', [WritingPromptController::class, 'getwritingprompts'])->name('writing-prompts.get');



// ADMIN PANEL


// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Notice Prompts
    Route::get('/notice-prompts', [NoticePromptController::class, 'index'])->name('admin.notice-prompts');
    Route::get('/load-notice-prompts-data', [NoticePromptController::class, 'LoadNoticePromptDataTable'])->name('admin.notice-prompts.loadDataTable');
    Route::post('/store-notice-prompts-data', [NoticePromptController::class, 'store'])->name('admin.notice-prompts.store');
    Route::post('/fetch-notice-prompts-data', [NoticePromptController::class, 'FetchNoticePromptDataById'])->name('admin.notice-prompts.fetch');
    Route::post('/delete-notice-prompts/{id}', [NoticePromptController::class, 'destroy'])->name('admin.notice-prompts.destroy');

    // Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
    Route::get('/load-contacts-data', [ContactController::class, 'LoadContactDataTable'])->name('admin.contacts.loadDataTable');
    Route::get('/reply-contacts-data/{id}', [ContactController::class, 'reply'])->name('admin.contacts.reply');
    Route::post('/send-contacts-reply', [ContactController::class, 'send'])->name('admin.contacts.send');
    Route::post('/fetch-contacts-data', [ContactController::class, 'FetchNoticePromptDataById'])->name('admin.contacts.fetch');
    Route::post('/delete-contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    // Writing Prompts
    Route::get('/writing-prompts', [WritingPromptController::class, 'index'])->name('admin.writing-prompts');
    Route::get('/load-writing-prompts-data', [WritingPromptController::class, 'LoadWritingPromptDataTable'])->name('admin.writing-prompts.loadDataTable');
    Route::post('/store-writing-prompts-data', [WritingPromptController::class, 'store'])->name('admin.writing-prompts.store');
    Route::post('/fetch-writing-prompts-data', [WritingPromptController::class, 'FetchWritingPromptDataById'])->name('admin.writing-prompts.fetch');
    Route::post('/delete-writing-prompts/{id}', [WritingPromptController::class, 'destroy'])->name('admin.writing-prompts.destroy');


    // Blogs
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::get('/load-regular-blogs-data', [BlogController::class, 'LoadRegularBlogDataTable'])->name('admin.blogs.LoadRegularBlogDataTable');
    Route::get('/load-featured-blogs-data', [BlogController::class, 'LoadFeaturedBlogDataTable'])->name('admin.blogs.LoadFeaturedBlogDataTable');
    Route::get('/load-drafted-blogs-data', [BlogController::class, 'LoadDraftedBlogDataTable'])->name('admin.blogs.LoadDraftedBlogDataTable');
    Route::post('/store-blogs-data', [BlogController::class, 'store'])->name('admin.blogs.store');
    // Route::post('/fetch-writing-prompts-data', [BlogController::class, 'FetchWritingPromptDataById'])->name('writing-prompts.fetch');
    // Route::post('/delete-writing-prompts/{id}', [BlogController::class, 'destroy'])->name('writing-prompts.destroy');


    // Partner Type
    Route::get('/partner-types', [PartnerTypeController::class, 'index'])->name('admin.partner-types');
    Route::get('/load-partner-types-data', [PartnerTypeController::class, 'LoadPartnerTypeDataTable'])->name('admin.partner-types.loadDataTable');
    Route::post('/store-partner-types-data', [PartnerTypeController::class, 'store'])->name('admin.partner-types.store');
    Route::post('/fetch-partner-types-data', [PartnerTypeController::class, 'FetchPartnerTypeDataById'])->name('admin.partner-types.fetch');
    Route::post('/delete-partner-types/{id}', [PartnerTypeController::class, 'destroy'])->name('admin.partner-types.destroy');

    // Partners
    Route::get('/partners', [PartnerController::class, 'index'])->name('admin.partners');
    Route::get('/load-partners-data', [PartnerController::class, 'LoadPartnerDataTable'])->name('admin.partners.loadDataTable');
    Route::get('/partners/create', [PartnerController::class, 'create'])->name('admin.partners.create');
    Route::post('/store-partners-data', [PartnerController::class, 'store'])->name('admin.partners.store');
    Route::post('/fetch-partners-data', [PartnerController::class, 'FetchPartnerDataById'])->name('admin.partners.fetch');
    Route::post('/delete-partners/{id}', [PartnerController::class, 'destroy'])->name('admin.partner-types.destroy');

});
