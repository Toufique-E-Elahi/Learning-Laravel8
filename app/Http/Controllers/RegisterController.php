<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $validated= \request()->validate([
            'name'=> 'required|max:255|min:3',
            'email'=> 'required|email|min:3|max:255| unique:users,email',
            'password'=> 'required|max:100|min:6',
        ]);

        $user= User::create($validated);
        auth()->login($user);
        return redirect('/posts')->with('success', 'Your account has been created');
    }
}
