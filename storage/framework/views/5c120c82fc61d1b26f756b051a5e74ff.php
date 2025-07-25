<div>
    <style>
        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 24px;
            margin-left: 2px;
        }

        .swiper-button-prev:after {
            margin-left: -2px;
        }

        .swiper-button-prev, .swiper-button-next {
            color: white ! important;
            background: rgba(0,0,0,0.7);
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        #abeja {
            width: 80%;
        }


        @media (max-width: 1300px) {
            #abeja {
                width: 90%;
            }

        }
        @media (max-width: 760px) {
           #sota {
            flex-direction: column;
           }
           #abeja {
            margin-left: 5vw;
            width: 180%;
           }
        }

    </style>
    <script>
        document.title = "<?php echo e($post->title); ?> | Scratch Tactile" ;
        </script>
    <!--[if BLOCK]><![endif]--><?php if($post->is_restricted == 2): ?>
        <div class="bg-red-500 text-white text-center py-2">
            Aquest post està moderat. Només el pots veure perquè ets administrador.
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class= "bg-groc">
        <div class="container flex items-center justify-between px-4 py-4 mx-auto">
            <div class="flex items-center">
                <div class="text-white">
<div class="text-3xl">
<b id="translatedTitle" style="display: block;">
                                <?php echo $translatedTitle; ?>

    </b>
                            <b id="originalTitle" style="display: none;">
                                <?php echo $post->title; ?>

    </b>
</div>
                    <div class="text-lg">
                        By <a href="<?php echo e(route('profile-page', $post->user)); ?>" class="underline text-white"><?php echo e($post->user->name); ?> <?php echo e($post->user->surnames); ?></a>
                    </div>
                    <div class="text-lg"> 
                        <?php echo e(__('Data de creació:')); ?> <?php echo e(\Carbon\Carbon::create($post->updated_at)->format('Y M d')); ?>

                    </div>

                    <div class="mt-1">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <a href="/home?filter=<?php echo e($category->slug); ?>" class="text-white bg-blau rounded-full px-4 py-1 text-sm">
                                <?php echo e(__('' . $category->name) !== $category->name ? __('' . $category->name) : $category->name); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->    
                    </div>



                </div>
            </div>

            <div class="text-xl text-white">
                <!--[if BLOCK]><![endif]--><?php if(auth()->check() && (auth()->id() == $post->user_id || auth()->user()->is_admin)): ?>
                    <a href="<?php echo e(route('project.edit', [$post->user, $post])); ?>" class="flex items-center ml-4 text-white">
                        <?php if (isset($component)) { $__componentOriginal32022bdceaa704d305484041fc21cb4a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32022bdceaa704d305484041fc21cb4a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.edit','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32022bdceaa704d305484041fc21cb4a)): ?>
