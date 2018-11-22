<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function store()
    {
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        return redirect('/');
    }
}
