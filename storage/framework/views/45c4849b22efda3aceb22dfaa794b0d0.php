<div x-data="{ showCommentForm: false }">
    <div class="flex justify-between">
        <h4 class="text-xl font-bold">Comments</h4>
        <!-- __BLOCK__ --><?php if(! $this->message): ?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['xOn:click' => 'showCommentForm = ! showCommentForm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'showCommentForm = ! showCommentForm']); ?>Leave a comment <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        <?php endif; ?> <!-- __ENDBLOCK__ -->
    </div>
	<!-- __BLOCK__ --><?php if(! $this->message): ?>
    <div x-show="showCommentForm" class="mb-8" x-transition>
        <textarea wire:model="body" placeholder="Your comment here..." rows="8" class="w-full mt-4 border-gray-300 rounded-md"></textarea>
        <div class="flex items-center justify-between">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['wire:click' => 'publish']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'publish']); ?>Publish comment <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => 'showCommentForm = ! showCommentForm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'showCommentForm = ! showCommentForm']); ?>Cancel <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    	<div class="text-green-500">
    	<?php echo e($this->message); ?>

    	</div>
    <?php endif; ?> <!-- __ENDBLOCK__ -->

    <div class="flow-root mt-4">
        <ul role="list" class="-mb-8">
            <!-- __BLOCK__ --><?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="relative pb-8">
                        <div class="relative flex items-start space-x-3">
                            <div class="relative">
                                <img class="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full ring-2 ring-white"
                                    src="<?php echo e($comment->user->featured_image); ?>"
                                    alt="">
                            </div>
                            <div class="flex-1 min-w-0 p-4 bg-white rounded-md">
                                <div>
                                    <div class="text-sm">
                                        <a href="#" class="font-medium text-gray-900"><?php echo e($comment->user->username); ?></a>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">Commented <?php echo e($comment->created_at->diffForHumans()); ?></p>
                                </div>
                                <div class="mt-2 text-sm text-gray-700">
                                    <p><?php echo e($comment->body); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
        </ul>
    </div>
</div>
<?php /**PATH /var/www/vhosts/piscastudio.com/scratch.piscastudio.com/resources/views/livewire/comments.blade.php ENDPATH**/ ?>