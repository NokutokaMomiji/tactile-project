<a wire:navigate href="{{ route('post.show', [ $post]) }}"
    class="p-5 text-center bg-white border border-gray-500 rounded-xl" 
    style="display: flex;flex-direction: column;justify-content: space-between">
    <div style="background-image: url('{{ \Storage::url($post->featured_image_path) }}')" class="bg-cover h-52">
    </div>
    <h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau"> {{ $post->title }}</h2>
    <h3 class="py-3 text-xs border-b border-black bg-blauclar">
        {{ $post->user->name }} {{ $post->user->surnames }} - {{ $post->user->city }}
    </h3>
    {{-- <p class="pb-2 text-sm border-b border-black leading-1 overflow-hidden">
        {!! \Str::limit(strip_tags($post->body), 60) !!}
    </p> --}}
    <div class="flex items-center justify-between pt-2 text-gray-400">
        {{-- <div class="flex items-center ">
            <x-icons.like />
            <span class="ml-1">{{ $post->likes()->count() }}</span>
        </div> --}}
        <div class="flex items-center">
            <x-icons.comment />
            <span class="ml-1">{{ $post->comments()->count() }}</span>
        </div>
        <div class="flex items-center {{ auth()->check() &&auth()->user()->favorites()->where('post_id', $post->id)->exists()? 'text-groc': 'text-gray-400' }}">
            <x-icons.fav />
        </div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <ellipse cx="12" cy="12" rx="10" ry="8" fill="none" />
                <ellipse cx="12" cy="12" rx="2" ry="2" fill="grey"/>
            </svg>
            <span class="ml-1">{{ $this->getViewCount($post->id) }}</span>
        </div>
    </div>
</a>
