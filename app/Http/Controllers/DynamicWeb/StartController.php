<?php

namespace App\Http\Controllers\DynamicWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        return view('dynamic-web.index');
    }
}
