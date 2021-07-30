<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
=======
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
>>>>>>> 9031d8c (Controllers)

class HomeController extends Controller
{
<<<<<<< HEAD
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
=======
    public function index(): Factory|View|Application
>>>>>>> 9031d8c (Controllers)
    {
        return view('home');
    }
}
