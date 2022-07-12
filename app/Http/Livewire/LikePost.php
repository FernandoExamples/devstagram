<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikePost extends Component
{
    public Post $post;
    public bool $isLiked;
    public int $totalLikes;

    public function mount()
    {
        $this->isLiked = $this->post->checkLike(auth()->user());
        $this->totalLikes = $this->post->likes->count();
    }

    public function toggleLike()
    {
        $this->post->likes()->toggle([Auth::id()]);
        $this->isLiked = !$this->isLiked;
        $this->totalLikes = $this->isLiked ? $this->totalLikes + 1 : $this->totalLikes - 1;
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
