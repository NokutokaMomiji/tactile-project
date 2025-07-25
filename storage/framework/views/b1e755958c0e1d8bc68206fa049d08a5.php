<a wire:navigate href="<?php echo e(route('post.show', [ $post])); ?>"
    class="p-5 text-center bg-white border border-gray-500 rounded-xl" 
    style="display: flex;flex-direction: column;justify-content: space-between">
    <div style="background-image: url('<?php echo e(\Storage::url($post->featured_image_path)); ?>')" class="bg-cover h-52">
    </div>
    <h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau"> <?php echo e($post->title); ?></h2>
    <h3 class="py-3 text-xs border-b border-black bg-blauclar">
        <?php echo e($post->user->name); ?> <?php echo e($post->user->surnames); ?> - <?php echo e($post->user->city); ?>

    </h3>
    
    <div class="flex items-center justify-between pt-2 text-gray-400">
        
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
        <div class="flex items-center <?php echo e(auth()->check() &&auth()->user()->favorites()->where('post_id', $post->id)->exists()? 'text-groc': 'text-gray-400'); ?>">
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
        </div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <ellipse cx="12" cy="12" rx="10" ry="8" fill="none" />
                <ellipse cx="12" cy="12" rx="2" ry="2" fill="grey"/>
            </svg>
            <span class="ml-1"><?php echo e($this->getViewCount($post->id)); ?></span>
        </div>
    </div>
</a>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/partials/post-snippet.blade.php ENDPATH**/ ?>