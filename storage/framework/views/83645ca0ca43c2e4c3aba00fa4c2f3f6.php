<div class="p-4 bg-white rounded-lg">
    <div class="text-center">
        <a href="<?php echo e(route('profile-page', $user)); ?>"><img src="<?php echo e($user->featured_image); ?>"
                class="w-32 h-32 mx-auto rounded-full"></a>
        <a href="<?php echo e(route('profile-page', $user)); ?>">
            <h2 class="mt-1 text-2xl font-semibold "><?php echo e($user->name); ?>

                <?php echo e($user->surnames); ?>

            </h2>
        </a>

        <div class="text-gray-500">@ <?php echo e($user->username); ?></div>

        <div class="text-gray-900"><?php echo e($user->entity); ?> | <?php echo e($user->charge); ?></div>

        <div class="my-4 text-sm text-gray-900"><?php echo e($user->reason); ?></div>

        <div class="flex space-x-2">
            <a href="/<?php echo e($user->username); ?>/followers" class="w-1/2 py-2 text-white rounded bg-sky-600">Followers</a>
            <a href="/<?php echo e($user->username); ?>/following" class="w-1/2 py-2 text-white rounded bg-sky-600">Following</a>
        </div>
    </div>
</div>
<?php /**PATH /Users/marc/Code/scjtactile/resources/views/partials/sidebar-user.blade.php ENDPATH**/ ?>