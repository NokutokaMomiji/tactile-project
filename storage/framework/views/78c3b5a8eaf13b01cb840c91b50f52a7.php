<div>

    <div class="flex flex-wrap -mx-4">
        <div class="w-3/4 px-4">

            <div class="bg-white">
                <div class="swiper big-slides">
                    <div class="swiper-wrapper">
                        <!-- __BLOCK__ --><?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide"><img src="<?php echo e(\Storage::url($image->path)); ?>" loading="lazy"></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                    </div>
                    <div class="swiper-button-prev" style="color: white ! important"></div>
                    <div class="swiper-button-next" style="color: white ! important"></div>
                </div>
                <div thumbsSlider="" class="mt-3 swiper thumbs">
                    <div class="swiper-wrapper">
                        <!-- __BLOCK__ --><?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="opacity-50 cursor-pointer swiper-slide"><img
                                    src="<?php echo e(\Storage::url($image->thumbnail_path)); ?>" loading="lazy"></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                    </div>
                </div>

                <div class="p-4 prose">
                    <?php echo $post->body; ?>

                </div>
            </div>

            <div id="comments" class="pt-8">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('comments', ['post' => $post]);

$__html = app('livewire')->mount($__name, $__params, 'QA9XJ6C', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            </div>
        </div>
        <div class="w-1/4 px-4">

            <nav class="mb-4 bg-white rounded shadow">
                <ul role="list" class="divide-y" x-data="{ openCollections: false }">
                    <!-- __BLOCK__ --><?php if(auth()->id() == $post->user_id): ?>
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
                    <?php endif; ?> <!-- __ENDBLOCK__ -->
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
                                x-show="openCollections" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                            Add to collection
                        </button>
                        <ul x-show="openCollections">
                            <!-- __BLOCK__ --><?php $__currentLoopData = $user->collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="text-xs">
                                    <button type="button" wire:click='toggleCollection(<?php echo e($collection->id); ?>)'
                                        class="flex items-center px-4 py-3 pl-4 text-sm font-bold text-indigo-600 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>
                                        <?php echo e($collection->name); ?>

                                    </button>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="flex items-center px-4 py-3 text-base font-bold text-indigo-600 ">
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

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sidebar-user', ['user' => $user]);

$__html = app('livewire')->mount($__name, $__params, 'c1b98fY', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
<?php /**PATH /Users/marc/Code/scjtactile/resources/views/livewire/post-page.blade.php ENDPATH**/ ?>