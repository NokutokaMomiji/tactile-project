<div>
    <form wire:submit="createPost" class="container px-5 py-4 mb-10">
        <x-textarea rows="5" type="text" name="newpost" id="newpost"
            wire:model="newPostBody" />

        {{-- <textarea name="newpost" id="newpost" rows="5" wire:model="newPostBody" class="flex w-100 mt-2 mb-2 rounded" placeholder="What are you thinking?"></textarea> --}}
        <x-primary-button type="submit" class="mt-3 float-right mb-3">Post</x-secondary-button>
        {{-- <button type="submit" class="btn btn-primary float-right mb-4" ></button> --}}
    </form>
</div>
