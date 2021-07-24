<?php

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web-self.home.index');
    }

    public function test()
    {
        dd($_ENV);
        
        return __METHOD__;
    }
}
