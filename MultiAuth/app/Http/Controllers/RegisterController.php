<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }

}
