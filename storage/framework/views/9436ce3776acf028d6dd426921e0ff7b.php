<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="flex">
        <div class="w-1/4">
            <div class="flex flex-col items-center justify-center">
                <img src="#" class="w-32 h-32 rounded-full">
                <h2 class="mt-1 font-semibold leading-tight text-gray-800 text-xxl">
                    <?php echo e($username); ?>

                </h2>
                <div class="flex">
                    <a href="/<?php echo e($username); ?>/followers" class="mr-1 link-primary">Followers</a>
                    <a href="/<?php echo e($username); ?>/following" class="link-primary">Following</a>
                </div>
            </div>
        </div>
        <div class="w-3/4">



            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('feed', ['username' => $username]);

$__html = app('livewire')->mount($__name, $__params, 'LHlhr3Y', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/marc/Code/scjtactile/resources/views/user-page.blade.php ENDPATH**/ ?>