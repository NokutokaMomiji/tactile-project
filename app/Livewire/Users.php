<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Users extends Component
{
	use WithPagination;
	
	public $estat = 2;
	public $s = '';
	public $pag;

    public $user = null;

	
	public function mount($id = null)
	{
		if (! auth()->user()->is_admin)
		abort(403);
		
		$this->pag = session('pag', 50);

		if ($id) {
			$this->user = User::findOrFail($id);
		}
	}
	
	public function render()
	{

		if ($this->user) {
			return view('livewire.user-info', ['user' => $this->user]);
		}


		session(['pag' => $this->pag]);
		
		return view('livewire.users',[
			'users' => $this->getFilteredUsers(),
		]);
	}
	
	
	public function getFilteredUsers()
	{
		$users = User::where(function($query) {
			$query->where('name', 'like', $this->s . '%')
				->orWhere('surnames', 'like', $this->s . '%')
				->orWhereRaw("CONCAT(name, ' ', surnames) like ?", [$this->s . '%'])
				->orWhere('email', 'like', '%' . $this->s . '%');
		});
		if ($this->estat == 2){
			$users = $users->orderBy('created_at', 'desc');
		}
		else if ($this->estat == 0){
			$users = $users->where('is_admin', '1')->orderBy('created_at', 'desc');
		}else if ($this->estat == 1){
			$users = $users->where('is_banned', '1')->orderBy('created_at', 'desc');
		}
		
		return $users->paginate($this->pag);
	}
	
	public function updateAdminStatus($userId, $isAdmin)
	{
		$user = User::find($userId);
		$user->is_admin = $isAdmin;
		$user->save();
	}
	
	public function updateBanStatus($userId, $isBanned)
	{
		$user = User::find($userId);
		$user->is_banned = $isBanned;
		$user->save();
	}
	
	public function userId($userId){
		$user = User::find($userId);

		return view('livewire.user-info', compact($user));


	}
}
