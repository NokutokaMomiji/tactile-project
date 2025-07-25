<div class="p-4 bg-white rounded-lg">
    <div class="text-center">
        <a href="<?php echo e(route('profile-page', $user)); ?>"><img src="<?php echo e($user->featured_image); ?>"
                class="w-32 h-32 mx-auto rounded-full"></a>
        <a href="<?php echo e(route('profile-page', $user)); ?>">
            <h2 class="mt-1 text-2xl font-semibold "><?php echo e($user->name); ?>

                <?php echo e($user->surnames); ?>

            </h2>
        </a>

        <div class="text-gray-500">@ <?php echo e($user->username); ?></div>

        <div class="text-gray-900"><?php echo e($user->entity); ?> | <?php echo e($user->charge); ?></div>

        <div class="my-4 text-sm text-gray-900"><?php echo e($user->reason); ?></div>

        <!-- __BLOCK__ --><?php if(auth()->check() && auth()->id() != $user->id): ?>
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['wire:click' => 'toggleFollowing','class' => 'justify-center block w-full mb-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'toggleFollowing','class' => 'justify-center block w-full mb-4']); ?>
                <?php echo e((!! auth()->user()->following()->where('follower_id', auth()->user()->id)->count()) ? 'Unfollow' : 'Follow'); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        <?php endif; ?> <!-- __ENDBLOCK__ -->
        <div class="flex space-x-2">
            <button type="button" wire:click='showRelations("followers")'
                class="w-1/2 py-2 text-white rounded bg-sky-600">Followers</button>
            <button type="button" wire:click='showRelations("following")'
                class="w-1/2 py-2 text-white rounded bg-sky-600">Following</button>
        </div>
    </div>

    <!-- __BLOCK__ --><?php if($this->showModal): ?>
        <div class="relative z-10" @keyup.escape="open = false" role="dialog" aria-modal="true"
            x-data="{ open: <?php if ((object) ('showModal') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'->value()); ?>')<?php echo e('showModal'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('showModal'); ?>')<?php endif; ?>.live }">

            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-25"></div>

            <div class="fixed inset-0 z-10 w-screen p-4 overflow-y-auto sm:p-6 md:p-20">

                <div x-on:click.away="open = false"
                    class="max-w-xl mx-auto overflow-hidden transition-all transform bg-white divide-y divide-gray-100 shadow-2xl rounded-xl ring-1 ring-black ring-opacity-5">

                    <div class="p-4 text-xl font-bold capitalize"><?php echo e($this->type); ?></div>
                    <ul class="p-3 overflow-y-auto max-h-96 scroll-py-3" id="options" role="listbox">
                        <!-- __BLOCK__ --><?php $__currentLoopData = $this->relations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('profile-page', $user)); ?>" class="flex p-3 hover:bg-gray-100"
                                id="option-1" role="option" tabindex="-1">

                                <img src="<?php echo e($user->featured_image); ?>" class="w-10 h-10 rounded-full">
                                <div class="flex-auto ml-4">
                                    <p class="text-sm font-medium text-gray-700"><?php echo e($user->name); ?></p>
                                    <p class="text-sm text-gray-500"><?php echo e($user->reason); ?></p>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?> <!-- __ENDBLOCK__ -->
</div>
<?php /**PATH /var/www/vhosts/piscastudio.com/scratch.piscastudio.com/resources/views/livewire/sidebar-user.blade.php ENDPATH**/ ?>