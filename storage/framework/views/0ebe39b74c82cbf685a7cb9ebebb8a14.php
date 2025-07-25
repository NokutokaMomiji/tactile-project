<div>
    <div class="border-t-4 bg-blau border-groc">
        <div class="container flex items-center justify-between h-24 px-4 mx-auto text-white">
            <div class="flex items-center text-2xl font-bold uppercase">

               
                <!--[if BLOCK]><![endif]--><?php if(auth()->check() && auth()->id() == $user->id): ?>
                    <?php echo e(__('HOLA')); ?>, <?php echo e($user->name); ?>

                <?php else: ?>
                    <a href="/<?php echo e($user->username); ?>"><?php echo e($user->name); ?> <?php echo e($user->surnames); ?></a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
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
    
    <!--[if BLOCK]><![endif]--><?php if($this->posts->count()): ?>
        

        <div class="bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full">


                        <div class="my-4 text-3xl text-center text-gray-900"><?php echo e($this->collection->name); ?></div>
                        <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('partials.post-snippet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>
            </div>
            
           
                   
              
        </div>
    <?php else: ?>
        <div class="py-12 text-center bg-white">
            <?php echo e(__('Aquesta col·lecció no té projectes.')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/collection-page.blade.php ENDPATH**/ ?>