<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class Moderation extends Component
{
	use WithPagination;
	public $estat = 0;
	public $pag;
	public $orders = [];
    public $errors = [];

	public function mount()
	{
		if (!auth()->user()->is_admin) {
			abort(403);
		}

		$this->pag = session('pag', 25);
		$this->loadOrders();
	}

	public function loadOrders()
    {
        $this->orders = Post::pluck('orden', 'id')->toArray();
    }

	public function render()
	{
		session(['pag' => $this->pag]);

		return view('livewire.moderation', [
			'posts' => $this->getFilteredPosts(),
		]);
	}

	public function confirmOrder($postId)
	{
		$newOrder = $this->orders[$postId];
	
		Post::whereId($postId)->update(['orden' => $newOrder]);
	
		// Limpiar errores anteriores
		unset($this->errors[$postId]);
	
		// Mensaje de confirmación
		session()->flash('message', __('Ordre actualitzat correctament.'));
	}
	

	public function admedit($username, $postId)
	{
		return redirect()->route('project.edit', ['user' => $username, 'post' => $postId]);
	}

	public function getFilteredPosts()
    {
        if ($this->estat == 3) {
            return Post::orderBy('created_at', 'desc')->paginate($this->pag);
        } elseif ($this->estat == 0) {
            return Post::whereNull('is_restricted')->orderBy('created_at', 'desc')->paginate($this->pag);
        } else {
            return Post::where('is_restricted', $this->estat)->orderBy('created_at', 'desc')->paginate($this->pag);
        }
    }

	public function setCorrect($postId)
	{
		Post::whereId($postId)->update(['is_restricted' => 1]);
	}

	public function setIncorrect($postId)
	{
		Post::whereId($postId)->update(['is_restricted' => 2]);
	}

	public function setDefault($postId)
	{
		Post::whereId($postId)->update(['is_restricted' => 0]);
	}

	public function updateOrder($postId, $newOrder)
	{
		$validated = Validator::make(['orden' => $newOrder], [
			'orden' => 'nullable|integer|min:0',
		])->validate();

		Post::whereId($postId)->update(['orden' => $validated['orden']]);
	}

}