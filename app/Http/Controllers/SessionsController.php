<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        // assign attributes from form
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // try log in, if doesnt work, return notification
        if(auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }
        // regenerate the session to avoid 'session fixation'
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');
        // or
        // return back()
        // ->withInput()
        // ->withErrors(['email' => 'Your provided credentials could not be verified']);
    }

    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
