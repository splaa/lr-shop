<?php

use App\Http\Controllers\WebSelf\Admin\MainController;
use App\Http\Controllers\WebSelf\HomeController;
use App\Http\Controllers\WebSelf\Mail\ContactController;
use App\Http\Controllers\WebSelf\PageController;
use App\Http\Controllers\WebSelf\PostController;
use App\Http\Controllers\WebSelf\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('web-self.home');

Route::group(['prefix' => 'admin', 'namespace' => 'WebSelf/Admin'], function (){
    Route::get('/', [MainController::class, 'index']);
});




Route::get('/page/about', [PageController::class, 'about'])->name('web-self.page.about');


Route::resource('posts', PostController::class)->names('web-self.posts');

Route::get('send', [ContactController::class, 'sendSplx']);


Route::get('registry', [UserController::class, 'registry'])->name('web-self.user.registry.create');
Route::post('registry', [UserController::class, 'store'])->name('web-self.user.registry.store');






Route::fallback(function () {
    abort(404, 'Oops! Page not found...');
});
