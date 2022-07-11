<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(User $user)
    {
        return view('posts.profile', compact('user'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $body = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_path' => 'required',
        ]);

        User::find(Auth::id())->posts()->create($body);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
