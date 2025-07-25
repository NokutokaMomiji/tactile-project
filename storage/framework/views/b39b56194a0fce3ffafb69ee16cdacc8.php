<div class="container mx-auto p-4">
	<div class="flex items-center justify-between mb-4">
		<div>
			<h1 class="text-2xl font-bold"><?php echo e(__('Llista de Posts')); ?></h1>
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
		<!--[if BLOCK]><![endif]--><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="p-4 bg-white rounded shadow flex items-center justify-between">
				<div class="">
					<a href="<?php echo e(route('post.show', [$post])); ?>" class="flex items-center space-x-4">
						<img src='<?php echo e(\Storage::url($post->featured_image_path)); ?>' class="size-16 object-cover rounded">
						<div>
							<h2 class="text-lg font-semibold"><?php echo e($post->title); ?></h2>
							<p class="text-gray-600"><?php echo e(__('Autor:')); ?> <?php echo e($post->user->name); ?> <?php echo e($post->user->surnames); ?></p>
						</div>
					</a>
				</div>
				
				<div>
					<!-- Campo para cambiar el orden con botón de confirmación -->
					<div class="mb-2">
						<label for="order-<?php echo e($post->id); ?>" class="block text-sm text-gray-600"><?php echo e(__('Orden')); ?></label>
						<input
							id="order-<?php echo e($post->id); ?>"
							type="number"
							class="w-16 p-1 border rounded"
							value="<?php echo e($post->orden); ?>"
							wire:change="updateOrder(<?php echo e($post->id); ?>, $event.target.value)"
						>
				                <button
				                	type="button"
				                        class="ml-2 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600"
				                        wire:click="confirmOrder(<?php echo e($post->id); ?>)"
				                >
				                	<?php echo e(__('Guardar')); ?>

				                </button>
				        </div>

				                    <!-- Mensaje de error si hay conflicto -->
				                    <!--[if BLOCK]><![endif]--><?php if(isset($errors[$post->id])): ?>
				                        <p class="text-red-500 text-sm mt-1"><?php echo e($errors[$post->id]); ?></p>
				                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Botones de estado -->
					<div class="flex items-center justify-between">
						<!--[if BLOCK]><![endif]--><?php if($post->is_restricted == 2): ?>
							<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setCorrect(<?php echo e($post->id); ?>)">
								<?php if (isset($component)) { $__componentOriginal33a1d21426a24dff00cd685827e93a9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33a1d21426a24dff00cd685827e93a9e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.correct','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.correct'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33a1d21426a24dff00cd685827e93a9e)): ?>
<?php $attributes = $__attributesOriginal33a1d21426a24dff00cd685827e93a9e; ?>
<?php unset($__attributesOriginal33a1d21426a24dff00cd685827e93a9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33a1d21426a24dff00cd685827e93a9e)): ?>
<?php $component = $__componentOriginal33a1d21426a24dff00cd685827e93a9e; ?>
<?php unset($__componentOriginal33a1d21426a24dff00cd685827e93a9e); ?>
<?php endif; ?>	
							</button>
							<button type="button" class="text-red-500" wire:click="setDefault(<?php echo e($post->id); ?>)">
								<?php if (isset($component)) { $__componentOriginal06c413bd47b3f9217124bbe844128a94 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06c413bd47b3f9217124bbe844128a94 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.incorrect','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.incorrect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06c413bd47b3f9217124bbe844128a94)): ?>
