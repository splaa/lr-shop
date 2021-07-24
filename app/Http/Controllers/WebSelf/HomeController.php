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
        $query = DB::table('country')
            ->select('Code', 'Name')
            ->limit(5)
            ->orderByDesc('Name')
            ->get()
        ;
        dd($query);
        return $query;
        return view('web-self.home.index');
    }

    public function test()
    {
        dd($_ENV);

        return __METHOD__;
    }
}
