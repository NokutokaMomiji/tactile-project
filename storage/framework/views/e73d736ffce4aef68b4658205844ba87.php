<div>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="px-4 ">
            <a href="/<?php echo e($user->username); ?>"><h2><?php echo e($user->username); ?></h2></a>
        </div>
        <hr class="py-3 w-auto m-auto">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/user-list.blade.php ENDPATH**/ ?>