<?php $attributes = $__attributesOriginal32022bdceaa704d305484041fc21cb4a; ?>
<?php unset($__attributesOriginal32022bdceaa704d305484041fc21cb4a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32022bdceaa704d305484041fc21cb4a)): ?>
<?php $component = $__componentOriginal32022bdceaa704d305484041fc21cb4a; ?>
<?php unset($__componentOriginal32022bdceaa704d305484041fc21cb4a); ?>
<?php endif; ?>
                        <span class="text-sm"><?php echo e(__('modificar')); ?></span>
                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div id="abeja" class="mx-auto">
            <!--[if BLOCK]><![endif]--><?php if(session('message')): ?>
                <div class="p-4 text-green-800 bg-green-100 border border-green-600 rounded my-4">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <div id="sota" class="flex flex-wrap -mx-4">
                <div class="w-1/2 px-4">
                    <div class="bg-white">
                        <div class="swiper big-slides">
                            <div class="swiper-wrapper">



                                <!--[if BLOCK]><![endif]--><?php if($this->post->links): ?>
                                    <?php
                                        $tinkers = 0;
                                    ?>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->post->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(! \Str::contains($link['link'], 'tinkercad')) continue; ?>

                                        <?php
                                            $iframe = preg_replace_callback(
                                            '/https:\/\/www\.tinkercad\.com\/things\/([a-zA-Z0-9]+)(?:-[a-zA-Z0-9-]+)?/',
                                                   function ($matches) {
                                                       $id = $matches[1];
                                                       $iframe = '<iframe width="725" height="453" src="https://www.tinkercad.com/embed/' . $id . '?editbtn=1" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>';
                                                       return $iframe;
                                                   },
                                                   $link['link']
                                               );
                                              $tinkers++;
                                        ?>
                                            <div class="swiper-slide"><?php echo $iframe; ?></div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->




                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide"><img src="<?php echo e(\Storage::url($image->path)); ?>"
                                            loading="lazy">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="swiper-button-prev" style="color: white ! important"></div>
                            <div class="swiper-button-next" style="color: white ! important"></div>
                        </div>
                        <div thumbsSlider="" class="mt-3 swiper thumbs">
                            <div class="swiper-wrapper">
                                <!--[if BLOCK]><![endif]--><?php if(isset($tinkers)): ?>
                                <!--[if BLOCK]><![endif]--><?php for($i = 0; $i < $tinkers; ++$i): ?>
                                    <div class="opacity-50 cursor-pointer swiper-slide"><img
                                    src="/img/tinker.png" loading="lazy"></div>
                                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="opacity-50 cursor-pointer swiper-slide"><img
                                            src="<?php echo e(\Storage::url($image->thumbnail_path)); ?>" loading="lazy"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-start w-1/2 pt-6 pr-4">
                    <div class="pl-4">
                        <div class="mb-4">
                            <button type="button" title="Like post"
                                class="<?php echo e(auth()->check() &&auth()->user()->likes()->exists($this->post)? 'text-groc': 'text-gray-400'); ?>"
                                 wire:click="toggleLike()">
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
                                <?php echo e($this->post->likes->count()); ?>

                            </button>
                        </div>
                        <div class="mb-4">
                            <button wire:click="toggleComments()" title="Show comments" class="text-gray-400"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <ellipse cx="12" cy="12" rx="10" ry="8" fill="none" />
                                    <ellipse cx="12" cy="12" rx="2" ry="2" fill="grey"/>
                                </svg>

                                <?php echo e($this->getViewCount()); ?>

                            </button>
                        </div>
                        <div class="mb-4">
                            <button
                                class="<?php echo e(auth()->check() &&auth()->user()->favorites()->where('post_id', $post->id)->exists()? 'text-groc': 'text-gray-400'); ?>"
                                type="button" title="Add to favorites" wire:click='toggleFavorite()'>
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
                            </button>
                        </div>
                        <?php if(auth()->check()): ?>
                            <div class="relative mb-4" x-data="{ openCollections: false }"
                                x-on:click.away="openCollections = false">
                                <button type="button" x-on:click="openCollections = ! openCollections"
                                    class="text-gray-400" title="Add to collection">
                                    <?php if (isset($component)) { $__componentOriginalb2e05442d75f4bd831c15af26acb7cc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb2e05442d75f4bd831c15af26acb7cc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.collection','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.collection'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb2e05442d75f4bd831c15af26acb7cc2)): ?>
<?php $attributes = $__attributesOriginalb2e05442d75f4bd831c15af26acb7cc2; ?>
<?php unset($__attributesOriginalb2e05442d75f4bd831c15af26acb7cc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2e05442d75f4bd831c15af26acb7cc2)): ?>
<?php $component = $__componentOriginalb2e05442d75f4bd831c15af26acb7cc2; ?>
<?php unset($__componentOriginalb2e05442d75f4bd831c15af26acb7cc2); ?>
<?php endif; ?>
                                </button>
                                <ul x-show="openCollections"
                                    class="absolute bg-white border border-gray-100 divide-y rounded shadow-lg w-60">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = auth()->user()->collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="text-xs">
                                            <button type="button" wire:click='toggleCollection(<?php echo e($collection->id); ?>)'
                                                class="flex items-center px-4 py-3 pl-4 text-sm font-semibold text-indigo-600 ">

                                                
                                                <!--[if BLOCK]><![endif]--><?php if(!!$collection->posts()->where('post_id', $post->id)->count()): ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="mr-2 size-4">
                                                        <path fill-rule="evenodd"
                                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                <?php else: ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="mr-2 size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                    </svg>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php echo e($collection->name); ?>

                                            </button>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <div>
                            
                                <a class="text-gray-400" href="https://www.addtoany.com/share" onclick="copyToClipboard(event)">
                                <div class="pr-2"><?php if (isset($component)) { $__componentOriginal5f3ec5ba886e1520a1354ec74192e338 = $component; } ?>
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
<?php endif; ?></div>
                            </a>
                            <script>
                                var a2a_config = a2a_config || {};
                                a2a_config.onclick = 1;
                                a2a_config.locale = "ca-AD";

                                function copyToClipboard(event) {
                                    event.preventDefault();

                                    var textToCopy = 'https://projects.tactilejr.org/project/' + <?php echo e($post->id); ?>;
                                    navigator.clipboard.writeText(textToCopy).then(() => {

                                        var messageElement = document.createElement('div');
                                        messageElement.textContent = 'Copiado!';
                                        messageElement.classList.add('text-black-500');

                                        var rect = event.target.getBoundingClientRect();
                                        messageElement.style.position = 'absolute';
                                        messageElement.style.left = (rect.left + rect.width / 2 - 35) + 'px';
                                        messageElement.style.top = rect.top + window.scrollY + 25 + 'px'; 

                                        document.body.appendChild(messageElement);

                                        setTimeout(() => {
                                            messageElement.remove();
                                        }, 1000);
                                    }).catch(err => {
                                        console.error('Error al copiar al portapapeles: ', err);
                                    });
                                }
                            </script>
                        </div>


                    </div>
                    <div class="w-full ml-4">
                        <div class="text-xl text-blau">
                            <b><?php echo e(__('DESCRIPCIÓ')); ?></b>
                        </div>
                        <div>
                        <div class="py-4 prose">
                            <div id="translatedBody" style="display: block;">
                                <?php echo $translatedBody; ?>

                            </div>
                            <div id="originalBody" style="display: none;">
                                <?php echo $post->processedBody; ?>

                            </div>


                        </div>

                        <style>
                            button.text-xs {
                                position: relative;
                                cursor: pointer;
                                background: none;
                                border: none;
                                color: #007bff;
                                font-size: 16px;
                                padding: 5px;
                            }

                            .tooltip-text {
                                visibility: hidden;
                                position: absolute;
                                top: 100%;
                                left: 50%;
                                transform: translateX(-50%);
                                background-color: rgba(0, 0, 0, 0.75);
                                color: #fff;
                                padding: 5px;
                                border-radius: 4px;
                                font-size: 12px;
                                white-space: normal;
                                width: 300px;
                                z-index: 10;
                                opacity: 0;
                                transition: opacity 0.3s;
                            }

                            button.text-xs:hover .tooltip-text {
                                visibility: visible;
                                opacity: 1;
                            }
                        </style>

                        <script>
                            function toggleTranslation() {
                                const translatedTitle = document.getElementById('translatedTitle');
                                const originalTitle = document.getElementById('originalTitle');

                                const translatedBody = document.getElementById('translatedBody');
                                const originalBody = document.getElementById('originalBody');

                                if (translatedBody && originalBody && translatedTitle && originalTitle) {
                                    // Alternar la visibilidad del contenido traducido y original
                                    if (translatedBody.style.display === 'none') {
                                        translatedBody.style.display = 'block';
                                        originalBody.style.display = 'none';

                                        translatedTitle.style.display = 'block';
                                        originalTitle.style.display = 'none';
                                    } else {
                                        translatedBody.style.display = 'none';
                                        originalBody.style.display = 'block';

                                        translatedTitle.style.display = 'none';
                                        originalTitle.style.display = 'block';
                                    }
                                }
                            }
                        </script>



                        <!--[if BLOCK]><![endif]--><?php if(session()->has('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                        <!--[if BLOCK]><![endif]--><?php if($post->documents->count()): ?>
                            <div class="mt-8">
                                <div class="text-xl text-blau flex items-center justify-between">
                                    <b><?php echo e(__('DOCUMENTS ADICIONALS')); ?></b>
                                    <button class="text-xs" type="button" onclick="downloadAllFiles()">Descarregar tots</button>
                                </div>
                                <div class="py-4">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $post->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(\Storage::url($document->path)); ?>" target="_blank" data-name="<?php echo e($document->name); ?>"
                                            class="flex items-center p-2 py-2 mb-2 text-sm text-gray-600 border border-gray-500 rounded hover:bg-gray-200 bg-gray-50 file-download">
                                            <div class="pr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                </svg>
                                            </div>
                                            <?php echo e($document->name); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($post->user): ?>
                            <div class="mt-8 p-4 bg-white shadow rounded">
                                <div class="text-xl text-blau">
                                    <b><?php echo e(__('INFORMACIÓ DE L\'AUTOR')); ?></b>
                                </div>
                                <div class="mt-2 text-gray-700">
                                    <!-- Nombre del autor y enlace al perfil -->
                                    <p>
                                        <a href="<?php echo e(route('profile-page', $post->user)); ?>" class="text-indigo-600 font-semibold hover:underline">
                                            <?php echo e($post->user->name); ?> <?php echo e($post->user->surnames); ?>

                                        </a>
                                    </p>
                                    <!-- Cargo y Organización del autor -->
                                    <p><?php echo e($post->user->charge); ?> - <?php echo e($post->user->entity); ?></p>
                                    <!-- Ciudad y País del autor -->
                                    <p><?php echo e($post->user->city); ?>, <?php echo e($post->user->country); ?></p>
                                </div>
                            </div>
                            <br>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if($post->links): ?>
                            <div class="mt-8">
                                <div class="text-xl text-blau flex items-center justify-between">
                                    <b><?php echo e(__('LINKS')); ?></b>
                                </div>
                                <div class="py-4">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $post->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($link['link']); ?>" target="_blank"
                                            class="flex items-center p-2 py-2 mb-2 text-sm text-gray-600 border border-gray-500 rounded hover:bg-gray-200 bg-gray-50 file-download">
                                            <div class="pr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                                </svg>

                                            </div>
                                            <?php echo e($link['name']); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!-- AddToAny BEGIN -->
                        <a class="flex items-center mb-8 text-blau a2a_dd" href="https://www.addtoany.com/share">
                            <div class="pr-2"><?php if (isset($component)) { $__componentOriginal5f3ec5ba886e1520a1354ec74192e338 = $component; } ?>
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
<?php endif; ?></div><?php echo e(__('Compartir')); ?>

                        </a>
                        <script>
                            var a2a_config = a2a_config || {};
                            a2a_config.onclick = 1;
                            a2a_config.locale = "ca-AD";
                        </script>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->

                        <div id="comments" class="pt-8">
                            
                            <!--[if BLOCK]><![endif]--><?php if($showComments): ?>
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('comments', ['post' => $post]);

$__html = app('livewire')->mount($__name, $__params, 'lw-980071061-0', $__slots ?? [], get_defined_vars());

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
        <div class="mt-4 bg-gray-100 border-t">
            <div class="container px-4 mx-auto">
                <div class="flex items-center justify-between">
                    <div class="text-left  text-blau">
                        <a href="<?php echo e(url()->previous()); ?>"
                            class="flex flex-col items-start text-xs font-semibold">
                            <?php echo e(__('TORNAR ENRERE')); ?>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blau" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6" />
                                <line x1="9" y1="12" x2="25" y2="12" />
                            </svg>



                        </a>
                    </div>
                    
                    
                    <div class="text-right text-blau">
                        <a href="<?php echo e(route('profile-page', $post->user)); ?>"
                            class="flex flex-col items-end text-xs font-semibold">
                            <?php echo e(__('ANAR AL PERFIL')); ?> 
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

$__html = app('livewire')->mount($__name, $__params, 'lw-980071061-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>

            <div class="w-1/4 px-4">
                <?php if(auth()->check()): ?>
                    <nav class="mb-4 bg-white rounded shadow">
                        <ul role="list" class="divide-y" x-data="{ openCollections: false }">
                            <?php if(auth()->id() == $post->user_id): ?>
                                <li>
                                    <a class="flex items-center px-4 py-3 text-base font-bold text-white bg-black "
                                        href="<?php echo e(route('project.edit', [$post->user, $post])); ?>" wire:navigate>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        Edit project</a>
                                </li>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <li>
                                <a href="#comments"
                                    class="flex items-center px-4 py-3 text-base font-bold text-black ">
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
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
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
                                            <button type="button"
                                                wire:click='toggleCollection(<?php echo e($collection->id); ?>)'
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

$__html = app('livewire')->mount($__name, $__params, 'lw-980071061-2', $__slots ?? [], get_defined_vars());

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
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
    });




    function downloadWithDelay(link, delay) {
        setTimeout(() => {
            const url = link.getAttribute('href');
            const filename = link.getAttribute('data-name');

            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }, delay);
    }


    function downloadAllFiles() {
        // Seleccionar todos los enlaces con la clase 'download-file'
        const downloadLinks = document.querySelectorAll('a.file-download');

        // Iterar sobre cada enlace y simular un clic para iniciar la descarga
        downloadLinks.forEach((link, index) => {
            downloadWithDelay(link, index * 500); // Retraso de 1 segundo entre descargas
        });
    }
</script>
</div>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/post-page.blade.php ENDPATH**/ ?>