<?php

use App\Http\Controllers\Book\InvitationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Book\UpdateUserAvatar;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\DynamicWeb\StartController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Book\TasksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Book\WelcomeController;
use App\Models\Book\Conference;
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


//Book
//Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('first-greeting', function(){
   return Greeting::first()->body;
});

Route::resource('tasks', TasksController::class)->names('tasks');

Route::get('invitations/{invitation}/{answer}', [InvitationController::class])
    ->name('invitation')
    ->middleware('signed')
;
Route::get('users/{user}/update-avatar', UpdateUserAvatar::class);
Route::get('/conference/{conference}', function (Conference $conference){
    return view('welcome')->with('conference', $conference);
});

Route::get('/cookie/set', [CookieController::class, 'setCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);

//Book Dynamic Web site
Route::any('start-php', [StartController::class, 'index']);
