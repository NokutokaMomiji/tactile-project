<div>
    <style>
        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 24px;
            margin-left: 2px;
        }

        .swiper-button-prev:after {
            margin-left: -2px;
        }

        .swiper-button-prev, .swiper-button-next {
            color: white ! important;
            background: rgba(0,0,0,0.7);
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        #abeja {
            width: 80%;
        }


        @media (max-width: 1300px) {
            #abeja {
                width: 90%;
            }

        }
        @media (max-width: 760px) {
           #sota {
            flex-direction: column;
           }
           #abeja {
            margin-left: 5vw;
            width: 180%;
           }
        }

    </style>
    <script>
        document.title = "{{ $post->title  }} | Scratch Tactile" ;
        </script>
    @if ($post->is_restricted == 2)
        <div class="bg-red-500 text-white text-center py-2">
            Aquest post està moderat. Només el pots veure perquè ets administrador.
        </div>
    @endif
    <div class= "bg-groc">
        <div class="container flex items-center justify-between px-4 py-4 mx-auto">
            <div class="flex items-center">
                <div class="text-white">
<div class="text-3xl">
<b id="translatedTitle" style="display: block;">
                                {!! $translatedTitle !!}
    </b>
                            <b id="originalTitle" style="display: none;">
                                {!! $post->title !!}
    </b>
