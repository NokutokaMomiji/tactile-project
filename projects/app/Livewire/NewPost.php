<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewPost extends Component
{
    public $newPostBody;
    public $parentPostId;

    public function mount($parentId = null)
    {
        $this->parentPostId = $parentId;
    }

    public function render()
    {
        return view('livewire.new-post');
    }

    public function createPost()
    {
        if ($this->newPostBody){
            Post::create([
                'user_id' => Auth::user()->id,
                'body' => $this->newPostBody,
                'parent_id' => $this->parentPostId,
            ]);

            $this->newPostBody = null;

            $this->dispatch('newPostAdded', $this->parentPostId);
        }
    }
}
