
<div>
<div>

    <div class="flex">
    <div class="w-1/4 p-4 filter-section hidden md:block" style="background-color: #DFEBF5; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
        <form method="GET" action="{{ url('/home') }}">
            <input type="hidden" name="filter" value="{{ $this->filter }}">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">{{ __('Filtres') }}</h3>
                <div class="flex items-center space-x-2">
                    <button type="button" onclick="resetFilters()"
                        class="text-gray-500 hover:text-gray-700 underline">
                        {{ __('Esborrar Filtres') }}
                    </button>
                    <!-- Botón de cerrar solo en responsive -->
                    <button id="close-filters" class="md:hidden flex items-center justify-center text-black text-lg font-semibold py-2 px-4 rounded-lg transition" 
                        style="background-color: #0081c9;" 
                        onmouseover="this.style.backgroundColor='#006bb3'" 
                        onmouseout="this.style.backgroundColor='#0081c9'">
                        <span style="color: white;">Cerrar filtros</span>
                    </button>
                </div>
            </div>
            
            <div class="flex flex-col space-y-4">
                @if($hasFilters)
                    <ul class="space-y-3">
                        @foreach ($filtersGrouped as $title => $filters)
                            <li class="filter-group bg-white p-3 rounded-lg shadow-sm">
                                <div class="flex items-center justify-between filter-toggle">
                                    <label class="font-semibold text-blue-800">{{ __($title) }}</label>
                                    <button type="button" onclick="toggleFilters('{{ $title }}')" class="text-blue-500 hover:text-blue-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </div>
                                <ul class="mt-2 space-y-2 filter-group-content" id="filters-{{ $title }}">
                                    @foreach ($filters as $filter)
                                        <li class="flex items-center">
                                            <input type="checkbox" name="filters[]" value="{{ $filter->filter_value }}" 
                                                   {{ in_array($filter->filter_value, request('filters', [])) ? 'checked' : '' }} 
                                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                                   onchange="this.form.submit()">
                                            <label class="ml-2 text-sm text-gray-700">{{ __($filter->filter_value) }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                        <p class="font-bold">{{ __('No hi ha filtres disponibles') }}</p>
                        <p>{{ __('Actualment no hi ha filtres aplicables per a aquesta categoria.') }}</p>
                    </div>
                @endif

                <!-- Botón de cerrar al final de los filtros -->
                <button id="close-filters-bottom" class="md:hidden w-full flex items-center justify-center text-black text-lg font-semibold py-3 rounded-lg transition" 
                    style="background-color: #0081c9;" 
                    onmouseover="this.style.backgroundColor='#006bb3'" 
                    onmouseout="this.style.backgroundColor='#0081c9'">
                    <span style="color: white;">Cerrar filtros</span>
                </button>
            </div>
        </form>
    </div>
        <div class="w-3/4 p-2">
            <div class="w-full mb-1" style="background-color: #DFEBF5;">
                <div class="w-full mb-1 text-center">
                    <h2 class="titulo-proyectos">{{ __('EXPLORA ELS PROJECTES DE LA COMUNITAT') }}</h2>
                </div>
                <div class="container flex items-center justify-between px-4 mx-auto">
                    <div class="w-full mx-4">
                        <div class="py-2 flex flex-wrap justify-center items-center">
                            <div class="w-40 mb-2 px-2">
                                <x-buttons.link-primary href="/home" selected="{{ ! $this->filter }}" class="w-full"
                                    >{{ __('TOTS') }}</x-buttons.link-primary>
                            </div>
                            @foreach (\App\Models\PostCategory::oldest('order')->get() as $category)
                            <div class="w-40 mb-2 px-2">
                                <x-buttons.link-primary href="?filter={{$category->slug }}"
                                    selected="{{ $this->filter == $category->slug }}">{{ __ ($category->name) }}</x-buttons.link-primary>
                            </div>
                            @endforeach
                            @if (auth()->check())
                                @if (in_array($this->filter, ['projects', 'characters', 'backgrounds', 'makes']))
                                    <div class="w-48 mb-2 px-2">
                                        <x-buttons.link-primary href="/project/create" variant="create" class="w-full">
                                            @if ($this->filter == 'projects')
                                                {{ __('CREAR PROJECTE') }}
                                            @elseif ($this->filter == 'characters')
                                                {{ __('CREAR PERSONATGES') }}
                                            @elseif ($this->filter == 'backgrounds')
                                                {{ __('CREAR FONS') }}
                                            @elseif ($this->filter == 'makes')
                                                {{ __('CREAR MAKES') }}
                                            @else
                                                {{ __('CREAR PROJECTE') }}
                                            @endif
                                        </x-buttons.link-primary>
                                    </div>
                                @endif
                            @endif
                            <!-- Botón para mostrar filtros solo en responsive -->
                            <div class="w-40 mb-2 px-2">
                                <button id="toggle-filters" 
                                    class="md:hidden w-full flex items-center justify-center text-black text-lg font-semibold py-3 rounded-lg transition" 
                                    style="background-color: #0081c9;" 
                                    onmouseover="this.style.backgroundColor='#0081c9'" 
                                    onmouseout="this.style.backgroundColor='#0081c9'">
                                    <span style="color: white;">Mostrar filtros</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full border-groc border-y-4 ">
                <div class="p-4 text-center">
                    <!-- <h1 class="text-3xl text-white">{{ __('DESTACATS') }}</h1> -->
                     <br>
                </div>
                <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
                    <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full">
                        @foreach ($posts as $post)   
                            @if ($post->is_restricted == 1)
                                <a wire:navigate href="{{ route('post.show', [ $post]) }}"
                                    class="p-5 text-center bg-white border border-gray-500 rounded-xl" 
                                    style="display: flex;flex-direction: column;justify-content: space-between">
                                    <div style="background-image: url('{{ \Storage::url($post->featured_image_path) }}')" class="bg-cover h-52">
                                    </div>
                                    <h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau translatedTitle" id="translatedTitle" style="display: block;"> {{ $post->translated_title }}</h2>
                                    <h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau originalTitle" id="originalTitle" style="display: none;"> {{ $post->title }}</h2>
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
                            @endif
                        @endforeach
                    </div>

                    <div class="w-full p-4 mb-8 bg-white rounded-lg">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function resetFilters() {
        // Obtener el valor del filtro principal
        const mainFilter = document.querySelector('input[name="filter"]').value;
        // Construir la nueva URL
        const newUrl = `${window.location.origin}/home?filter=${mainFilter}`;
        // Redirigir a la nueva URL
        window.location.href = newUrl;
    }

    function toggleFilters(title) {
        const filtersList = document.getElementById('filters-' + title);
        const toggleButton = event.currentTarget;
        
        filtersList.classList.toggle('hidden');
        toggleButton.classList.toggle('open');
    }

    function setupResponsiveFilters() {
        const filterSection = document.querySelector('.filter-section');
        const toggleButton = document.getElementById('toggle-filters');
        const closeButtonTop = document.getElementById('close-filters');
        const closeButtonBottom = document.getElementById('close-filters-bottom');
        const buttonText = toggleButton.querySelector('span');

        // Manejar la visibilidad inicial
        if (window.innerWidth <= 1023) {
            filterSection.classList.add('hidden');
            toggleButton.classList.remove('hidden');
            closeButtonTop.classList.add('hidden');
            closeButtonBottom.classList.add('hidden');
            buttonText.textContent = 'Mostrar filtros';
        } else {
            filterSection.classList.remove('hidden');
            toggleButton.classList.add('hidden');
            closeButtonTop.classList.add('hidden');
            closeButtonBottom.classList.add('hidden');
        }

        toggleButton.addEventListener('click', () => {
            filterSection.classList.toggle('active');
            filterSection.classList.toggle('hidden');
            closeButtonTop.classList.toggle('hidden');
            closeButtonBottom.classList.toggle('hidden');
            
            if (filterSection.classList.contains('active')) {
                buttonText.textContent = 'Ocultar filtros';
            } else {
                buttonText.textContent = 'Mostrar filtros';
            }
        });

        const handleClose = () => {
            filterSection.classList.remove('active');
            filterSection.classList.add('hidden');
            closeButtonTop.classList.add('hidden');
            closeButtonBottom.classList.add('hidden');
            toggleButton.querySelector('span').textContent = 'Mostrar filtros';
        };

        closeButtonTop.addEventListener('click', handleClose);
        closeButtonBottom.addEventListener('click', handleClose);
    }

    function toggleTranslation() {
        const translatedTitles = document.querySelectorAll('.translatedTitle');
        const originalTitles = document.querySelectorAll('.originalTitle');

        // Alternamos la visibilidad de todos los títulos
        translatedTitles.forEach(translatedTitle => {
            translatedTitle.style.display = (translatedTitle.style.display === 'none') ? 'block' : 'none';
        });

        originalTitles.forEach(originalTitle => {
            originalTitle.style.display = (originalTitle.style.display === 'none') ? 'block' : 'none';
        });
    }

    // Ejecutar cuando se carga la página y cuando se redimensiona la ventana
    document.addEventListener('DOMContentLoaded', setupResponsiveFilters);
    window.addEventListener('resize', setupResponsiveFilters);

</script>
<style>
    @media screen and (max-width: 768px) {
    .titulo-proyectos {
        font-size: 20px;
    }
}

    @media screen and (max-width: 1023px) {
        .filter-section {
            width: 80% !important;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            overflow-y: auto;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .filter-section.active {
            transform: translateX(0);
        }

        .w-3\/4 {
            width: 100% !important;
        }

        .titulo-proyectos {
            font-size: 16px !important;
            line-height: 1.2;
            padding: 0.25rem;
            font-weight: normal;
        }

        .filter-group {
            margin-bottom: 0.5rem;
        }

        .filter-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 0.5rem;
            background-color: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
        }

        .filter-toggle svg {
            transition: transform 0.3s ease;
        }

        .filter-toggle.open svg {
            transform: rotate(180deg);
        }

        .w-40, .w-48 {
            width: 100% !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }

        .py-2.flex.flex-wrap {
            gap: 0.5rem;
        }

        .mb-2.px-2 {
            margin-left: 0;
            margin-right: 0;
        }

        /* Estilos para la sección de interacciones */
        .flex.items-center.justify-between.pt-2 {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 0.5rem;
            width: 100%;
            padding: 0.5rem 0;
        }

        /* Ajustar el tamaño de los iconos y el texto en móvil */
        .flex.items-center.justify-between.pt-2 .w-6.h-6 {
            width: 1.25rem;
            height: 1.25rem;
        }

        .flex.items-center.justify-between.pt-2 span {
            font-size: 0.75rem;
        }

        /* Asegurar que los elementos estén centrados y con espacio uniforme */
        .flex.items-center.justify-between.pt-2 > div {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.25rem;
        }

        /* Ajustes para mostrar 2 proyectos por fila en móvil */
        .grid.grid-cols-1 {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 0.5rem !important;
        }

        /* Ajustes para que los proyectos se vean bien en el nuevo layout */
        .p-5 {
            padding: 0.75rem !important;
        }

        .text-lg {
            font-size: 0.875rem !important;
        }

        .text-xs {
            font-size: 0.75rem !important;
        }

        .h-52 {
            height: 8rem !important;
        }

        /* Ajustar el espaciado interno de las tarjetas */
        .rounded-xl {
            border-radius: 0.5rem !important;
        }

        #close-filters {
            position: static;
            z-index: auto;
        }
        
        .flex.items-center.space-x-2 {
            gap: 0.5rem;
        }
    }

    .titulo-proyectos {
        font-size: 30px;
        line-height: 1.2;
        font-weight: normal;
    }
</style>
</div>