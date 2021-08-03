<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Book\InvitationController;
use App\Http\Controllers\Book\TasksController;
use App\Http\Controllers\Book\UpdateUserAvatar;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\DynamicWeb\StartController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Services\AnalyticsService;
use App\Models\Book\Conference;
use App\Models\Book\Post;
use App\Models\Greeting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/tag/{tag}', [ArticleController::class, 'allByTag'])->name('article.tag');


Route::get('/hello', [HelloController::class, 'index']);


Route::get('first-greeting', function () {
    return Greeting::first()->body;
});

Route::resource('tasks', TasksController::class)->names('tasks');

Route::get('invitations/{invitation}/{answer}', [InvitationController::class])
    ->name('invitation')
    ->middleware('signed')
;
Route::get('users/{user}/update-avatar', UpdateUserAvatar::class);
Route::get('/conference/{conference}', function (Conference $conference) {
    return view('welcome')->with('conference', $conference);
});

Route::get('/cookie/set', [CookieController::class, 'setCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);

//Book Dynamic Web site
Route::any('start-php', [StartController::class, 'index']);


Route::get('art', function () {

    $post = Post::recent();
    return view('welcome')->with('post', $post);
});

Route::get('backend/sales', function (AnalyticsService $analytics){
    return view('book.backend.sales-graphs')
        ->with('analytics', $analytics);
});

Auth::routes();

//
//Route::get('/forgot-password', function () {
//    return view('auth.forgot-password');
//})->middleware('guest')->name('password.request');
//
//
//Route::get('/email/verify',function(){
//    return view('email.verification-notice');
//})->middleware('auth')->name('verification.notice');
//
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//    return redirect('/home');
//})->middleware(['auth', 'signed'])->name('verification.verify');
//
//Route::post('/email/verification-notification', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//    return back()->with('message', 'Verification link sent!');
//})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

//Password ResetRoutes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset.submit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
