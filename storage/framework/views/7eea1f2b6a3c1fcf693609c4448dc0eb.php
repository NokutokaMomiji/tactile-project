<div>

    <!--[if BLOCK]><![endif]--><?php if(!auth()->check()): ?>
        <div class="flex-col justify-center py-12 border-t-4 border-b-4 border-groc ">
            <div class="mb-4 text-center">
                <a href="/register"
                    class="inline-flex items-center px-8 py-2 uppercase bg-white rounded-full hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-4 size-5 text-blau">
                        <path fill-rule="evenodd"
                            d="M3 2.25a.75.75 0 0 1 .75.75v.54l1.838-.46a9.75 9.75 0 0 1 6.725.738l.108.054A8.25 8.25 0 0 0 18 4.524l3.11-.732a.75.75 0 0 1 .917.81 47.784 47.784 0 0 0 .005 10.337.75.75 0 0 1-.574.812l-3.114.733a9.75 9.75 0 0 1-6.594-.77l-.108-.054a8.25 8.25 0 0 0-5.69-.625l-2.202.55V21a.75.75 0 0 1-1.5 0V3A.75.75 0 0 1 3 2.25Z"
                            clip-rule="evenodd" />
                    </svg>

                    <?php echo e(__('Uneix-te a la comunitat')); ?>

                </a>
            </div>
            <div class="text-center">
                <a href="/login"
                    class="inline-flex items-center px-8 py-2 uppercase bg-white rounded-full hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-4 size-5 text-blau">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                            clip-rule="evenodd" />
                    </svg>

                    <?php echo e(__('Iniciar sessió')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="w-full py-8 bg-blauclar">
        <div class="w-full mb-4 text-3xl text-center">
            <h2><?php echo e(__('EXPLORA ELS PROJECTES DE LA COMUNITAT')); ?></h2>
        </div>
        <div class="container flex items-center justify-between px-4 mx-auto">
            <div class="w-full mx-4">
                <div class="py-4 flex flex-wrap justify-center ">
                <div class="w-40 mb-2 px-2">
                    <?php if (isset($component)) { $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-primary','data' => ['href' => '/home','selected' => ''.e(! $this->filter).'','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/home','selected' => ''.e(! $this->filter).'','class' => 'w-full']); ?><?php echo e(__('TOTS')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $attributes = $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $component = $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
                </div>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\PostCategory::oldest('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="w-40 mb-2 px-2">
                        <?php if (isset($component)) { $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-primary','data' => ['href' => '?filter='.e($category->slug).'','selected' => ''.e($this->filter == $category->slug).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '?filter='.e($category->slug).'','selected' => ''.e($this->filter == $category->slug).'']); ?><?php echo e(__ ($category->name)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $attributes = $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $component = $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                </div>
            </div>
           
        </div>
    </div>
    <div class="w-full border-groc border-y-4 ">
        <div class="p-4 text-center">
            <h1 class="text-3xl text-white"><?php echo e(__('DESTACATS')); ?></h1>
        </div>
        <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
            <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <!--[if BLOCK]><![endif]--><?php if($post->is_restricted == 1): ?>
                        <?php echo $__env->make('partials.post-snippet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div class="w-full p-4 mb-8 bg-white rounded-lg">
                <?php echo e($posts->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/projects/resources/views/livewire/home.blade.php ENDPATH**/ ?>