<div>
    <div class="border-t-4 bg-blau border-groc">
        <div class="container flex items-center justify-between h-24 px-4 mx-auto text-white">
            <div class="flex items-center text-2xl font-bold uppercase">

                
                <!--[if BLOCK]><![endif]--><?php if(auth()->check() && auth()->id() == $user->id): ?>
                    Hola, <?php echo e($user->name); ?>

                <?php else: ?>
                    <?php echo e($user->name); ?> <?php echo e($user->surnames); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="uppercase">
                <!--[if BLOCK]><![endif]--><?php if(auth()->check() && auth()->id() == $user->id): ?>
                    <a href="/project/create">Crear nou projecte</a>
                <?php else: ?>
                    <?php echo e($user->city); ?>

                    <!--[if BLOCK]><![endif]--><?php if($user->country): ?>
                        , <?php echo e($user->country); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

    <?php if(auth()->user()->posts->count()): ?>
        <div class="border-b-4 bg-blauclar border-groc">
            <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
                <div class="w-full md:w-3/4">
                    <div class="grid grid-cols-4 gap-2 py-4 md:gap-4 md:grid-cols-5">
                        <?php if (isset($component)) { $__componentOriginalbb7ef3e56ece23d87a945663f01aebba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbb7ef3e56ece23d87a945663f01aebba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.primary','data' => ['selected' => ''.e(!count($this->actives)).'','class' => 'w-full','wire:click' => 'clearActives']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected' => ''.e(!count($this->actives)).'','class' => 'w-full','wire:click' => 'clearActives']); ?>Tots <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbb7ef3e56ece23d87a945663f01aebba)): ?>
<?php $attributes = $__attributesOriginalbb7ef3e56ece23d87a945663f01aebba; ?>
<?php unset($__attributesOriginalbb7ef3e56ece23d87a945663f01aebba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbb7ef3e56ece23d87a945663f01aebba)): ?>
<?php $component = $__componentOriginalbb7ef3e56ece23d87a945663f01aebba; ?>
<?php unset($__componentOriginalbb7ef3e56ece23d87a945663f01aebba); ?>
<?php endif; ?>

                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\PostCategory::latest('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginalbb7ef3e56ece23d87a945663f01aebba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbb7ef3e56ece23d87a945663f01aebba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.primary','data' => ['type' => 'button','wire:click' => 'setActive('.e($category->id).')','class' => 'w-full','selected' => ''.e(in_array($category->id, $this->actives)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => 'setActive('.e($category->id).')','class' => 'w-full','selected' => ''.e(in_array($category->id, $this->actives)).'']); ?><?php echo e($category->name); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbb7ef3e56ece23d87a945663f01aebba)): ?>
<?php $attributes = $__attributesOriginalbb7ef3e56ece23d87a945663f01aebba; ?>
<?php unset($__attributesOriginalbb7ef3e56ece23d87a945663f01aebba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbb7ef3e56ece23d87a945663f01aebba)): ?>
<?php $component = $__componentOriginalbb7ef3e56ece23d87a945663f01aebba; ?>
<?php unset($__componentOriginalbb7ef3e56ece23d87a945663f01aebba); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <?php /**
                <div class="flex justify-end w-full py-4 text-sm md:w-1/4">
                    <div>
                        <div class="flex justify-between w-40 p-1 border-t border-b border-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path
                                    d="M18.75 12.75h1.5a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM12 6a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 6ZM12 18a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 12 18ZM3.75 6.75h1.5a.75.75 0 1 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5ZM5.25 18.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 0 1.5ZM3 12a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 12ZM9 3.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM12.75 12a2.25 2.25 0 1 1 4.5 0 2.25 2.25 0 0 1-4.5 0ZM9 15.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                            </svg>
                            <span>ORDENAR PER</span>
                        </div>
                        <div
                            class="flex justify-between w-40 p-1 mt-2 font-semibold uppercase border-t border-b border-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5">
                                <path fill-rule="evenodd"
                                    d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                                    clip-rule="evenodd" />
                            </svg>


                            <span>Data</span>
                        </div>
                    </div>
                </div>
                **/
                ?>
            </div>
        </div>

        <div class="bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full">


                        <div class="my-4 text-3xl text-center text-gray-900">PROJECTES</div>
                        <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('partials.post-snippet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                    </div>

                    <!--[if BLOCK]><![endif]--><?php if(0): ?>
                        <div class="w-1/4 px-4">

                            <?php if(auth()->id() == $user->id): ?>
                                <nav class="mb-4 bg-white rounded shadow">
                                    <ul role="list" class="divide-y" x-data="{ openCollections: false }">

                                        <li>
                                            <a class="flex items-center px-4 py-3 text-base font-bold text-white bg-black "
                                                href="<?php echo e(route('project.create')); ?>" wire:navigate>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 mr-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                                Create project</a>
                                        </li>


                                    </ul>
                                </nav>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-user', ['user' => $user]);

$__html = app('livewire')->mount($__name, $__params, 'lw-423657113-0', $__slots ?? [], get_defined_vars());

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
                                    <?php if(auth()->id() == $user->id): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 duration-150 cursor-pointer"
                                            :class="addingCollection ? 'rotate-45' : 'rotate-0'"
                                            x-on:click="addingCollection = ! addingCollection">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <?php if(auth()->id() == $user->id): ?>
                                    <div x-show="addingCollection" x-transition>
                                        <form wire:submit="addCollection" class="container flex px-2 py-2">
                                            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
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
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['type' => 'submit','class' => 'inline-block float-right mt-3 mb-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'inline-block float-right mt-3 mb-3']); ?>Save <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                                        </form>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <ul>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $user->collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="flex justify-between">
                                            <a href="<?php echo e(route('collection-page', [$user, $collection])); ?> "
                                                class="flex justify-between">
                                                <?php echo e($collection->name); ?>

                                            </a>
                                            <?php if(auth()->id() == $user->id): ?>
                                                <div class="relative inline-block text-left" x-data="{ openDropdown: false }"
                                                    x-on:click.away="openDropdown = false">
                                                    <div>
                                                        <button type="button"
                                                            x-on:click="openDropdown = ! openDropdown"
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
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </ul>

                            </div>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="py-12 text-center bg-white">
            Aquest usuari encara no té projectes creats.
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /Users/marc/Code/scratch/resources/views/livewire/profile-page.blade.php ENDPATH**/ ?>