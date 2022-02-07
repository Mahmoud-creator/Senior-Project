<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($attributes)) {
            return redirect('/')->with('success', 'Welcome Back!');
        }
        return redirect('/login')->with('fail', 'Could not Be verified!');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
