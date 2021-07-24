<?php

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

Route::get('/', function () {
    $name = 'Andrii';
    $age = '43';
    return view('web-self.index', compact('name', 'age'));
});

Route::get('contact', function () {
    return view('web-self.contact');
})->name('w-self.contact');
Route::post('email', function (Request $request) {
    return view('web-self.email', [
        'name' => $request->get('name'),
        'age' => $request->get('age')
    ]);
})->name('w-self.email');
//Route::get('post/{id}/{slug}', static function ($id, $slug) {
//$id += 1;
//    $slug .= ' hello';
//    return 'post';
//});

Route::resource('posts', PostController::class)->names('posts');

Route::fallback(function () {
    abort(404, 'Oops! Page not found...');
});
