<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostEdit extends Component
{
    public Post $post;

    protected $rules = [
        'post.title' => 'required|string|min:5',
        'post.body' => 'required|string|min:5'
    ];

    public function render()
    {
        return view('livewire.post-edit');
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        // $this->tags = $this->post->tags->pluck('id')->toArray();
        // $this->checkZones();
        // $this->document->post_id = $this->post->id;
    }

    public function save()
    {
        $this->post->user_id = Auth::id();
        //dd($this->post);
        $this->post->save();
        //$this->post->tags()->sync($this->tags);

        return redirect()->route('post-edit', [$this->post]);
    }
    
}
