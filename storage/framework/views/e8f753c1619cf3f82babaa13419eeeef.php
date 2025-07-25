<div>
    <div class= "bg-yellow-500">
        <div class="container flex items-center justify-between px-4 py-4 mx-auto">
            <div class="text-3xl text-white">
                <b><?php echo e($post->title); ?></b>
            </div>
            <div class="text-xl text-white">
            </div>
        </div>
    </div>
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-1/2 px-4">
                <div class="bg-white">
                    <div class="swiper big-slides">
                        <div class="swiper-wrapper">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide"><img src="<?php echo e(\Storage::url($image->path)); ?>" loading="lazy">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="swiper-button-prev" style="color: white ! important"></div>
                        <div class="swiper-button-next" style="color: white ! important"></div>
                    </div>
                    <div thumbsSlider="" class="mt-3 swiper thumbs">
                        <div class="swiper-wrapper">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="opacity-50 cursor-pointer swiper-slide"><img
                                        src="<?php echo e(\Storage::url($image->thumbnail_path)); ?>" loading="lazy"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-start w-1/2 pt-6">
                <div class="pl-4">
                    <div class="mb-4">
                        <button type="button" wire:click="toggleLike()">
                            <!--[if BLOCK]><![endif]--><?php if($like): ?>
                                <?php if (isset($component)) { $__componentOriginalc3c49bfccf559fb2d8ebd2268c5de857 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc3c49bfccf559fb2d8ebd2268c5de857 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.liked','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.liked'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc3c49bfccf559fb2d8ebd2268c5de857)): ?>
<?php $attributes = $__attributesOriginalc3c49bfccf559fb2d8ebd2268c5de857; ?>
<?php unset($__attributesOriginalc3c49bfccf559fb2d8ebd2268c5de857); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3c49bfccf559fb2d8ebd2268c5de857)): ?>
<?php $component = $__componentOriginalc3c49bfccf559fb2d8ebd2268c5de857; ?>
<?php unset($__componentOriginalc3c49bfccf559fb2d8ebd2268c5de857); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginalac9becb9122b123a02712e1254b04cdb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac9becb9122b123a02712e1254b04cdb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.like','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.like'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac9becb9122b123a02712e1254b04cdb)): ?>
<?php $attributes = $__attributesOriginalac9becb9122b123a02712e1254b04cdb; ?>
<?php unset($__attributesOriginalac9becb9122b123a02712e1254b04cdb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac9becb9122b123a02712e1254b04cdb)): ?>
<?php $component = $__componentOriginalac9becb9122b123a02712e1254b04cdb; ?>
<?php unset($__componentOriginalac9becb9122b123a02712e1254b04cdb); ?>
<?php endif; ?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php echo e($post->likes_count); ?>

                        </button>
                    </div>
                    <div class="mb-4">
                        <a href="">
                            <?php if (isset($component)) { $__componentOriginal7ceabda0c22139669daeccabceecbc02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ceabda0c22139669daeccabceecbc02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.comment','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.comment'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7ceabda0c22139669daeccabceecbc02)): ?>
<?php $attributes = $__attributesOriginal7ceabda0c22139669daeccabceecbc02; ?>
<?php unset($__attributesOriginal7ceabda0c22139669daeccabceecbc02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ceabda0c22139669daeccabceecbc02)): ?>
<?php $component = $__componentOriginal7ceabda0c22139669daeccabceecbc02; ?>
<?php unset($__componentOriginal7ceabda0c22139669daeccabceecbc02); ?>
<?php endif; ?>
                        </a>
                    </div>
                    <div class="mb-4">
                        <a href="">
                            <?php if (isset($component)) { $__componentOriginalf98f8e4f2eded9bb9df99981f1e4716e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf98f8e4f2eded9bb9df99981f1e4716e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.follow','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.follow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf98f8e4f2eded9bb9df99981f1e4716e)): ?>
<?php $attributes = $__attributesOriginalf98f8e4f2eded9bb9df99981f1e4716e; ?>
<?php unset($__attributesOriginalf98f8e4f2eded9bb9df99981f1e4716e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf98f8e4f2eded9bb9df99981f1e4716e)): ?>
<?php $component = $__componentOriginalf98f8e4f2eded9bb9df99981f1e4716e; ?>
<?php unset($__componentOriginalf98f8e4f2eded9bb9df99981f1e4716e); ?>
<?php endif; ?>
                        </a>
                    </div>
                    <div class="mb-4">
                        <a href="">
                            <?php if (isset($component)) { $__componentOriginal3ddbc5c786b35806503faa1f86da939a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ddbc5c786b35806503faa1f86da939a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.fav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.fav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ddbc5c786b35806503faa1f86da939a)): ?>
