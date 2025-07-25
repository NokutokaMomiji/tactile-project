<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['selected' => false, 'variant' => 'default']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['selected' => false, 'variant' => 'default']); ?>
<?php foreach (array_filter((['selected' => false, 'variant' => 'default']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $colors = [
        'default' => $selected ? 'bg-groc' : 'bg-white',
        'create' => 'bg-blue-500 hover:bg-blue-600 text-white'
    ];
    $color = $colors[$variant] ?? $colors['default'];
?>

<a
    <?php echo e($attributes->merge(['class' =>  $color . ' flex items-center justify-center py-1 px-2 border border-black rounded-full uppercase text-sm'])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH D:\dev\temp\projects\resources\views/components/buttons/link-primary.blade.php ENDPATH**/ ?>