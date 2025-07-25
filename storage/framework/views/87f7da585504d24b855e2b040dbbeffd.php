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
			<h1 class="text-2xl font-bold"><?php echo e(__("Llista d'Usuaris")); ?></h1>
			
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
		<!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a href="<?php echo e(Route('users.show', $user->id)); ?>" class="block" >
			<div class="p-4 bg-white rounded shadow flex items-center justify-between usuario">
				<div class="">
					<div>
						<h2 class="text-lg font-semibold"><?php echo e($user->name); ?> <?php echo e($user->surnames); ?></h2>
						<p class="text-gray-600"><?php echo e(__("Nom d'usuari:")); ?> <?php echo e($user->username); ?></p>
						<p class="text-gray-600"><?php echo e(__('Email:')); ?> <?php echo e($user->email); ?></p>
						<p class="text-gray-600"><?php echo e(__('Fecha de creacion:')); ?> <?php echo e($user->created_at); ?></p>
					</div>
				</div>
			</a>
				<div class="flex items-center space-x-4">				
					<div>
						<p class="text-gray-600 text-sm"><?php echo e(__('Admin:')); ?></p>
						<select wire:change="updateAdminStatus(<?php echo e($user->id); ?>, $event.target.value)">
							<option value="0" <?php if(!$user->is_admin): ?> selected <?php endif; ?>>No</option>
							<option value="1" <?php if($user->is_admin): ?> selected <?php endif; ?>>Si</option>
						</select>
					</div>
							
					<div>
						<p class="text-gray-600 text-sm"><?php echo e(__('Banned:')); ?></p>
						<select wire:change="updateBanStatus(<?php echo e($user->id); ?>, $event.target.value)">
							<option value="0" <?php if(!$user->is_banned): ?> selected <?php endif; ?>>No</option>
							<option value="1" <?php if($user->is_banned): ?> selected <?php endif; ?>>Si</option>
						</select>	
					</div>
				</div>
			</div>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
	</div>
	<div class="mt-4">
		<?php echo e($users->links()); ?>

	</div>
	
</div><?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/users.blade.php ENDPATH**/ ?>