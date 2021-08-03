<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'username' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:7']
        ]);

        // $attrs['password'] = bcrypt($attrs['password']); // Or you can use the `setAttribute` mutator in the model

        User::create($attrs);

        return redirect('/');
    }
}
