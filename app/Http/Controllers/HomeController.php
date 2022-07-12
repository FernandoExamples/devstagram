<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $followers = User::find(Auth::id())->following->pluck('id');
        $posts = Post::whereIn('user_id', $followers)->with('author')->latest()->paginate(20);
        return view('index', compact('posts'));
    }
}
