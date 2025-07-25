
<div>
    <div class="border-t-4 bg-blau border-groc">
        <div class="container flex items-center justify-between h-24 px-4 mx-auto text-white">
            <div class="flex items-center text-2xl font-bold uppercase">
                <!--[if BLOCK]><![endif]--><?php if(auth()->check() && auth()->id() == $user->id): ?>
                    <?php echo e(__('HOLA')); ?>, <?php echo e($user->name); ?>

                <?php else: ?>
                    <?php echo e($user->name); ?> <?php echo e($user->surnames); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div>
                <!--[if BLOCK]><![endif]--><?php if($isSubscribed): ?>
                    <button id="desuscribir" wire:click="unsubscribeFromMailchimp" class="btn btn-danger">Desuscribirse al newsletter</button>
                <?php else: ?>
                    <button id="suscribir" wire:click="subscribeToMailchimp" class="btn btn-success">Suscribirse al newsletter</button>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <div id="mensaje"></div>
            </div>
            <script>
                function showMessage(string) {
                    document.getElementById('mensaje').innerHTML = string;

                    setTimeout(function () {
                        document.getElementById('mensaje').innerHTML = ''; 
                    }, 5000);
                }

                window.onload = function() {
                    document.getElementById("suscribir")?.addEventListener("click", function(event) {
                        event.preventDefault(); 
                        showMessage("Se ha suscrito correctamente");
                    });

                    document.getElementById("desuscribir")?.addEventListener("click", function(event) {
                        event.preventDefault(); 
                        showMessage("Se ha desuscrito correctamente");
                    });
                };
                
                // Escuchar el evento de Livewire y cambiar el texto del botón
                Livewire.on('subscriptionUpdated', isSubscribed => {
                    if (isSubscribed) {
                        document.getElementById("suscribir").style.display = "none";
                        document.getElementById("desuscribir").style.display = "block";
                    } else {
                        document.getElementById("suscribir").style.display = "block";
                        document.getElementById("desuscribir").style.display = "none";
                    }
                });
            </script>
        
            <div class="uppercase">
                <!--[if BLOCK]><![endif]--><?php if(auth()->check() && auth()->id() == $user->id): ?>
                    <a href="/project/create"><?php echo e(__('CREAR NOU PROJECTE')); ?></a>
                <?php else: ?>
                    <?php echo e($user->city); ?>

                    <!--[if BLOCK]><![endif]--><?php if($user->country): ?>
                        , <?php echo e($user->country); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
   <script>
   document.title = "<?php echo e($user->name); ?> | Scracht Tactile";
   
   </script> 
   
        <div class="border-b-4 bg-blauclar border-groc">
            <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
                <div class="w-full md:w-3/4">
                    <div class="flex flex-wrap gap-2 py-4 ">
                        <div class="w-40 px-2">
                        <?php if (isset($component)) { $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-primary','data' => ['href' => ''.e(route('profile-page', $user)).'','selected' => ''.e(! $this->filter).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('profile-page', $user)).'','selected' => ''.e(! $this->filter).'']); ?><?php echo e(__('TOTS')); ?> <?php echo $__env->renderComponent(); ?>
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
                          <div class="w-40 px-2">
                                
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

        <div class="bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full">


                        <div class="my-4 text-3xl text-center text-gray-900"><?php echo e(__('PROJECTES')); ?></div>
                        <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('partials.post-snippet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if(auth()->id() == $user->id): ?>
            <div class="bg-gray-100 py-4 border-t-4 border-groc border-b-4">
                 <div class="container px-4 mx-auto" x-data="{ addingCollection: false }">
                        <div class="mt-4 text-3xl text-center text-gray-900 flex items-center justify-center"><?php echo e(__('COLLECCTIONS')); ?><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 duration-150 cursor-pointer ml-2"
                                :class="addingCollection ? 'rotate-45' : 'rotate-0'"
                                x-on:click="addingCollection = ! addingCollection">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg></div>
                            <div x-show="addingCollection" x-transition style="width: 300px" class="mx-auto">
                                <form wire:submit="addCollection" class=" flex px-2 items-center py-2 mx-auto justify-center">
                                    <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'text','name' => 'newpost','placeholder' => 'Collection name...','id' => 'newpost','wire:model' => 'collectionName']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'newpost','placeholder' => 'Collection name...','id' => 'newpost','wire:model' => 'collectionName']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['type' => 'submit','xOn:click' => 'addingCollection = false','class' => 'inline-block ml-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','x-on:click' => 'addingCollection = false','class' => 'inline-block ml-2']); ?>Save <?php echo $__env->renderComponent(); ?>
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
                            <div class="flex flex-wrap bg-gray-100 justify-center mt-4">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $user->collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('collection-page', [$user, $collection])); ?>" class="bg-white mr-4 p-2 rounded-full px-4 border border-black hover:bg-gray-100"><?php echo e($collection->name); ?></a>   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            
                    </div>
                    
                </div>  
            </div>
            
            
            
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
            
            <div class=" py-4">
                 <div class="container px-4 mx-auto" x-data="{ addingCollection: false }">
                        <div class="mt-4 text-3xl text-center text-gray-900 flex items-center justify-center"><?php echo e(__('FAVORITES')); ?></div>
                    
                    
                    <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $user->favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('partials.post-snippet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->    
                                </div>   
                </div>  
            </div>
                   
              
        </div>
    
</div>
<?php /**PATH /opt/lampp/htdocs/projects/resources/views/livewire/profile-page.blade.php ENDPATH**/ ?>