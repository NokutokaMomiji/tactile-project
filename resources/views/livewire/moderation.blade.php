<div class="container mx-auto p-4">
	<div class="flex items-center justify-between mb-4">
		<div>
			<h1 class="text-2xl font-bold">{{ __('Llista de Posts') }}</h1>
			<div class="flex items-center">
				
				
				
			</div>
		</div>
		
		<div class="mt-4 sm:ml-16 sm:mt-0 flex space-x-4">
			<div>
				<label>Per pàgina</label>
			<select wire:model.live="pag">
				<option>10</option>
				<option>25</option>
				<option>50</option>
			</select>
			</div>
			<div>
				<label>Estat</label>
			<select wire:model.live='estat'>
				<option value="0">Per validar</option>
				<option value="1">Acceptats</option>
				<option value="2">Denegats</option>
				<option value="3">Tots</option>
				
			</select>
			</div>
			
		</div>
	</div>
	<div class="space-y-4">
		@foreach($posts as $post)
			<div class="p-4 bg-white rounded shadow flex items-center justify-between">
				<div class="">
					<a href="{{ route('post.show', [$post]) }}" class="flex items-center space-x-4">
						<img src='{{ \Storage::url($post->featured_image_path) }}' class="size-16 object-cover rounded">
						<div>
							<h2 class="text-lg font-semibold">{{ $post->title }}</h2>
							<p class="text-gray-600">{{ __('Autor:') }} {{ $post->user->name }} {{ $post->user->surnames}}</p>
						</div>
					</a>
				</div>
				
				<div>
					<!-- Campo para cambiar el orden con botón de confirmación -->
					<div class="mb-2">
						<label for="order-{{ $post->id }}" class="block text-sm text-gray-600">{{ __('Orden') }}</label>
						<input
							id="order-{{ $post->id }}"
							type="number"
							class="w-16 p-1 border rounded"
							value="{{ $post->orden }}"
							wire:change="updateOrder({{ $post->id }}, $event.target.value)"
						>
				                <button
				                	type="button"
				                        class="ml-2 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600"
				                        wire:click="confirmOrder({{ $post->id }})"
				                >
				                	{{ __('Guardar') }}
				                </button>
				        </div>

				                    <!-- Mensaje de error si hay conflicto -->
				                    @if (isset($errors[$post->id]))
				                        <p class="text-red-500 text-sm mt-1">{{ $errors[$post->id] }}</p>
				                    @endif

                    <!-- Botones de estado -->
					<div class="flex items-center justify-between">
						@if($post->is_restricted == 2)
							<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setCorrect({{$post->id}})">
								<x-icons.correct />	
							</button>
							<button type="button" class="text-red-500" wire:click="setDefault({{$post->id}})">
								<x-icons.incorrect />	
							</button>
						@elseif($post->is_restricted == 1)
							<button type="button" class="text-green-500" wire:click="setDefault({{$post->id}})">
								<x-icons.correct />	
								</button>
								<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setIncorrect({{$post->id}})">
								<x-icons.incorrect />	
							</button>
						@else
							<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setCorrect({{$post->id}})">
								<x-icons.correct />	
							</button>
							<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setIncorrect({{$post->id}})">
								<x-icons.incorrect />	
							</button>
						@endif					
					</div>
					<button type="button" wire:click="admedit('{{$post->user->username}}',{{$post->id}})">
						{{ __('Modificar') }}
					</button>
				</div>
			</div>
		@endforeach

	</div>
	<div class="mt-4">
		{{ $posts->links() }}
	</div>
</div>