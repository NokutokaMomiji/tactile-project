<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-4E5RQ9Z4NC"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-4E5RQ9Z4NC'); </script>
@php
    $currentUrl = Request::url();  // Obtiene la URL actual
    $langPrefix = '';
    if (App::getLocale() == 'ca') {
        $langPrefix = '/ca';
    } elseif (App::getLocale() == 'en') {
        $langPrefix = '/en';
    } elseif (App::getLocale() == 'es') {
        $langPrefix = '';
    }
@endphp


<div class="bg-blau">
    <div class="w-full h-24"> <!-- Ajustado a h-24 para mayor altura -->
        <div class="container flex items-center justify-between px-4 mx-auto h-24"> <!-- Ajustado a h-24 -->

            <!-- Desktop menu -->
            <div class="hidden md:flex items-center justify-between w-full h-24"> <!-- Ajustado a h-24 -->
                <div class="flex items-center w-2/3 h-full"> <!-- Añadido h-full -->
                    <a href="/home"><img src="/logo.png" alt="logo" class="w-36 mr-11" /></a>
                    <div class="flex h-full"> <!-- Cambiado a h-full -->
                    
                <a href="https://www.scratchjrtactile.org{{ $langPrefix }}/start"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center font-bold 
                        @if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/start') bg-blue-500 font-bold underline @endif
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('COMENÇA') }}
                </a>

                <a href="https://www.scratchjrtactile.org{{ $langPrefix }}/create"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center font-bold
                        @if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/create') bg-blue-500 font-bold underline @endif
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('FES-LO') }}
                        </a>

                    <a href="{{ route('home') }}"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        bg-groc font-bold 
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('EXPLORA') }}
                    </a>

                    <a href="https://www.scratchjrtactile.org{{ $langPrefix }}/learn"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center font-bold
                        @if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/learn') bg-blue-500 font-bold underline @endif
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('ENSENYA') }}
                    </a>

                    @if (auth()->check())
                        <a href="{{ route('profile-page', auth()->user()) }}"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            {{ __('PERFIL') }}
                        </a>
                        <a href="/project/create"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            {{ __('CREAR PROJECTE') }}
                        </a>

                        @if (auth()->user()->is_admin)
                            <a href="/moderation"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                {{ __('MODERAR') }}
                            </a>
                            <a href="/users"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                {{ __('USUARIS') }}
                            </a>
                        @endif
                    @endif
                </div>

                <div class="relative flex flex-col justify-center h-full mt-4"> <!-- Añadido justify-center y h-full -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="border px-3 py-1 text-white text-l mx-2.5 uppercase">
            @if (App::getLocale() == 'ca')
                CATALÀ
            @elseif (App::getLocale() == 'es')
                ESPAÑOL
            @elseif (App::getLocale() == 'en')
                ENGLISH
            @elseif (App::getLocale() == 'de')
                DEUTSCH
            @elseif (App::getLocale() == 'el')
                ΕΛΛΗΝΙΚΑ
            @elseif (App::getLocale() == 'pl')
                POLSKI
            @endif
        </button>

        <div x-show="open" @click.away="open = false" class="absolute mt-2 w-40 bg-white border rounded shadow-lg lengua">
            <ul>
                @if (App::getLocale() != 'ca')
                    <li class="px-3 py-2 hover:bg-gray-100"><a href="/lang?l=ca">CATALÀ</a></li>
                @endif
                @if (App::getLocale() != 'es')
                    <li class="px-3 py-2 hover:bg-gray-100"><a href="/lang?l=es">ESPAÑOL</a></li>
                @endif
                @if (App::getLocale() != 'en')
                    <li class="px-3 py-2 hover:bg-gray-100"><a href="/lang?l=en">ENGLISH</a></li>
                @endif
                @if (App::getLocale() != 'de')
                    <li class="px-3 py-2 hover:bg-gray-100"><a href="/lang?l=de">DEUTSCH</a></li>
                @endif
                @if (App::getLocale() != 'el')
                    <li class="px-3 py-2 hover:bg-gray-100"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                @endif
                @if (App::getLocale() != 'pl')
                    <li class="px-3 py-2 hover:bg-gray-100"><a href="/lang?l=pl">POLSKI</a></li>
                @endif
            </ul>
        </div>
    </div>

    <div class="flex items-center mt-2 ml-3 onoff">
    <div class="switch-button">
        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox" onclick="toggleTranslation()" checked>
        <label for="switch-label" class="switch-button__label"></label>
    </div>

    <p class="text-custom text-white ml-2 cursor-pointer block hover:underline" id="translation-text" onclick="toggleTranslation()">
        <span class="block">{{ __('traduir') }}</span>
        <span class="block">{{ __('contingut') }}</span>

        <span class="hover-message">
            El contenido de la comunidad es traducido automáticamente al idioma seleccionado.
        </span>
    </p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('#switch-label');
        
        const translationTexts = document.querySelectorAll('#translation-text');

        function toggleSwitch(checkbox) {
            checkbox.checked = !checkbox.checked;

            checkbox.parentElement.classList.add('animate-pulse');
            
            setTimeout(() => {
                checkbox.parentElement.classList.remove('animate-pulse');
            }, 300);
        }

        checkboxes.forEach(checkbox => {
            translationTexts.forEach(translationText => {
                translationText.addEventListener('click', function() {
                    toggleSwitch(checkbox);
                });
            });
        });
    });
