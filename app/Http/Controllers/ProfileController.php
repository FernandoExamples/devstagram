<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->paginate(6);
        return view('profile.show', compact('user', 'posts'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->request->add(['username' =>  Str::slug($request->username)]);

        $body = $request->validate([
            'username' => ['required', 'min:3', 'max:20', "unique:users,username," . Auth::id(), 'not_in:twitter,edit-profile'],
        ]);

        $user = User::find(Auth::id());

        $user->update($body);

        return redirect()->back()->with('message', "Perfil Actualizado");
    }
}