<?php $attributes = $__attributesOriginal3ddbc5c786b35806503faa1f86da939a; ?>
<?php unset($__attributesOriginal3ddbc5c786b35806503faa1f86da939a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ddbc5c786b35806503faa1f86da939a)): ?>
<?php $component = $__componentOriginal3ddbc5c786b35806503faa1f86da939a; ?>
<?php unset($__componentOriginal3ddbc5c786b35806503faa1f86da939a); ?>
<?php endif; ?>
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <?php if (isset($component)) { $__componentOriginal5f3ec5ba886e1520a1354ec74192e338 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f3ec5ba886e1520a1354ec74192e338 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.share','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.share'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f3ec5ba886e1520a1354ec74192e338)): ?>
<?php $attributes = $__attributesOriginal5f3ec5ba886e1520a1354ec74192e338; ?>
<?php unset($__attributesOriginal5f3ec5ba886e1520a1354ec74192e338); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f3ec5ba886e1520a1354ec74192e338)): ?>
<?php $component = $__componentOriginal5f3ec5ba886e1520a1354ec74192e338; ?>
<?php unset($__componentOriginal5f3ec5ba886e1520a1354ec74192e338); ?>
<?php endif; ?>
                        </a>
                    </div>
                </div>
                <div class="w-full ml-12">
                    <div class="text-xl text-blue-500">
                        <b>MÉS INFORMACIÓ</b>
                    </div>
                    <div class="py-4">
                        <?php echo e($post->body); ?>

                    </div>
                    <a href="">
                        <div class="flex items-center text-blue-500">
                            <div class="pr-2">
                                <?php if (isset($component)) { $__componentOriginal5f3ec5ba886e1520a1354ec74192e338 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f3ec5ba886e1520a1354ec74192e338 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.share','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.share'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f3ec5ba886e1520a1354ec74192e338)): ?>
<?php $attributes = $__attributesOriginal5f3ec5ba886e1520a1354ec74192e338; ?>
<?php unset($__attributesOriginal5f3ec5ba886e1520a1354ec74192e338); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f3ec5ba886e1520a1354ec74192e338)): ?>
<?php $component = $__componentOriginal5f3ec5ba886e1520a1354ec74192e338; ?>
<?php unset($__componentOriginal5f3ec5ba886e1520a1354ec74192e338); ?>
<?php endif; ?>
                            </div>
                            COMPARTIR
                        </div>
                    </a>
                    <div id="comments" class="pt-8">
                        <div>
                            <button type="button" wire:click="toggleComments()">
                                <?php echo e($this->showComments ? 'HIDE COMMENTS' : 'SHOW COMMENTS'); ?>

                            </button>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($showComments): ?>
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('comments', ['post' => $post]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2230083604-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-200">
        <div class="container px-4 mx-auto">
            <div class="flex items-center justify-between">
                <div class="py-5">
                    <div>
                        <b><?php echo e($user->name); ?> <?php echo e($user->surnames); ?></b>
                    </div>
                    <?php echo e($user->city); ?>

                    <!--[if BLOCK]><![endif]--><?php if($user->country): ?>
                        , <?php echo e($user->country); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="pl-24 text-blue-500">
                    <b><?php echo e($post->title); ?></b>
                </div>
                <div class="text-blue-500">
                    ANAR AL PERFIL
                    <a href="">
                        <div class="flex justify-end">
                            <?php if (isset($component)) { $__componentOriginaldd0fc0e4fdd8450173e99893e86aadce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldd0fc0e4fdd8450173e99893e86aadce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.arrow','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.arrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldd0fc0e4fdd8450173e99893e86aadce)): ?>
<?php $attributes = $__attributesOriginaldd0fc0e4fdd8450173e99893e86aadce; ?>
<?php unset($__attributesOriginaldd0fc0e4fdd8450173e99893e86aadce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldd0fc0e4fdd8450173e99893e86aadce)): ?>
<?php $component = $__componentOriginaldd0fc0e4fdd8450173e99893e86aadce; ?>
<?php unset($__componentOriginaldd0fc0e4fdd8450173e99893e86aadce); ?>
<?php endif; ?>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>




    <!--[if BLOCK]><![endif]--><?php if(0): ?>
        <div id="comments" class="pt-8">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('comments', ['post' => $post]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2230083604-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <div class="w-1/4 px-4">
            <!--[if BLOCK]><![endif]--><?php if(auth()->check()): ?>
                <nav class="mb-4 bg-white rounded shadow">
                    <ul role="list" class="divide-y" x-data="{ openCollections: false }">
                        <?php if(auth()->id() == $post->user_id): ?>
                            <li>
                                <a class="flex items-center px-4 py-3 text-base font-bold text-white bg-black "
                                    href="<?php echo e(route('project.edit', [$user, $post])); ?>" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    Edit project</a>
                            </li>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <li>
                            <a href="#comments" class="flex items-center px-4 py-3 text-base font-bold text-black ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                </svg>

                                Comment
                            </a>
                        </li>

                        <li>

                            <button wire:click='toggleFavorite()' type="button"
                                class="flex items-center px-4 py-3 text-base font-bold text-red-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Add to favorites
                            </button>
                        </li>
                        <li>
                            <button type="button" x-on:click="openCollections = ! openCollections"
                                class="flex items-center px-4 py-3 text-base font-bold text-indigo-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    x-show="! openCollections" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 mr-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    x-show="openCollections" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 mr-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>
                                Add to collection
                            </button>
                            <ul x-show="openCollections">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = auth()->user()->collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="text-xs">
                                        <button type="button" wire:click='toggleCollection(<?php echo e($collection->id); ?>)'
                                            class="flex items-center px-4 py-3 pl-4 text-sm font-bold text-indigo-600 ">

                                            
                                            <!--[if BLOCK]><![endif]--><?php if(!!$collection->posts()->where('post_id', $post->id)->count()): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-6 h-6 mr-4">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            <?php else: ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 mr-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php echo e($collection->name); ?>

                                        </button>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center px-4 py-3 text-base font-bold text-indigo-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                </svg>


                                Share
                            </button>
                        </li>

                    </ul>
                </nav>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-user', ['user' => $user]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2230083604-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
</div>
<script>
    const thumbs = new Swiper('.thumbs', {
        spaceBetween: 10,
        lazy: true,
        slidesPerView: 6,
        freeMode: true,
        watchSlidesProgress: true,
    });
    const swiper = new Swiper('.big-slides', {
        lazy: true,
        autoHeight: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: thumbs,
        },
    });
</script>
</div>
<?php /**PATH /Users/orioltriguero/code/scratch/resources/views/livewire/post-page.blade.php ENDPATH**/ ?>