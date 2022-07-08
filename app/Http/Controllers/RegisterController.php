<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $body = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:20',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
    }
}
