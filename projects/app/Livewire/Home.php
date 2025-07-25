<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    
    #[\Livewire\Attributes\Url]
    public $filter = '';
    public $category;


    public function mount()
    {
        if ($this->filter)
            $this->category = \App\Models\PostCategory::whereSlug($this->filter)->firstOrFail();
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->filter, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('post_category_id', $this->category->id);
                });
            })
            ->where('is_restricted', 1)
            ->orderByRaw('orden IS NULL, orden ASC') // Asegura que los NULL vayan al final
            ->orderBy('created_at', 'desc') // Orden secundario por fecha
            ->paginate(24);

        return view('livewire.home', compact('posts'));
    }

    public function getViewCount($postId)
    {
        $filename = storage_path('app/' . 'views_counter.txt');

        if (!file_exists($filename)) {
            return 0;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($id, $counter) = explode(':', $line);
            if ($id == $postId) {
                return (int)$counter;
            }
        }

        return 0;
    }


}
