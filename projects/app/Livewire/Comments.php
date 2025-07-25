<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public Post $post;
    public $body;
    public $message;
    public $comments;

    protected $rules = [
        'comment.body' => 'required|string'
    ];

    public function render()
    {
        $this->comments = $this->post->comments()->with('user')->get();

        return view('livewire.comments');
    }

    public function publish()
    {
        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $this->post->id,
            'body' => $this->body
        ])->save();

        $this->body = '';
        
        // return redirect()->route('post.show', ['user'=>$this->post->user,'post'=>$this->post]);
    }
}
