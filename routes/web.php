<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Book\WelcomeController;
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
Route::get('/article', [HomeController::class, 'index'])->name('article.index');
Route::get('/article/{id}', [HomeController::class, 'index'])->name('article.show');
Route::get('/article/{tag}', [HomeController::class, 'index'])->name('article.tag');


Route::get('/hello', [HelloController::class, 'index']);


//Book
//Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('first-greeting', function(){
   return Greeting::first()->body;
});

Route::resource('tasks', TaskController::class)->names('tasks');

