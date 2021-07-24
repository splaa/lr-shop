<?php

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
    }

    public function test()
    {
        dd($_ENV);

        return __METHOD__;
    }
}
