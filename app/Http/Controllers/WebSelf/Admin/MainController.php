<?php


namespace App\Http\Controllers\WebSelf\Admin;


use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('web-self.admin.index');
}
}
