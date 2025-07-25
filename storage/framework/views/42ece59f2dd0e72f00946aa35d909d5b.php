<div class="w-full max-w-full prose rounded-md shadow-sm" x-data="{
    value: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?>,
    isFocused() { return document.activeElement !== this.$refs.trix },
    setValue() { this.$refs.trix.editor ? this.$refs.trix.editor.loadHTML(this.value) : '' },
}" x-init="setValue();
$watch('value', () => isFocused() && setValue())"
    x-on:trix-change="value = $event.target.value" <?php echo e($attributes->whereDoesntStartWith('wire:model')); ?> wire:ignore>
    <input id="x<?php echo e($attributes->whereDoesntStartWith('wire:model')); ?>" type="hidden">
    <trix-editor x-ref="trix" input="x<?php echo e($attributes->whereDoesntStartWith('wire:model')); ?>"
        class="block w-full transition duration-150 ease-in-out border-gray-300 rounded-md form-textarea"
        style="min-height: 100px" placeholder=""></trix-editor>
</div>
<?php /**PATH /var/www/vhosts/piscastudio.com/scratch.piscastudio.com/resources/views/components/rich-text-editor.blade.php ENDPATH**/ ?>