<?php $attributes = $__attributesOriginal06c413bd47b3f9217124bbe844128a94; ?>
<?php unset($__attributesOriginal06c413bd47b3f9217124bbe844128a94); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06c413bd47b3f9217124bbe844128a94)): ?>
<?php $component = $__componentOriginal06c413bd47b3f9217124bbe844128a94; ?>
<?php unset($__componentOriginal06c413bd47b3f9217124bbe844128a94); ?>
<?php endif; ?>	
							</button>
						<?php elseif($post->is_restricted == 1): ?>
							<button type="button" class="text-green-500" wire:click="setDefault(<?php echo e($post->id); ?>)">
								<?php if (isset($component)) { $__componentOriginal33a1d21426a24dff00cd685827e93a9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33a1d21426a24dff00cd685827e93a9e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.correct','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.correct'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33a1d21426a24dff00cd685827e93a9e)): ?>
<?php $attributes = $__attributesOriginal33a1d21426a24dff00cd685827e93a9e; ?>
<?php unset($__attributesOriginal33a1d21426a24dff00cd685827e93a9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33a1d21426a24dff00cd685827e93a9e)): ?>
<?php $component = $__componentOriginal33a1d21426a24dff00cd685827e93a9e; ?>
<?php unset($__componentOriginal33a1d21426a24dff00cd685827e93a9e); ?>
<?php endif; ?>	
								</button>
								<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setIncorrect(<?php echo e($post->id); ?>)">
								<?php if (isset($component)) { $__componentOriginal06c413bd47b3f9217124bbe844128a94 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06c413bd47b3f9217124bbe844128a94 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.incorrect','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.incorrect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06c413bd47b3f9217124bbe844128a94)): ?>
<?php $attributes = $__attributesOriginal06c413bd47b3f9217124bbe844128a94; ?>
<?php unset($__attributesOriginal06c413bd47b3f9217124bbe844128a94); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06c413bd47b3f9217124bbe844128a94)): ?>
<?php $component = $__componentOriginal06c413bd47b3f9217124bbe844128a94; ?>
<?php unset($__componentOriginal06c413bd47b3f9217124bbe844128a94); ?>
<?php endif; ?>	
							</button>
						<?php else: ?>
							<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setCorrect(<?php echo e($post->id); ?>)">
								<?php if (isset($component)) { $__componentOriginal33a1d21426a24dff00cd685827e93a9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33a1d21426a24dff00cd685827e93a9e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.correct','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.correct'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33a1d21426a24dff00cd685827e93a9e)): ?>
<?php $attributes = $__attributesOriginal33a1d21426a24dff00cd685827e93a9e; ?>
<?php unset($__attributesOriginal33a1d21426a24dff00cd685827e93a9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33a1d21426a24dff00cd685827e93a9e)): ?>
<?php $component = $__componentOriginal33a1d21426a24dff00cd685827e93a9e; ?>
<?php unset($__componentOriginal33a1d21426a24dff00cd685827e93a9e); ?>
<?php endif; ?>	
							</button>
							<button type="button" class="text-gray-400 hover:text-gray-500" wire:click="setIncorrect(<?php echo e($post->id); ?>)">
								<?php if (isset($component)) { $__componentOriginal06c413bd47b3f9217124bbe844128a94 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06c413bd47b3f9217124bbe844128a94 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.incorrect','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.incorrect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06c413bd47b3f9217124bbe844128a94)): ?>
<?php $attributes = $__attributesOriginal06c413bd47b3f9217124bbe844128a94; ?>
<?php unset($__attributesOriginal06c413bd47b3f9217124bbe844128a94); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06c413bd47b3f9217124bbe844128a94)): ?>
<?php $component = $__componentOriginal06c413bd47b3f9217124bbe844128a94; ?>
<?php unset($__componentOriginal06c413bd47b3f9217124bbe844128a94); ?>
<?php endif; ?>	
							</button>
						<?php endif; ?><!--[if ENDBLOCK]><![endif]-->					
					</div>
					<button type="button" wire:click="admedit('<?php echo e($post->user->username); ?>',<?php echo e($post->id); ?>)">
						<?php echo e(__('Modificar')); ?>

					</button>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

	</div>
	<div class="mt-4">
		<?php echo e($posts->links()); ?>

	</div>
</div><?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/moderation.blade.php ENDPATH**/ ?>