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
}
