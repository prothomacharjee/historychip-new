<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PartnerTypeController;
use App\Http\Controllers\NoticePromptController;
use App\Http\Controllers\StoryCategoryController;
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

//Artisan Routes
// Route::get('key-generate', function () {
//     Artisan::call('key:generate');
//     return "key generated";
// });

// Route::get('clear-config', function () {
//     Artisan::call('config:clear');
//     return "cofig cleared";

// });

// Route::get('cache-config', function () {
//     Artisan::call('config:cache');
//     return "cache setting updated";
// });

Auth::routes(['verify' => true]);

// User Authentications
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit')->middleware('guest');
Route::get('/register', [UserAuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.submit')->middleware('guest');
Route::get('/password/reset-request', [UserAuthController::class, 'showResetPasswordForm'])->name('password.reset-request')->middleware('guest');

Route::get('/quick-register', [UserAuthController::class, 'showQuickRegisterForm'])->name('quick-register')->middleware('guest');
Route::post('/quick-register', [UserAuthController::class, 'quickRegister'])->name('quick-register.submit')->middleware('guest');
Route::get('/quick-register-verification', [UserAuthController::class, 'showQuickRegisterOTPForm'])->name('quick-register.verify')->middleware('guest');
Route::post('/quick-register-verification', [UserAuthController::class, 'quickRegisterSubmit'])->name('quick-register.verify.submit')->middleware('guest');

//User Profile
Route::get('/profile', [SiteController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/profile/about', [SiteController::class, 'profile_about_save'])->name('profile.about.save')->middleware('auth');
Route::post('/profile/visibility', [SiteController::class, 'profile_visibility_save'])->name('profile.visibility.save')->middleware('auth');
Route::get('/my-stories', [SiteController::class, 'my_stories'])->name('my-stories')->middleware('auth');

//Sites
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/founder', [SiteController::class, 'founder'])->name('founder');
Route::get('/who-is-historychip-for', [SiteController::class, 'historychipfor'])->name('historychipfor');
Route::get('/frequently-asked-questions', [SiteController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [SiteController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/terms-and-conditions', [SiteController::class, 'termsandconditions'])->name('termsandconditions');
Route::get('/contact-us', [SiteController::class, 'contactus'])->name('contactus');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contactus.submit');
Route::get('/writing-prompts', [SiteController::class, 'writingprompt'])->name('writingprompt');
Route::get('/blogs/{slug?}', [SiteController::class, 'blogs'])->name('blogs');
Route::get('/partners/{slug?}', [SiteController::class, 'partners'])->name('partners');
Route::get('/stories/{slug?}', [SiteController::class, 'read_story'])->name('story.read');
Route::get('/authors/{slug?}', [SiteController::class, 'author_stories'])->name('author-stories');

Route::get('/write-story/{slug?}', [SiteController::class, 'write_story'])->name('story.write')->middleware('auth');


Route::post('/save-image', [SiteController::class, 'saveimage'])->name('story.saveimage')->middleware('auth');
Route::post('/delete-image', [SiteController::class, 'deleteimage'])->name('story.deleteimage')->middleware('auth');
Route::post('/save-audio', [SiteController::class, 'saveaudio'])->name('story.saveaudio')->middleware('auth');
Route::post('/delete-audio', [SiteController::class, 'deleteaudio'])->name('story.deleteaudio')->middleware('auth');
Route::post('/search/basic', [SiteController::class, 'searchBasic'])->name('story.searchbasic')->middleware('auth');

Route::post('/subcat-by-parentcat', [SiteController::class, 'FetchSubCatByParentCategory'])->name('story.subCatByParentCategory');

Route::post('/getwritingprompts', [WritingPromptController::class, 'getwritingprompts'])->name('writing-prompts.get');

Route::post('/story/create', [StoryController::class, 'store'])->name('story.create')->middleware('auth');
Route::post('/story/comment', [StoryController::class, 'save_comment'])->name('story.comment')->middleware('auth');
Route::get('/story/delete/{slug?}', [StoryController::class, 'destroy'])->name('story.delete')->middleware('auth');

// Redirection Url
Route::redirect('/blogdetail/{id}/{slug}', '/blogs/{slug}', 301);
Route::redirect('/blog', '/blogs', 301);
Route::redirect('/partner', '/partners', 301);
Route::redirect('/writing-prompt', '/writing-prompts', 301);
Route::redirect('/writingprompt', '/writing-prompts', 301);


// ADMIN PANEL

Route::get('powerhouse', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('powerhouse/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
Route::group(['prefix' => 'powerhouse', 'middleware' => 'admin'], function () {

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    //Dashboard
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
    Route::get('/blogs/feature/{id}/{status}', [BlogController::class, 'ChangeBlogFeatureStatus'])->name('admin.blogs.feature');
    Route::get('/load-regular-blogs-data', [BlogController::class, 'LoadRegularBlogDataTable'])->name('admin.blogs.LoadRegularBlogDataTable');
    Route::get('/load-featured-blogs-data', [BlogController::class, 'LoadFeaturedBlogDataTable'])->name('admin.blogs.LoadFeaturedBlogDataTable');
    Route::get('/load-drafted-blogs-data', [BlogController::class, 'LoadDraftedBlogDataTable'])->name('admin.blogs.LoadDraftedBlogDataTable');
    Route::post('/store-blogs-data', [BlogController::class, 'store'])->name('admin.blogs.store');
    // Route::post('/fetch-writing-prompts-data', [BlogController::class, 'FetchWritingPromptDataById'])->name('writing-prompts.fetch');
    Route::post('/delete-blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

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
    Route::get('/partners/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partners.edit');
    Route::post('/store-partners-data', [PartnerController::class, 'store'])->name('admin.partners.store');
    Route::post('/fetch-partners-data', [PartnerController::class, 'FetchPartnerDataById'])->name('admin.partners.fetch');
    Route::post('/delete-partners/{id}', [PartnerController::class, 'destroy'])->name('admin.partners.destroy');

    // Story Category
    Route::get('/story-categories', [StoryCategoryController::class, 'index'])->name('admin.story-categories');
    Route::get('/load-story-categories-data', [StoryCategoryController::class, 'LoadStoryCategoryDataTable'])->name('admin.story-categories.loadDataTable');
    Route::get('/load-story-level-1-categories-data', [StoryCategoryController::class, 'LoadStoryLevel1CategoryDataTable'])->name('admin.story-categories.loadDataTable1');
    Route::get('/load-story-level-2-categories-data', [StoryCategoryController::class, 'LoadStoryLevel2CategoryDataTable'])->name('admin.story-categories.loadDataTable2');
    Route::get('/load-story-level-3-categories-data', [StoryCategoryController::class, 'LoadStoryLevel3CategoryDataTable'])->name('admin.story-categories.loadDataTable3');
    Route::post('/store-story-categories-data', [StoryCategoryController::class, 'store'])->name('admin.story-categories.store');
    Route::post('/fetch-story-categories-data', [StoryCategoryController::class, 'FetchStoryCategoryDataById'])->name('admin.story-categories.fetch');
    Route::post('/fetch-story-categories-data-by-level', [StoryCategoryController::class, 'FetchStoryCategoryDataByLevel'])->name('admin.story-categories.fetchByLevel');

    Route::post('/delete-story-categories/{id}', [StoryCategoryController::class, 'destroy'])->name('admin.story-categories.destroy');



    //Stories

    Route::get('/stories', [StoryController::class, 'index'])->name('admin.stories');
    Route::get('/story-comments', [StoryController::class, 'comments'])->name('admin.stories.comments');

    Route::get('/load-approved-stories-data', [StoryController::class, 'LoadApproveStoryDataTable'])->name('admin.stories.LoadApproveStoryDataTable');
    Route::get('/load-featured-stories-data', [StoryController::class, 'LoadFeaturedStoryDataTable'])->name('admin.stories.LoadFeaturedStoryDataTable');
    Route::get('/load-waiting-stories-data', [StoryController::class, 'LoadWaitingStoryDataTable'])->name('admin.stories.LoadWaitingStoryDataTable');
    Route::get('/load-rejected-stories-data', [StoryController::class, 'LoadRejectedStoryDataTable'])->name('admin.stories.LoadRejectedStoryDataTable');
    Route::get('/load-drafted-stories-data', [StoryController::class, 'LoadDraftedStoryDataTable'])->name('admin.stories.LoadDraftedStoryDataTable');

    Route::get('/load-approved-comments-data', [StoryController::class, 'LoadApproveCommentDataTable'])->name('admin.stories.LoadApproveCommentDataTable');
    Route::get('/load-waiting-comments-data', [StoryController::class, 'LoadWaitingCommentDataTable'])->name('admin.stories.LoadWaitingCommentDataTable');
    Route::get('/load-rejected-comments-data', [StoryController::class, 'LoadRejectedCommentDataTable'])->name('admin.stories.LoadRejectedCommentDataTable');

    Route::get('/stories/edit/{id}', [StoryController::class, 'edit'])->name('admin.stories.edit');
    Route::post('/delete-stories/{id}', [StoryController::class, 'destroy'])->name('admin.stories.destroy');

    Route::get('/stories/staus/{id}/{type}/{status}', [StoryController::class, 'ChangeStoryStatus'])->name('admin.stories.status');
});
