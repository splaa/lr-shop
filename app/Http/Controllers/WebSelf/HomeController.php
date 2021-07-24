<?php

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use App\Models\WebSelf\City;
use App\Models\WebSelf\Country;
use App\Models\WebSelf\Post;
use App\Models\WebSelf\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::find(2);
        /** @var Rubric $rubric */
        $rubric = $post->rubric;
        dd($rubric->title);
        return view('web-self.home.index');
    }

    public function test()
    {
        dd($_ENV);

        return __METHOD__;
    }
}