</script>


</div>
            </div>
                <div class="flex items-center justify-between w-1/3 h-full"> <!-- Añadido h-full -->
                    <div class="w-full">
                        <livewire:search-form />
                    </div>
                    <div class="relative ml-6 flex items-center gap-4 h-full"> <!-- Añadido h-full -->

                    @if (auth()->check())
                        <!-- Botón del usuario -->
                        <div x-data="{ open: false }" class="relative" x-cloak>
                            <button type="button" class="text-white flex items-center" x-on:click="open = ! open">
                                @if (auth()->user()->featured_image)
                                    <div class="bg-cover border-2 border-white rounded-full size-10"
                                        style="background-image: url('{{ auth()->user()->featured_image }}')">
                                    </div>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                @endif
                            </button>

                            <!-- Submenú del usuario -->
                            <div x-show="open"
                                class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ route('profile-page', auth()->user()) }}"
                                        class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                        id="menu-item-0">{{ __('Perfil') }}</a>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="menu-item-1">{{ __('Preferències') }}</a>
                                </div>
                            </div>
                        </div>

                        <!-- Botón de Cerrar Sesión -->
                        <form method="POST" action="{{ route('logout') }}" class="inline-block">
                            @csrf
                            <button type="submit" class="text-white" title="{{ __('Cerrar sesión') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-9a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 4.5 21h9a2.25 2.25 0 0 0 2.25-2.25V15m-3-6h8.25m0 0L18 12m2.25-3L18 6" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <div class="flex ml-4 space-x-4 text-white items-center h-full"> <!-- Añadido h-full -->
                            <a href="/login" class="hover:underline h-full flex items-center" style="text-wrap:nowrap">{{ __('Iniciar sessió') }}</a>
                            <a href="{{ route('age-gate') }}" class="hover:underline h-full flex items-center" style="text-wrap:nowrap">{{ __("Registra't") }}</a>
                        </div>
                    @endif
                </div>
            </div>
            </div>
            
            <!-- Mobile menu -->
            <div class="md:hidden flex items-center h-full text-white justify-center w-full" style="height: 100%;" x-data="{open: false, search: false}" x-cloak>
                <a href="/home"><img src="/logo.png" alt="logo" class="w-36 absolute left-0 ml-2 top-0" /></a>
                    
                
                
                
                

                <div class="absolute right-0 flex space-x-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" x-on:click="search = ! search" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8" x-on:click="open = ! open" x-transition>
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </div>
                
                
                <div class="absolute right-0 bg-blau top-0 space-y-2 py-4" style="margin-top: 5rem;width: 100%;" x-show="search">
                    <div class="px-4 mr-4">
                    <livewire:search-form />
                    </div>
                </div>
                
                <div class="absolute right-0 bg-blau top-0 space-y-2 py-4" style="margin-top:5rem;width: 200px;z-index: 10" x-show="open" x-transition>
                    
                    <a href="{{ route('home') }}"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                         font-bold 
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('EXPLORA') }}
                    </a>
                    
                    <a href="https://www.scratchjrtactile.org{{ $langPrefix }}/create"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        @if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/create') bg-blue-500 font-bold underline @endif
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('CREA') }}
                    </a>
                    
                    <a href="https://www.scratchjrtactile.org{{ $langPrefix }}/start"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        @if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/start') bg-blue-500 font-bold underline @endif
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('COMENÇA') }}
                    </a>
                    
                    <a href="https://www.scratchjrtactile.org{{ $langPrefix }}/learn"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        @if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/learn') bg-blue-500 font-bold underline @endif
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        {{ __('ENSENYA') }}
                    </a>
                    
                    @if (auth()->check())
                        <a href="{{ route('profile-page', auth()->user()) }}"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            {{ __('PERFIL') }}
                        </a>
                        <a href="/project/create"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            {{ __('CREAR PROJECTE') }}
                        </a>
                    
                        @if (auth()->user()->is_admin)
                            <a href="/moderation"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                {{ __('MODERAR') }}
                            </a>
                            <a href="/users"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                {{ __('USUARIS') }}
                            </a>
                        @endif
                    @endif
                    
                    <div class="relative" x-data="{open: false}"  x-cloak>
                        <button class="border px-3 py-0.5 text-white text-l mx-2.5 uppercase" x-on:click="open = ! open">
                            @if (\Cookie::get('lang') == 'ca')
                                CATALÀ
                            @elseif (\Cookie::get('lang') == 'es')
                                ESPAÑOL
                            @elseif (\Cookie::get('lang') == 'en')
                                ENGLISH
                            @elseif (\Cookie::get('lang') == 'de')
                                DEUTSCH
                            @elseif (\Cookie::get('lang') == 'el')
                                ΕΛΛΗΝΙΚΑ
                            @elseif (\Cookie::get('lang') == 'pl')
                                POLSKI
                            @endif
                        </button>
                    
                        <div class="absolute mt-2" x-show="open" x-transition>
                            <ul>
                            @if (App::getLocale() == 'ca')
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            @endif
                            @if (App::getLocale() == 'es')
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            @endif
                            @if (App::getLocale() == 'en')
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            @endif
                            @if (App::getLocale() == 'de')
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            @endif
                            @if (App::getLocale() == 'el')
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            @endif
                            @if (App::getLocale() == 'pl')
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center mt-2 ml-3 onoff">
    <div class="switch-button">
        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox" onclick="toggleTranslation()" checked>
        <label for="switch-label" class="switch-button__label"></label>
    </div>

    <p class="text-custom text-white ml-2 cursor-pointer block hover:underline" id="translation-text" onclick="toggleTranslation()">
        <span class="block">{{ __('Traduir contingut automàticament') }}</span>
    </p>
