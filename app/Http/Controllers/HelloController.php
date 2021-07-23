<?php

namespace App\Http\Controllers;

class HelloController extends Controller
{
    public function index()
    {
        return config('services.bugsnag.api_key');
    }
}
