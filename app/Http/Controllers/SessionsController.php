<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attrs = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($attrs)) {
            // This is an alternate way to throw an error, but the way below is better.
            // return back()
            //     ->withInput()
            //     ->withErrors(['email' => 'Your provided credentials could not be verified.']);

            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success', 'You have successfully logged out.');
    }
}
