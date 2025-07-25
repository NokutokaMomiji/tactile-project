
<div>
<div>

    <div class="flex">
    <div class="w-1/4 p-4 filter-section hidden md:block" style="background-color: #DFEBF5; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
        <form method="GET" action="<?php echo e(url('/home')); ?>">
            <input type="hidden" name="filter" value="<?php echo e($this->filter); ?>">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold"><?php echo e(__('Filtres')); ?></h3>
                <div class="flex items-center space-x-2">
                    <button type="button" onclick="resetFilters()"
                        class="text-gray-500 hover:text-gray-700 underline">
                        <?php echo e(__('Esborrar Filtres')); ?>

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
                <!--[if BLOCK]><![endif]--><?php if($hasFilters): ?>
                    <ul class="space-y-3">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filtersGrouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $filters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="filter-group bg-white p-3 rounded-lg shadow-sm">
                                <div class="flex items-center justify-between filter-toggle">
                                    <label class="font-semibold text-blue-800"><?php echo e(__($title)); ?></label>
                                    <button type="button" onclick="toggleFilters('<?php echo e($title); ?>')" class="text-blue-500 hover:text-blue-700">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                </div>
                                <ul class="mt-2 space-y-2 filter-group-content" id="filters-<?php echo e($title); ?>">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="flex items-center">
                                            <input type="checkbox" name="filters[]" value="<?php echo e($filter->filter_value); ?>" 
                                                   <?php echo e(in_array($filter->filter_value, request('filters', [])) ? 'checked' : ''); ?> 
                                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                                   onchange="this.form.submit()">
                                            <label class="ml-2 text-sm text-gray-700"><?php echo e(__($filter->filter_value)); ?></label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                <?php else: ?>
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                        <p class="font-bold"><?php echo e(__('No hi ha filtres disponibles')); ?></p>
                        <p><?php echo e(__('Actualment no hi ha filtres aplicables per a aquesta categoria.')); ?></p>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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
                    <h2 class="titulo-proyectos"><?php echo e(__('EXPLORA ELS PROJECTES DE LA COMUNITAT')); ?></h2>
                </div>
                <div class="container flex items-center justify-between px-4 mx-auto">
                    <div class="w-full mx-4">
                        <div class="py-2 flex flex-wrap justify-center items-center">
                            <div class="w-40 mb-2 px-2">
                                <?php if (isset($component)) { $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-primary','data' => ['href' => '/home','selected' => ''.e(! $this->filter).'','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/home','selected' => ''.e(! $this->filter).'','class' => 'w-full']); ?><?php echo e(__('TOTS')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $attributes = $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $component = $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\PostCategory::oldest('order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="w-40 mb-2 px-2">
                                <?php if (isset($component)) { $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-primary','data' => ['href' => '?filter='.e($category->slug).'','selected' => ''.e($this->filter == $category->slug).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '?filter='.e($category->slug).'','selected' => ''.e($this->filter == $category->slug).'']); ?><?php echo e(__ ($category->name)); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $attributes = $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $component = $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if(auth()->check()): ?>
                                <!--[if BLOCK]><![endif]--><?php if(in_array($this->filter, ['projects', 'characters', 'backgrounds', 'makes'])): ?>
                                    <div class="w-48 mb-2 px-2">
                                        <?php if (isset($component)) { $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-primary','data' => ['href' => '/project/create','variant' => 'create','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/project/create','variant' => 'create','class' => 'w-full']); ?>
                                            <!--[if BLOCK]><![endif]--><?php if($this->filter == 'projects'): ?>
                                                <?php echo e(__('CREAR PROJECTE')); ?>

                                            <?php elseif($this->filter == 'characters'): ?>
                                                <?php echo e(__('CREAR PERSONATGES')); ?>

                                            <?php elseif($this->filter == 'backgrounds'): ?>
                                                <?php echo e(__('CREAR FONS')); ?>

                                            <?php elseif($this->filter == 'makes'): ?>
                                                <?php echo e(__('CREAR MAKES')); ?>

                                            <?php else: ?>
                                                <?php echo e(__('CREAR PROJECTE')); ?>

                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $attributes = $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b)): ?>
<?php $component = $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b; ?>
<?php unset($__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b); ?>
<?php endif; ?>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                    <!-- <h1 class="text-3xl text-white"><?php echo e(__('DESTACATS')); ?></h1> -->
                     <br>
                </div>
                <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
                    <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                            <!--[if BLOCK]><![endif]--><?php if($post->is_restricted == 1): ?>
                                <a wire:navigate href="<?php echo e(route('post.show', [ $post])); ?>"
                                    class="p-5 text-center bg-white border border-gray-500 rounded-xl" 
                                    style="display: flex;flex-direction: column;justify-content: space-between">
                                    <div style="background-image: url('<?php echo e(\Storage::url($post->featured_image_path)); ?>')" class="bg-cover h-52">
                                    </div>
                                    <h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau translatedTitle" id="translatedTitle" style="display: block;"> <?php echo e($post->translated_title); ?></h2>
                                    <h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau originalTitle" id="originalTitle" style="display: none;"> <?php echo e($post->title); ?></h2>
                                    <h3 class="py-3 text-xs border-b border-black bg-blauclar">
                                        <?php echo e($post->user->name); ?> <?php echo e($post->user->surnames); ?> - <?php echo e($post->user->city); ?>

                                    </h3>
                                    
                                    <div class="flex items-center justify-between pt-2 text-gray-400">
                                        
                                        <div class="flex items-center">
                                            <?php if (isset($component)) { $__componentOriginal7ceabda0c22139669daeccabceecbc02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ceabda0c22139669daeccabceecbc02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.comment','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.comment'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7ceabda0c22139669daeccabceecbc02)): ?>
<?php $attributes = $__attributesOriginal7ceabda0c22139669daeccabceecbc02; ?>
<?php unset($__attributesOriginal7ceabda0c22139669daeccabceecbc02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ceabda0c22139669daeccabceecbc02)): ?>
<?php $component = $__componentOriginal7ceabda0c22139669daeccabceecbc02; ?>
<?php unset($__componentOriginal7ceabda0c22139669daeccabceecbc02); ?>
<?php endif; ?>
                                            <span class="ml-1"><?php echo e($post->comments()->count()); ?></span>
                                        </div>
                                        <div class="flex items-center <?php echo e(auth()->check() &&auth()->user()->favorites()->where('post_id', $post->id)->exists()? 'text-groc': 'text-gray-400'); ?>">
                                            <?php if (isset($component)) { $__componentOriginal3ddbc5c786b35806503faa1f86da939a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ddbc5c786b35806503faa1f86da939a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icons.fav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icons.fav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ddbc5c786b35806503faa1f86da939a)): ?>
<?php $attributes = $__attributesOriginal3ddbc5c786b35806503faa1f86da939a; ?>
<?php unset($__attributesOriginal3ddbc5c786b35806503faa1f86da939a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ddbc5c786b35806503faa1f86da939a)): ?>
<?php $component = $__componentOriginal3ddbc5c786b35806503faa1f86da939a; ?>
<?php unset($__componentOriginal3ddbc5c786b35806503faa1f86da939a); ?>
<?php endif; ?>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <ellipse cx="12" cy="12" rx="10" ry="8" fill="none" />
                                                <ellipse cx="12" cy="12" rx="2" ry="2" fill="grey"/>
                                            </svg>
                                            <span class="ml-1"><?php echo e($this->getViewCount($post->id)); ?></span>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="w-full p-4 mb-8 bg-white rounded-lg">
                        <?php echo e($posts->links()); ?>

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
</div><?php /**PATH D:\dev\temp\projects\resources\views/livewire/home.blade.php ENDPATH**/ ?>