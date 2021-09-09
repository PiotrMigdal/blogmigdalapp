<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return  view('register.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|max:255|min:7',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        // log user in
        auth()->login($user);
        session()->regenerate();


        // To send success message you can use flash session or with()
        //session()->flash('success', 'Your account has been created');
        return redirect('/')->with('success', 'Your account has been created');
    }
}