</div>
                    <div class="text-lg">
                        By <a href="{{ route('profile-page', $post->user) }}" class="underline text-white">{{ $post->user->name }} {{ $post->user->surnames }}</a>
                    </div>
                    <div class="text-lg"> 
                        {{ __('Data de creació:')}} {{ \Carbon\Carbon::create($post->updated_at)->format('Y M d')}}
                    </div>

                    <div class="mt-1">
                        @foreach($post->categories as $category)
                            {{-- <a href="/home?filter={{ $category->slug }}" class="text-white bg-blau rounded-full px-4 py-1  text-sm">{{ $category->name }}</a> --}}
                            <a href="/home?filter={{ $category->slug }}" class="text-white bg-blau rounded-full px-4 py-1 text-sm">
                                {{ __('' . $category->name) !== $category->name ? __('' . $category->name) : $category->name }}
                            </a>
                        @endforeach    
                    </div>



                </div>
            </div>

            <div class="text-xl text-white">
                @if (auth()->check() && (auth()->id() == $post->user_id || auth()->user()->is_admin))
                    <a href="{{ route('project.edit', [$post->user, $post]) }}" class="flex items-center ml-4 text-white">
                        <x-icons.edit />
                        <span class="text-sm">{{ __('modificar') }}</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div id="abeja" class="mx-auto">
            @if (session('message'))
                <div class="p-4 text-green-800 bg-green-100 border border-green-600 rounded my-4">
                    {{ session('message') }}
                </div>
            @endif
            <div id="sota" class="flex flex-wrap -mx-4">
                <div class="w-1/2 px-4">
                    <div class="bg-white">
                        <div class="swiper big-slides">
                            <div class="swiper-wrapper">



                                @if ($this->post->links)
                                    @php
                                        $tinkers = 0;
                                    @endphp
                                    @foreach($this->post->links as $link)
                                        @continue(! \Str::contains($link['link'], 'tinkercad'))

                                        @php
                                            $iframe = preg_replace_callback(
                                            '/https:\/\/www\.tinkercad\.com\/things\/([a-zA-Z0-9]+)(?:-[a-zA-Z0-9-]+)?/',
                                                   function ($matches) {
                                                       $id = $matches[1];
                                                       $iframe = '<iframe width="725" height="453" src="https://www.tinkercad.com/embed/' . $id . '?editbtn=1" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>';
                                                       return $iframe;
                                                   },
                                                   $link['link']
                                               );
                                              $tinkers++;
                                        @endphp
                                            <div class="swiper-slide">{!! $iframe !!}</div>

                                    @endforeach




                                @endif

                                @foreach ($post->images as $image)
                                    <div class="swiper-slide"><img src="{{ \Storage::url($image->path) }}"
                                            loading="lazy">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev" style="color: white ! important"></div>
                            <div class="swiper-button-next" style="color: white ! important"></div>
                        </div>
                        <div thumbsSlider="" class="mt-3 swiper thumbs">
                            <div class="swiper-wrapper">
                                @isset($tinkers)
                                @for($i = 0; $i < $tinkers; ++$i)
                                    <div class="opacity-50 cursor-pointer swiper-slide"><img
                                    src="/img/tinker.png" loading="lazy"></div>
                                @endfor
                                @endisset
                                @foreach ($post->images as $image)
                                    <div class="opacity-50 cursor-pointer swiper-slide"><img
                                            src="{{ \Storage::url($image->thumbnail_path) }}" loading="lazy"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-start w-1/2 pt-6 pr-4">
                    <div class="pl-4">
                        <div class="mb-4">
                            <button type="button" title="Like post"
                                class="{{ auth()->check() &&auth()->user()->likes()->exists($this->post)? 'text-groc': 'text-gray-400' }}"
                                 wire:click="toggleLike()">
                                <x-icons.like />
                                {{ $this->post->likes->count() }}
                            </button>
                        </div>
                        <div class="mb-4">
                            <button wire:click="toggleComments()" title="Show comments" class="text-gray-400"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <ellipse cx="12" cy="12" rx="10" ry="8" fill="none" />
                                    <ellipse cx="12" cy="12" rx="2" ry="2" fill="grey"/>
                                </svg>

                                {{ $this->getViewCount() }}
                            </button>
                        </div>
                        <div class="mb-4">
                            <button
                                class="{{ auth()->check() &&auth()->user()->favorites()->where('post_id', $post->id)->exists()? 'text-groc': 'text-gray-400' }}"
                                type="button" title="Add to favorites" wire:click='toggleFavorite()'>
                                <x-icons.fav />
                            </button>
                        </div>
                        @if (auth()->check())
                            <div class="relative mb-4" x-data="{ openCollections: false }"
                                x-on:click.away="openCollections = false">
                                <button type="button" x-on:click="openCollections = ! openCollections"
                                    class="text-gray-400" title="Add to collection">
                                    <x-icons.collection />
                                </button>
                                <ul x-show="openCollections"
                                    class="absolute bg-white border border-gray-100 divide-y rounded shadow-lg w-60">
                                    @foreach (auth()->user()->collections as $collection)
                                        <li class="text-xs">
                                            <button type="button" wire:click='toggleCollection({{ $collection->id }})'
                                                class="flex items-center px-4 py-3 pl-4 text-sm font-semibold text-indigo-600 ">

                                                {{-- Mirem si el post pertany a la col·lecció --}}
                                                @if (!!$collection->posts()->where('post_id', $post->id)->count())
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="mr-2 size-4">
                                                        <path fill-rule="evenodd"
                                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="mr-2 size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                    </svg>
                                                @endif
                                                {{ $collection->name }}
                                            </button>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div>
                            {{-- <a class="text-gray-400 a2a_dd" href="https://www.addtoany.com/share" onclick="copyToClipboard(event)"> --}}
                                <a class="text-gray-400" href="https://www.addtoany.com/share" onclick="copyToClipboard(event)">
                                <div class="pr-2"><x-icons.share /></div>
                            </a>
                            <script>
                                var a2a_config = a2a_config || {};
                                a2a_config.onclick = 1;
                                a2a_config.locale = "ca-AD";

                                function copyToClipboard(event) {
                                    event.preventDefault();

                                    var textToCopy = 'https://projects.tactilejr.org/project/' + {{ $post->id }};
                                    navigator.clipboard.writeText(textToCopy).then(() => {

                                        var messageElement = document.createElement('div');
                                        messageElement.textContent = 'Copiado!';
                                        messageElement.classList.add('text-black-500');

                                        var rect = event.target.getBoundingClientRect();
                                        messageElement.style.position = 'absolute';
                                        messageElement.style.left = (rect.left + rect.width / 2 - 35) + 'px';
                                        messageElement.style.top = rect.top + window.scrollY + 25 + 'px'; 

                                        document.body.appendChild(messageElement);

                                        setTimeout(() => {
                                            messageElement.remove();
                                        }, 1000);
                                    }).catch(err => {
                                        console.error('Error al copiar al portapapeles: ', err);
                                    });
                                }
                            </script>
                        </div>


                    </div>
                    <div class="w-full ml-4">
                        <div class="text-xl text-blau">
                            <b>{{__('DESCRIPCIÓ')}}</b>
                        </div>
                        <div>
                        <div class="py-4 prose">
                            <div id="translatedBody" style="display: block;">
                                {!! $translatedBody !!}
                            </div>
                            <div id="originalBody" style="display: none;">
                                {!! $post->processedBody !!}
                            </div>


                        </div>

                        <style>
                            button.text-xs {
                                position: relative;
                                cursor: pointer;
                                background: none;
                                border: none;
                                color: #007bff;
                                font-size: 16px;
                                padding: 5px;
                            }

                            .tooltip-text {
                                visibility: hidden;
                                position: absolute;
                                top: 100%;
                                left: 50%;
                                transform: translateX(-50%);
                                background-color: rgba(0, 0, 0, 0.75);
                                color: #fff;
                                padding: 5px;
                                border-radius: 4px;
                                font-size: 12px;
                                white-space: normal;
                                width: 300px;
                                z-index: 10;
                                opacity: 0;
                                transition: opacity 0.3s;
                            }

                            button.text-xs:hover .tooltip-text {
                                visibility: visible;
                                opacity: 1;
                            }
                        </style>

                        <script>
                            function toggleTranslation() {
                                const translatedTitle = document.getElementById('translatedTitle');
                                const originalTitle = document.getElementById('originalTitle');

                                const translatedBody = document.getElementById('translatedBody');
                                const originalBody = document.getElementById('originalBody');

                                if (translatedBody && originalBody && translatedTitle && originalTitle) {
                                    // Alternar la visibilidad del contenido traducido y original
                                    if (translatedBody.style.display === 'none') {
                                        translatedBody.style.display = 'block';
                                        originalBody.style.display = 'none';

                                        translatedTitle.style.display = 'block';
                                        originalTitle.style.display = 'none';
                                    } else {
                                        translatedBody.style.display = 'none';
                                        originalBody.style.display = 'block';

                                        translatedTitle.style.display = 'none';
                                        originalTitle.style.display = 'block';
                                    }
                                }
                            }
                        </script>



                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        @if ($post->documents->count())
                            <div class="mt-8">
                                <div class="text-xl text-blau flex items-center justify-between">
                                    <b>{{__('DOCUMENTS ADICIONALS')}}</b>
                                    <button class="text-xs" type="button" onclick="downloadAllFiles()">Descarregar tots</button>
                                </div>
                                <div class="py-4">
                                    @foreach ($post->documents as $document)
                                        <a href="{{ \Storage::url($document->path) }}" target="_blank" data-name="{{ $document->name }}"
                                            class="flex items-center p-2 py-2 mb-2 text-sm text-gray-600 border border-gray-500 rounded hover:bg-gray-200 bg-gray-50 file-download">
                                            <div class="pr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                                </svg>
                                            </div>
                                            {{ $document->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($post->user)
                            <div class="mt-8 p-4 bg-white shadow rounded">
                                <div class="text-xl text-blau">
                                    <b>{{__('INFORMACIÓ DE L\'AUTOR')}}</b>
                                </div>
                                <div class="mt-2 text-gray-700">
                                    <!-- Nombre del autor y enlace al perfil -->
                                    <p>
                                        <a href="{{ route('profile-page', $post->user) }}" class="text-indigo-600 font-semibold hover:underline">
                                            {{ $post->user->name }} {{ $post->user->surnames }}
                                        </a>
                                    </p>
                                    <!-- Cargo y Organización del autor -->
                                    <p>{{ $post->user->charge }} - {{ $post->user->entity }}</p>
                                    <!-- Ciudad y País del autor -->
                                    <p>{{ $post->user->city }}, {{ $post->user->country }}</p>
                                </div>
                            </div>
                            <br>
                        @endif

                        @if ($post->links)
                            <div class="mt-8">
                                <div class="text-xl text-blau flex items-center justify-between">
                                    <b>{{__('LINKS')}}</b>
                                </div>
                                <div class="py-4">
                                    @foreach ($post->links as $link)
                                        <a href="{{ $link['link'] }}" target="_blank"
                                            class="flex items-center p-2 py-2 mb-2 text-sm text-gray-600 border border-gray-500 rounded hover:bg-gray-200 bg-gray-50 file-download">
                                            <div class="pr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                                </svg>

                                            </div>
                                            {{ $link['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- AddToAny BEGIN -->
                        <a class="flex items-center mb-8 text-blau a2a_dd" href="https://www.addtoany.com/share">
                            <div class="pr-2"><x-icons.share /></div>{{__('Compartir')}}
                        </a>
                        <script>
                            var a2a_config = a2a_config || {};
                            a2a_config.onclick = 1;
                            a2a_config.locale = "ca-AD";
                        </script>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->

                        <div id="comments" class="pt-8">
                            {{-- <div>
                                @if ($this->showComments)
                                    <button class="text-sm underline" type="button" wire:click="toggleComments()">
                                        {{__('AMAGA ELS COMENTARIS')}}
                                    </button>
                                @endif
                            </div> --}}
                            @if ($showComments)
                                <livewire:comments :$post>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 bg-gray-100 border-t">
            <div class="container px-4 mx-auto">
                <div class="flex items-center justify-between">
                    <div class="text-left  text-blau">
                        <a href="{{ url()->previous() }}"
                            class="flex flex-col items-start text-xs font-semibold">
                            {{__('TORNAR ENRERE')}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blau" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6" />
                                <line x1="9" y1="12" x2="25" y2="12" />
                            </svg>



                        </a>
                    </div>
                    {{-- <div class="py-5">
                        <div>
                            <b>{{ $post->user->name }} {{ $post->user->surnames }}</b>
                        </div>
                        {{ $post->user->city }}
                        @if ($post->user->country)
                            , {{ $post->user->country }}
                        @endif
                    </div> --}}
                    {{-- <div class="pl-24 text-blau">
                        <b>{{ $translatedTitle }}</b>
                    </div> --}}
                    <div class="text-right text-blau">
                        <a href="{{ route('profile-page', $post->user) }}"
                            class="flex flex-col items-end text-xs font-semibold">
                            {{__('ANAR AL PERFIL')}} 
                            <x-icons.arrow />
                        </a>
                    </div>
                </div>

            </div>
        </div>

        @if (0)
            <div id="comments" class="pt-8">
                <livewire:comments :$post>
            </div>

            <div class="w-1/4 px-4">
                @if (auth()->check())
                    <nav class="mb-4 bg-white rounded shadow">
                        <ul role="list" class="divide-y" x-data="{ openCollections: false }">
                            @if (auth()->id() == $post->user_id)
                                <li>
                                    <a class="flex items-center px-4 py-3 text-base font-bold text-white bg-black "
                                        href="{{ route('project.edit', [$post->user, $post]) }}" wire:navigate>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        Edit project</a>
                                </li>
                            @endif
                            <li>
                                <a href="#comments"
                                    class="flex items-center px-4 py-3 text-base font-bold text-black ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                    </svg>
                                    Comment
                                </a>
                            </li>

                            <li>
                                <button wire:click='toggleFavorite()' type="button"
                                    class="flex items-center px-4 py-3 text-base font-bold text-red-600 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                    Add to favorites
                                </button>
                            </li>
                            <li>
                                <button type="button" x-on:click="openCollections = ! openCollections"
                                    class="flex items-center px-4 py-3 text-base font-bold text-indigo-600 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        x-show="! openCollections" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 mr-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        x-show="openCollections" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 mr-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>
                                    Add to collection
                                </button>
                                <ul x-show="openCollections">
                                    @foreach (auth()->user()->collections as $collection)
                                        <li class="text-xs">
                                            <button type="button"
                                                wire:click='toggleCollection({{ $collection->id }})'
                                                class="flex items-center px-4 py-3 pl-4 text-sm font-bold text-indigo-600 ">

                                                {{-- Mirem si el post pertany a la col·lecció --}}
                                                @if (!!$collection->posts()->where('post_id', $post->id)->count())
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6 mr-4">
                                                        <path fill-rule="evenodd"
                                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6 mr-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                    </svg>
                                                @endif
                                                {{ $collection->name }}
                                            </button>

                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <button type="button"
                                    class="flex items-center px-4 py-3 text-base font-bold text-indigo-600 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                    </svg>


                                    Share
                                </button>
                            </li>

                        </ul>
                    </nav>
                @endif


                @livewire('sidebar-user', ['user' => $user])

            </div>
        @endif
    </div>
</div>
<script>
    const thumbs = new Swiper('.thumbs', {
        spaceBetween: 10,
        lazy: true,
        slidesPerView: 6,
        freeMode: true,
        watchSlidesProgress: true,
    });
    const swiper = new Swiper('.big-slides', {
        lazy: true,
        autoHeight: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: thumbs,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
    });




    function downloadWithDelay(link, delay) {
        setTimeout(() => {
            const url = link.getAttribute('href');
            const filename = link.getAttribute('data-name');

            const a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }, delay);
    }


    function downloadAllFiles() {
        // Seleccionar todos los enlaces con la clase 'download-file'
        const downloadLinks = document.querySelectorAll('a.file-download');

        // Iterar sobre cada enlace y simular un clic para iniciar la descarga
        downloadLinks.forEach((link, index) => {
            downloadWithDelay(link, index * 500); // Retraso de 1 segundo entre descargas
        });
    }
</script>
</div>
