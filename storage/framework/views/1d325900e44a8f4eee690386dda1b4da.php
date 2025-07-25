<a wire:navigate href="<?php echo e(route('post.show', [$post->user, $post])); ?>"
    class="p-5 text-center bg-white border border-gray-500 rounded-xl">
    <div style="background-image: url('<?php echo e(\Storage::url($post->featured_image_path)); ?>')" class="bg-center bg-cover h-52">
    </div>
    <h3 class="py-3 text-xs border-b border-black bg-blauclar">
        <?php echo e($post->user->name); ?> <?php echo e($post->user->surnames); ?> - <?php echo e($post->user->city); ?>

    </h3>
    <h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau"> <?php echo e($post->title); ?></h2>
    <p class="pb-2 text-sm border-b border-black leading-1">
        <?php echo e(\Str::limit(strip_tags($post->body), 60)); ?>

    </p>
    </p>
    <div class="flex items-center justify-between pt-2 text-gray-400">
        <div class="flex items-center ">
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
            <span class="ml-1"><?php echo e($post->likes()->count()); ?></span>
        </div>
        <div class="flex items-center">
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
            <span class="ml-1"><?php echo e($post->comments()->count()); ?></span>
        </div>
        <div class="flex items-center">
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
        </div>
        <div class="flex items-center">
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
    </div>
</a>
<?php /**PATH /Users/marc/Code/scratch/resources/views/partials/post-snippet.blade.php ENDPATH**/ ?>