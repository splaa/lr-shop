<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        //todo: Prefixes paths page:61
        return __FILE__;
    }
}
