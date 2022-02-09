<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function createOwner()
    {
        return view('sessions.owner-create');
    }



    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');

    }

    public function storeOwner()
    {
        $attributes = request()->validate([
            'email' => 'required|email|exists:owners,email',
            'password' => 'required'
        ]);

        if (!auth('owner')->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();
        return redirect('/owners:'.auth('owner')->user()->id.'/dashboard')->with('success','Welcome back!');

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Goodbye!');
    }

    public function destroyOwner()
    {
        auth('owner')->logout();
        return redirect('/login-owner')->with('success', 'Goodbye!');
    }
}
