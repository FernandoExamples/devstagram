<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function toggleFollow(User $user)
    {
        $user->followers()->toggle(auth()->user()->id);
        return redirect()->back();
    }
}
