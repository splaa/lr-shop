<?php

use App\Http\Controllers\WebSelf\HomeController;
use App\Http\Controllers\WebSelf\PageController;
use App\Http\Controllers\WebSelf\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [HomeController::class, 'index'])->name('web-self.home');
Route::get('/page/about', [PageController::class, 'about'])->name('web-self.page.about');


Route::resource('posts', PostController::class)->names('web-self.posts');

Route::fallback(function () {
    abort(404, 'Oops! Page not found...');
});
