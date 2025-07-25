<style>
    .usuario:hover {
        background-color: rgb(203, 203, 203);
    }
	.usuario {
        transition: background-color 0.3s ease;
    }
</style>
<div class="container mx-auto p-4">
	<div class="flex items-center justify-between mb-4">
		<div>
			<h1 class="text-2xl font-bold">{{ __("Llista d'Usuaris") }}</h1>
			
		</div>
		
		<div class="flex justify-between gap-4">
			<div>
			
			<select wire:model.live="pag">
				<option>10</option>
				<option>25</option>
				<option>50</option>
			</select>
			</div>
			<div ">
				<select wire:model.live='estat'>
					<option value="0">Administradors</option>
					<option value="1">Banejats</option>
					<option value="2">Tots</option>
				</select>
			</div>
			<div>
				<input type="text" placeholder="Buscar..." wire:model.live="s">
			</div>
		</div>
		
	</div>
	<div class="space-y-4">
		@foreach($users as $user)
		<a href="{{ Route('users.show', $user->id)}}" class="block" >
			<div class="p-4 bg-white rounded shadow flex items-center justify-between usuario">
				<div class="">
					<div>
						<h2 class="text-lg font-semibold">{{ $user->name }} {{ $user->surnames }}</h2>
						<p class="text-gray-600">{{ __("Nom d'usuari:")}} {{ $user->username }}</p>
						<p class="text-gray-600">{{ __('Email:') }} {{ $user->email }}</p>
						<p class="text-gray-600">{{ __('Fecha de creacion:') }} {{ $user->created_at }}</p>
					</div>
				</div>
			</a>
				<div class="flex items-center space-x-4">				
					<div>
						<p class="text-gray-600 text-sm">{{ __('Admin:') }}</p>
						<select wire:change="updateAdminStatus({{ $user->id }}, $event.target.value)">
							<option value="0" @if(!$user->is_admin) selected @endif>No</option>
							<option value="1" @if($user->is_admin) selected @endif>Si</option>
						</select>
					</div>
							
					<div>
						<p class="text-gray-600 text-sm">{{ __('Banned:') }}</p>
						<select wire:change="updateBanStatus({{ $user->id }}, $event.target.value)">
							<option value="0" @if(!$user->is_banned) selected @endif>No</option>
							<option value="1" @if($user->is_banned) selected @endif>Si</option>
						</select>	
					</div>
				</div>
			</div>
		
		@endforeach
	</div>
	<div class="mt-4">
		{{ $users->links() }}
	</div>
	
</div>