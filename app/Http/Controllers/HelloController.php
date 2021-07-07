<?php


namespace App\Http\Controllers;


class HelloController extends Controller
{
    public function index()
    {
        $sparkpost = config('services.sparkpost.secret');
        $api_key_bugsnag =config('services.bugsnag.api_key');
        return $api_key_bugsnag;
    }

}
