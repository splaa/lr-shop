<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {

        return response('Hello, World!')->withCookie('Time Button', 1, 1);
    }
}