</div>
                    @if (auth()->check())
                        <div x-data="{ open: false }" x-cloak class="relative">
                            <button type="button" class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg" x-on:click="open = ! open">
                                @if (auth()->user()->featured_image)
                                    <div class="bg-cover border-2 border-white rounded-full size-10"
                                        style="background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                                    </div>
                                @else
                                    {{ auth()->user()->name }}
                                @endif
                            </button>
                    
                            <div x-show="open"
                                class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-blau"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ route('profile-page', auth()->user()) }}"
                                        class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                        id="menu-item-0">{{ __('Perfil') }}</a>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-white" role="menuitem"
                                        tabindex="-1" id="menu-item-1">{{ __('Preferències') }}</a>
                                    <form method="POST" action="{{ route('logout') }}" role="none">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-left text-white"
                                            role="menuitem" tabindex="-1" id="menu-item-3">{{ __('Tancar sessió') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        
                            <a href="/login" class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg" style="text-wrap:nowrap">{{ __('Iniciar sessió') }}</a>
                           <a href="{{ route('age-gate') }}" class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg" style="text-wrap:nowrap">{{ __("Registra't") }}</a>
                        
                    @endif
                </div>
            </div>
            
            
            
            
        </div>
    </div>
</div>
<style>

.onoff {
    position: relative;
    z-index: 1;
}

.lengua {
    position: absolute;
    z-index: 2;
}

.text-custom {
    font-size: 10px;
    color: white;
    cursor: pointer;
}

.hover-message {
    position: absolute;
    top: 100%;
    left: -15%;
    margin-top: 4px;
    background-color: #0081C9;
    color: white;
    font-size: 10px;
    padding: 5px;
    border-radius: 5px;
    visibility: hidden; 
    opacity: 0;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    width: 130%;
    border: 1px solid #D7DAD7;
}

.text-custom:hover .hover-message {
    visibility: visible;
    opacity: 1;
}

    :root {
    --color-green: #00a878;
    --color-orange: #F59C00;
    --color-button: #fdffff;
    --color-grey: #D7DAD7;
    }
.switch-button {
    display: i#D7DAD7nline-block;
}
.switch-button .switch-button__checkbox {
    display: none;
}
.switch-button .switch-button__label {
    background-color: var(--color-grey);
    width: 1.5rem;
    height: 0.8rem;
    border-radius: 1rem;
    display: inline-block;
    position: relative;
}
.switch-button .switch-button__label:before {
    transition: .2s;
    display: block;
    position: absolute;
    width: 0.8rem;
    height: 0.8rem;
    background-color: var(--color-button);
    content: '';
    border-radius: 50%;
    box-shadow: inset 0px 0px 0px 1px var(--color-black);
}
.switch-button .switch-button__checkbox:checked + .switch-button__label {
    background-color: var(--color-orange);
}
.switch-button .switch-button__checkbox:checked + .switch-button__label:before {
    transform: translateX(0.7rem);
}
</style>