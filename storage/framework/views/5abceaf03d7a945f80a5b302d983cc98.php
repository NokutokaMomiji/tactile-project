<div>
    <!-- __BLOCK__ --><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="px-4 ">
            <a href="/<?php echo e($user->username); ?>"><h2><?php echo e($user->username); ?></h2></a>
        </div>
        <hr class="py-3 w-auto m-auto">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
</div>
<?php /**PATH /Users/marc/Code/scjtactile/resources/views/livewire/user-list.blade.php ENDPATH**/ ?>