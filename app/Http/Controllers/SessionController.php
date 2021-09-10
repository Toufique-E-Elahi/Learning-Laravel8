<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //

    public function store()
    {
        $attributes=\request()->validate([
           'email' => 'required|email',
           'password' => 'required',
        ]);

        if(auth()->attempt($attributes))
        {
            session()->regenerate(); // to protect from sessioin fixation
            return redirect('/posts')->with('success', 'Welcome Back!');
        }

        throw \Illuminate\Validation\ValidationException::withMessages(['email'=> 'Your credentials are wrong!']);
        //the above line and below line are identical
//        return back()->withInput()->withErrors(['email'=> 'Your credentials are wrong!']);

    }

    public function create()
    {
        return view('sessions.create');
    }
    public  function destroy()
    {
//        dd('Hello');
        auth()->logout();
        return redirect('/posts')->with('success', 'Logged Out Successfully !');
    }
}
