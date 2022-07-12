<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        if ($request->file('image')) {
            ImageService::deleteImage($user->image_path);
            $imagePath = ImageService::storeImage($request->file('image'), 'users');
            $body['image_path'] = $imagePath;
        }

        $user->update($body);

        return redirect()->back()->with('message', "Perfil Actualizado");
    }
}
