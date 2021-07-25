<?php

namespace App\Http\Controllers\WebSelf;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebSelf\UserRegistryRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registry()
    {
       return view('web-self.users.create');
   }
    public function store(UserRegistryRequest $request)
    {
        $user = User::create([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
            'avatar' => $request->getAvatar()
        ]);
        session()->flash('success', 'Successful registration!');

        Auth::login($user);

        return redirect(route('web-self.home'));
   }

}
