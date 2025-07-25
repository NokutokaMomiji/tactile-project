<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Feed extends Component
{
    protected $listeners = ['newPostAdded' => 'render'];
    public $usersIds;

    public function mount($username = null)
    {
        if (! $username) {
            $this->usersIds = auth()->user()->following->pluck('id');
            $this->usersIds->push(auth()->id());
        }
        else {
            $this->usersIds = [User::whereUsername($username)->firstOrFail()->id];
        }
    }


    public function render()
    {
        return view('livewire.feed');
    }

    public function getPostsProperty()
    {
        return Post::whereIn('user_id', $this->usersIds)
            ->latest()
            ->get();
    }

}

