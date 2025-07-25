<?php

namespace App\Livewire;

use App\Models\Collection;
use Livewire\Component;
use App\Models\User;
use PHPUnit\TestRunner\TestResult\Collector;

class CollectionPage extends Component
{
    public User $user;
    public $actives = [];
    public $collectionId;
    public $collectionName;


    
    public function mount($collectionId)
    {
        $this->collection = \App\Models\Collection::find($collectionId);    
    }
    
    public function render()
    {
        return view('livewire.collection-page');
    }

    public function getPostsProperty()
    {
         return $this->collection->posts;
    }

    public function getViewCount($postId)
    {
        $filename = storage_path('app/views_counter.txt');

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
