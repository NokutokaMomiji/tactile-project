<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['selected' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['selected' => false]); ?>
<?php foreach (array_filter((['selected' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $color = (bool) $selected ? 'bg-groc' : 'bg-white';

?>
<button
    <?php echo e($attributes->merge(['class' => $color . ' flex items-center justify-center py-1 px-2 border border-black  rounded-full hover:bg-groc uppercase text-sm'])); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/components/buttons/primary.blade.php ENDPATH**/ ?>