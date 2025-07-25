<div x-data="{ showCommentForm: true }">
    <div class="flex justify-between">
        <h4 class="font-bold">{{ __('Comentaris') }}</h4>
        {{-- @if (!$this->message && auth()->check())
            <x-primary-button x-on:click="showCommentForm = ! showCommentForm">{{ __('DEIXAR UN COMENTARI') }}</x-primary-button>
        @endif --}}
    </div>
    @if (!$this->message && auth()->check())
    @if (!$this->message)
        <div x-show="showCommentForm" class="mb-8" x-transition>
            <textarea class="h-24 w-full" wire:model="body" placeholder="{{__('Introdueix el teu comentari a aqui...')}}" rows="8"
                class="w-full mt-4 border-gray-300 rounded-md"></textarea>
            <div class="flex items-center justify-between">
                <x-primary-button wire:click='publish'>{{ __('PUBLICAR COMENTARI') }}</x-primary-button>
                <x-secondary-button x-on:click="showCommentForm = ! showCommentForm">{{ __('CANCELAR') }}</x-secondary-button>
            </div>
        </div>
    @else
        <div class="text-green-500">
            {{ $this->message }}
        </div>
    @endif
    @endif

    <div class="flow-root mt-4">
        <ul role="list" class="-mb-8">
            @foreach ($comments as $comment)
                <li>
                    <div class="relative pb-8">
                        <div class="relative flex items-start space-x-3">
                            <div class="relative">
                                <img class="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full ring-2 ring-white"
                                    src="{{ $comment->user->featured_image }}" alt="">
                            </div>
                            <div class="flex-1 min-w-0 p-4 border border-gray-200 rounded-md bg-gray-50">
                                <div>
                                    <div class="text-sm">
                                        <a href="#"
                                            class="font-medium text-gray-900">{{ $comment->user->username }}</a>
                                    </div>
                                    <p class="mt-0.5 text-xs text-gray-500">{{__('Ha comentat')}}
                                        {{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="mt-2 text-sm text-gray-700">
                                    <p>{{ $comment->body }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
