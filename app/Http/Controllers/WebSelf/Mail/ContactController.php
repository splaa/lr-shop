<?php

namespace App\Http\Controllers\WebSelf\Mail;

use App\Http\Controllers\Controller;
use App\Mail\WebSelf\SplxMail;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendSplx(): Factory|View|Application
    {
        Mail::to('splx@gmail.com')->send(new SplxMail());
        return view('parts._alert-send-splx');
    }
}
