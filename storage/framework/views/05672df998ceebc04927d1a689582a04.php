<div>
    <a wire:navigate href="<?php echo e(route('post.show', [$post->user, $post])); ?>" class="flex flex-col bg-white rounded">
        <img src="<?php echo e(\Storage::url($post->featured_image_path)); ?>" class="rounded-t">
        <div class="relative flex justify-between px-4 py-2 bg-indigo-100">
            <div class="text-sm text-gray-600"><?php echo e('@' . $post->user->username); ?></div>
            <div class="text-xs italic">
                <?php echo e($post->created_at->diffForHumans()); ?></div>
        </div>
        <div class="p-4">

            <?php echo e($post->title); ?>

        </div>
    </a>
</div>
<?php /**PATH /var/www/vhosts/piscastudio.com/scratch.piscastudio.com/resources/views/partials/post-snippet.blade.php ENDPATH**/ ?>