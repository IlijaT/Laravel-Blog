<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registrations.create');
    }

    public function store()
    {
        $this->validate(request(), [

            'name' => 'required',

            'email' => 'required|email',

           'password' => 'required|confirmed'
        ]);

        $user = User::create([

            'name' => request('name'),

            'email' => request('email'),

            'password' => bcrypt(request('password'))

        ]);

        auth()->login($user);

        return redirect('/');
    }
}
