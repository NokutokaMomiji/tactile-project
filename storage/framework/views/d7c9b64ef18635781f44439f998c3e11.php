<div>

    <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4 md:w-3/4">
            <div class="columns-1 md:columns-3">
                <!-- __BLOCK__ --><?php $__currentLoopData = $this->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('partials.post-snippet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
            </div>
        </div>
        <div class="w-1/4 px-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-user', ['user' => $user]);

$__html = app('livewire')->mount($__name, $__params, 'yIiy3vK', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            <div class="p-4 mt-4 bg-white rounded" x-data="{ addingCollection: false }">
                <div class="flex items-center justify-between pb-2 mb-2 border-b">
                    <b><?php echo e(auth()->id() == $user->id ? 'My' : ''); ?>

                        Collections
                    </b>
                    <!-- __BLOCK__ --><?php if(auth()->id() == $user->id): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 duration-150 cursor-pointer"
                            :class="addingCollection ? 'rotate-45' : 'rotate-0'"
                            x-on:click="addingCollection = ! addingCollection">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    <?php endif; ?> <!-- __ENDBLOCK__ -->
                </div>
                <!-- __BLOCK__ --><?php if(auth()->id() == $user->id): ?>
                    <div x-show="addingCollection" x-transition>
                        <form wire:submit="addCollection" class="container flex px-2 py-2">
                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'text','name' => 'newpost','id' => 'newpost','wire:model' => 'collectionName']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'newpost','id' => 'newpost','wire:model' => 'collectionName']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['type' => 'submit','class' => 'inline-block float-right mt-3 mb-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'inline-block float-right mt-3 mb-3']); ?>Save <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                        </form>
                    </div>
                <?php endif; ?> <!-- __ENDBLOCK__ -->
                <ul>
                    <!-- __BLOCK__ --><?php $__currentLoopData = $user->collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex justify-between">
                            <a href="<?php echo e(route('collection-page', [$user, $collection])); ?> "
                                class="flex justify-between">
                                <?php echo e($collection->name); ?>

                            </a>
                            <!-- __BLOCK__ --><?php if(auth()->id() == $user->id): ?>
                                <div class="relative inline-block text-left" x-data="{ openDropdown: false }"
                                    x-on:click.away="openDropdown = false">
                                    <div>
                                        <button type="button" x-on:click="openDropdown = ! openDropdown"
                                            class="flex items-center text-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100"
                                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div x-show="openDropdown"
                                        class="absolute right-0 z-10 w-56 mt-2 text-left origin-top-right bg-white rounded-md shadow-lg hover:bg-red-100 ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <div class="py-1" role="none">
                                            <button
                                                x-on:click="if (confirm('Are you sure?')) $wire.deleteCollection(<?php echo e($collection->id); ?>)"
                                                class="block w-full px-4 py-2 text-sm text-red-700 ">Delete
                                                collection</button>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?> <!-- __ENDBLOCK__ -->
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                </ul>

            </div>
        </div>
    </div>


</div>
<?php /**PATH /Users/marc/Code/scjtactile/resources/views/livewire/profile-page.blade.php ENDPATH**/ ?>