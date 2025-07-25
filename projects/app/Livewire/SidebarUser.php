<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SidebarUser extends Component
{
    public User $user;
    public $showModal;
    public $relations;
    public $type;
    public $isFollowing;

    public function render()
    {
        return view('livewire.sidebar-user');
    }

    public function mount()
    {
        $this->isFollowing = !! $this->user->following()->where('follower_id', $this->user->id)->count();
    }

    public function showRelations($type = 'followers')
    {
        $this->type = $type;
        $this->relations = $this->user->$type;

        $this->showModal = true;
    }

    public function toggleFollowing()
    {
        auth()->user()->following()->toggle($this->user);
        $this->isFollowing = !$this->isFollowing;
    }
}
