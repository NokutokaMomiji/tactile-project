<div class="w-full max-w-full prose rounded-md shadow-sm" x-data="{
    value: @entangle($attributes->wire('model')),
    isFocused() { return document.activeElement !== this.$refs.trix },
    setValue() { this.$refs.trix.editor ? this.$refs.trix.editor.loadHTML(this.value) : '' },
}" x-init="setValue();
$watch('value', () => isFocused() && setValue())"
    x-on:trix-change="value = $event.target.value" {{ $attributes->whereDoesntStartWith('wire:model') }} wire:ignore>
    <input id="x{{ $attributes->whereDoesntStartWith('wire:model') }}" type="hidden">
    <trix-editor x-ref="trix" input="x{{ $attributes->whereDoesntStartWith('wire:model') }}"
        class="block w-full transition duration-150 ease-in-out border-gray-300 rounded-md form-textarea"
        style="min-height: 100px" placeholder=""></trix-editor>
</div>
