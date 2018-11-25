<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\WelcomeMail;
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

            'email' => 'required|email|unique:users',

           'password' => 'required|confirmed'
        ]);

        $user = User::create([

            'name' => request('name'),

            'email' => request('email'),

            'password' => bcrypt(request('password'))

        ]);

        auth()->login($user);

        \Mail::to($user)->send(new WelcomeMail($user));

        session()->flash('message', 'You successfully registered');
         

        return redirect('/');
    }
}
