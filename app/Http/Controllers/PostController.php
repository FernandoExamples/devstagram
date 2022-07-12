<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

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

        return redirect()->route('profile.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        $post->load(['comments', 'comments.user']);
        return view('posts.show', compact('post', 'user'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        ImageService::deleteImage($post->image_path);
        return redirect()->route('profile.index', auth()->user()->username);
    }
}
