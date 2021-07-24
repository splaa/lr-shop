<?php

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web-self.home.index');
use App\Models\WebSelf\City;
use App\Models\WebSelf\Country;
use App\Models\WebSelf\Post;
use App\Models\WebSelf\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $title = 'Home Page';

        Log::channel('i_love_this_logging_thing')->info("Action log debug test", ['my-string' => 'log me', "run"]);
        return view('web-self.home.index', ['title' => $title]);
    }

    public function test()
    {
        dd($_ENV);


        return __METHOD__;
    }
}
