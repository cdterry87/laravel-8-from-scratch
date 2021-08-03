<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success', 'You have successfully logged out.');
    }
}
