<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public $user;
    public $showUsers;

    public function render()
    {
        $this->getUsers();
        return view('livewire.user-list');
    }

    public function getUsers()
    {
        $explodedURL = explode('/', url()->current());
        $this->user = User::where('username', $explodedURL[3])->first();
        if ($explodedURL[4] == 'followers') {
            $this->showUsers = $this->user->followers;
        } else {
            $this->showUsers = $this->user->following;
        }
    }
}
