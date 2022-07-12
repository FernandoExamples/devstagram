<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('profile.index', ['user' => auth()->user()->username]);
        }
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Credenciales Incorrectas');
        }

        return redirect()->route('profile.index', ['user' => auth()->user()->username]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
