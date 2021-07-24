<?php

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    public function index()
    {

        DB::beginTransaction();
        try {
            $query = DB::insert(
                'INSERT INTO posts (title, content, created_at)
                                    VALUES (:title, :content, :createdAt)',
                ['title' => 'Article 5', 'content' => 'content post5', 'createdAt' => now()]
            );

            DB::update(
                'UPDATE posts SET updated_at = :now
                    WHERE updated_at IS NULL ',
                ['now' => now()]
            );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
        }


        return DB::select("select posts.* from posts where id > :id", ['id' => 2]);
        return view('web-self.home.index');


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
