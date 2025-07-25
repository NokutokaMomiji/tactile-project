<div class="p-4 bg-white rounded-lg">
    <div class="text-center">
        <a href="{{ route('profile-page', $user) }}"><img src="{{ $user->featured_image }}"
                class="w-32 h-32 mx-auto rounded-full"></a>
        <a href="{{ route('profile-page', $user) }}">
            <h2 class="mt-1 text-2xl font-semibold ">{{ $user->name }}
                {{ $user->surnames }}
            </h2>
        </a>

        <div class="text-gray-500">@ {{ $user->username }}</div>

        <div class="text-gray-900">{{ $user->entity }} | {{ $user->charge }}</div>

        <div class="my-4 text-sm text-gray-900">{{ $user->reason }}</div>

        @if (auth()->check() && auth()->id() != $user->id)
            <x-primary-button wire:click='toggleFollowing' class="justify-center block w-full mb-4">
                {{(!! auth()->user()->following()->where('follower_id', auth()->user()->id)->count()) ? 'Unfollow' : 'Follow' }}
            </x-primary-button>
        @endif
        <div class="flex space-x-2">
            <button type="button" wire:click='showRelations("followers")'
                class="w-1/2 py-2 text-white rounded bg-sky-600">Followers</button>
            <button type="button" wire:click='showRelations("following")'
                class="w-1/2 py-2 text-white rounded bg-sky-600">Following</button>
        </div>
    </div>

    @if ($this->showModal)
        <div class="relative z-10" @keyup.escape="open = false" role="dialog" aria-modal="true"
            x-data="{ open: @entangle('showModal').live }">

            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-25"></div>

            <div class="fixed inset-0 z-10 w-screen p-4 overflow-y-auto sm:p-6 md:p-20">

                <div x-on:click.away="open = false"
                    class="max-w-xl mx-auto overflow-hidden transition-all transform bg-white divide-y divide-gray-100 shadow-2xl rounded-xl ring-1 ring-black ring-opacity-5">

                    <div class="p-4 text-xl font-bold capitalize">{{ $this->type }}</div>
                    <ul class="p-3 overflow-y-auto max-h-96 scroll-py-3" id="options" role="listbox">
                        @foreach ($this->relations as $user)
                            <a href="{{ route('profile-page', $user) }}" class="flex p-3 hover:bg-gray-100"
                                id="option-1" role="option" tabindex="-1">

                                <img src="{{ $user->featured_image }}" class="w-10 h-10 rounded-full">
                                <div class="flex-auto ml-4">
                                    <p class="text-sm font-medium text-gray-700">{{ $user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $user->reason }}</p>
                                </div>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
