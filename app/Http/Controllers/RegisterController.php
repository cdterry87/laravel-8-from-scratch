<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // return request()->all();

        $attrs = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')], // alternative way to write unique validation
            'password' => ['required', 'min:7']
        ]);

        // $attrs['password'] = bcrypt($attrs['password']); // Or you can use the `setAttribute` mutator in the model

        $user = User::create($attrs);

        Auth::login($user);

        return redirect('/')->with('success', 'Your account has been created!');
    }
}
