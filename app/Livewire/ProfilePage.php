<?php

namespace App\Livewire;

use App\Models\Collection;
use Livewire\Component;
use App\Models\User;
use PHPUnit\TestRunner\TestResult\Collector;
use GuzzleHttp\Client;

class ProfilePage extends Component
{
    public User $user;
    public $actives = [];
    public $collectionId;
    public $collectionName;
    
    #[\Livewire\Attributes\Url]
    public $filter;
    public $category;
    
    public function mount($user, $collectionId = null)
    {
        $this->user = $user;
        if ($this->filter)
            $this->category = \App\Models\PostCategory::whereSlug($this->filter)->firstOrFail();
    }


    public function render()
    {
        return view('livewire.profile-page');
    }

    public function getPostsProperty()
    {
        if ($this->collectionId) {
            return [];
            return $this->user->posts()->where('collection_id', $this->collectionId)->latest()->get();
        }
        
        if (auth()->check() && auth()->id() == $this->user->id){
            return $this->user->posts()
                ->when($this->filter, function($query) {
                    $query->whereHas('categories', function ($query) {
                        $query->where('post_category_id', $this->category->id);
                    });
                
            })
            ->latest()
            ->get();
        }else{
            return $this->user->posts()
                ->when($this->filter, function($query) {
                    $query->whereHas('categories', function ($query) {
                        $query->where('post_category_id', $this->category->id);
                    });
                
            })
            ->where('privacy',0)
            ->latest()
            ->get();
        }
    }

    public function deleteCollection($id)
    {
        Collection::where('id', $id)->first()->delete();
    }

    public function addCollection()
    {
        Collection::create([
            'user_id' => $this->user->id,
            'name' => $this->collectionName
        ]);

        $this->collectionName = '';
    }

    public function getViewCount($postId)
    {
        $filename = storage_path('app/' . 'views_counter.txt');

        if (!file_exists($filename)) {
            return 0;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($postIdFromFile, $counter) = explode(':', $line);
            if ($postIdFromFile == $postId) {
                return (int)$counter;
            }
        }

        return 0;
    }
}    