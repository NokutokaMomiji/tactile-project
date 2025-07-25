<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class SearchForm extends Component
{
    public $s;
    public $showDropdown = false;
    public $users = [];
    public $projects = [];

    public function render()
    {
        if ($this->s ) {
            $this->showDropdown = true;
            $this->users = User::where('name', 'like', '%' . $this->s . '%')->take(5)->get();
            $this->projects = Post::where('title', 'like', '%' . $this->s . '%')->take(5)->where('is_restricted', '<>', 2)->get();
        } else {
            $this->showDropdown = false;
        }

        return view('livewire.search-form');
    }
    
    public function updatedShowDropdown($value)
    {
        if (! $value)
            $this->s = '';
    }
}
