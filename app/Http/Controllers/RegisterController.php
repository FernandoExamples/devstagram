<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' =>  Str::slug($request->username)]);

        $body = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:20|unique:users,username',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $body['password'] = Hash::make($body['password']);

        User::create($body);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('posts.index', ['user' => auth()->user()->username]);
    }
}
