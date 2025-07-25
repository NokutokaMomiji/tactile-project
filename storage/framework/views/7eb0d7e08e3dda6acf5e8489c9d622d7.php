</style>
<div class="container mx-auto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

    <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4">
            <form wire:submit.prevent="save">
                <div class="p-8 bg-white">
                    <div class="space-y-6">
                        <div class="flex justify-between">
                            <h1 class="flex text-lg font-medium leading-6 text-gray-900">
                                <a href="<?php echo e(url()->previous() ?? route('home')); ?>" class="mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                    </svg>
                                </a>
                                <?php echo e(__('Preferències del projecte')); ?>

                            </h1>
                            <!--[if BLOCK]><![endif]--><?php if($post->id): ?>
                                <button type="button" wire:confirm="<?php echo e(__('Estàs segur que vols eliminar el projecte?')); ?>" wire:click="delete(<?php echo e($post->id); ?>)" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50"><?php echo e(__('Eliminar')); ?></button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="flex change">
                        <div class="w-2/3 flex flex-col gap-6 pr-10">
                        <div>
                            <b><?php echo e(__('Nom')); ?></b>
                            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['wire:model' => 'title','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'title','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        </div>

                        <div>
                            <b><?php echo e(__('Descripció')); ?></b>
                            <div class="mt-2">
                                <?php if (isset($component)) { $__componentOriginal8910ad36d6e49197b6cc58bf0f8fe11b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8910ad36d6e49197b6cc58bf0f8fe11b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.rich-text-editor','data' => ['wire:model' => 'body']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('rich-text-editor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'body']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8910ad36d6e49197b6cc58bf0f8fe11b)): ?>
<?php $attributes = $__attributesOriginal8910ad36d6e49197b6cc58bf0f8fe11b; ?>
<?php unset($__attributesOriginal8910ad36d6e49197b6cc58bf0f8fe11b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8910ad36d6e49197b6cc58bf0f8fe11b)): ?>
<?php $component = $__componentOriginal8910ad36d6e49197b6cc58bf0f8fe11b; ?>
<?php unset($__componentOriginal8910ad36d6e49197b6cc58bf0f8fe11b); ?>
<?php endif; ?>
                            </div>
                        </div>

                        <div><?php echo $__env->make('partials.file-uploader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>

                        <div>
                            <b><?php echo e(__('Documents')); ?></b>
                            <div>
                                <input type="file" wire:model.live="documents" multiple>
                            </div>


                            <ul role="list" class="mt-4 border border-gray-200 divide-y divide-gray-100 rounded-md">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->projectDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                        <div class="flex items-center flex-1 w-0">
                                            <svg class="flex-shrink-0 w-5 h-5 text-gray-400" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="flex flex-1 min-w-0 gap-2 ml-4">
                                                <input type="text"
                                                    wire:model='projectDocuments.<?php echo e($index); ?>.name'
                                                    class="block w-full border-none">
                                            </div>
                                        </div>
                                        <div class="flex items-center ml-4">
                                            <a href="<?php echo e(\Storage::url($document['path'])); ?>" target="_blank"
                                                class="font-medium text-indigo-600 hover:text-indigo-500"><?php echo e(__('Veure fitxer')); ?></a>

                                            <button type="button" class="ml-4"
                                                wire:confirm='Està segur que vols eliminar el document?'
                                                wire:click="removeDocument(<?php echo e($index); ?>)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"f
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-4">
                            <b><?php echo e(__("Links")); ?></b>
                                <button type="button" wire:click="addNewLink">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                </button>

                            
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($this->links): ?>
                          
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex align-center gap-6 mt-2">
                                    <input type="text"  wire:model="links.<?php echo e($index); ?>.name" class="rounded-md w-1/3" placeholder="<?php echo e(__("Nom")); ?>">
                                    <input type="text" wire:model="links.<?php echo e($index); ?>.link" class="rounded-md w-2/3" placeholder="<?php echo e(__("Link")); ?>">
                                    <button type="button" wire:click="removeLink(<?php echo e($index); ?>)" class="text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                          <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                                        </svg>
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="w-1/3 flex flex-col gap-6 pl-10">
                        <div>
                            <fieldset>
                                <b><?php echo e(__('Categories del projecte')); ?></b>
                                <div class="mt-2 space-y-2">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\PostCategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="category-<?php echo e($category->id); ?>" 
                                                    name="categories"
                                                    value="<?php echo e($category->id); ?>" 
                                                    type="radio"
                                                    wire:model="categories.0"
                                                    class="w-7 h-7 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600"
                                                    onclick="filterByCategory('<?php echo e($category->id); ?>')"
                                                >
                                            </div>
                                            <div class="ml-3 text-sm leading-6">
                                                <label for="category-<?php echo e($category->id); ?>"
                                                    class="font-medium text-gray-900"><?php echo e(__($category->name)); ?></label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </fieldset>
                        </div>
                        

                        <div><fieldset>
                            <b><?php echo e(__('Privacitat')); ?></b>
                            <div class="mt-2 -space-y-px bg-white rounded-md shadow-sm isolate">
                                <label
                                    class="relative flex p-4 border cursor-pointer rounded-tl-md rounded-tr-md focus:outline-none">
                                    <input type="radio" wire:model='privacy' value="0"
                                        class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-sky-600 border-gray-300 focus:ring-sky-500 active:ring-2 active:ring-offset-2 active:ring-sky-500">
                                    <span class="flex flex-col ml-3">
                                        <span class="block text-sm font-medium"><?php echo e(__('Accés públic')); ?></span>
                                        <span class="block text-sm"><?php echo e(__('Aquest projecte estarà disponible per a tothom')); ?></span>
                                    </span>
                                </label>
                                <label
                                    class="relative flex p-4 border cursor-pointer rounded-bl-md rounded-br-md focus:outline-none">
                                    <input type="radio" wire:model='privacy' value="1"
                                        class="mt-0.5 h-4 w-4 shrink-0 cursor-pointer text-sky-600 border-gray-300 focus:ring-sky-500 active:ring-2 active:ring-offset-2 active:ring-sky-500">
                                    <span class="flex flex-col ml-3">
                                        <span class="block text-sm font-medium"><?php echo e(__('Accés privat')); ?></span>
                                        <span class="block text-sm"><?php echo e(__('Aquest projecte estarà disponible només per tu')); ?></span>
                                    </span>
                                </label>
                            </div>
                        </fieldset></div>
                        
                        
                        
                        <ul class="list-disc pl-5" id="filters-list">
                            <div class="filter-category hidden" id="filter-1">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = DB::table('filters')->where('category', 'projects')->select('id', 'title', 'filter_value')->get()->groupBy('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $filters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="filter-title font-semibold mt-2">
                                            <span class="cursor-pointer" onclick="toggleDropdown('filter-values-<?php echo e($loop->index); ?>', this)">
                                            <?php echo e(__($title)); ?> <span class="ml-2">&#9662;</span>
                                            </span>
                                        </div>
                                        <ul class="filter-options hidden pl-8 flex flex-wrap gap-2" id="filter-values-<?php echo e($loop->index); ?>">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="flex items-center">
                                                    <button type="button"
                                                        data-filter-id="<?php echo e($filter->id); ?>"
                                                        wire:click="toggleFilter(<?php echo e($filter->id); ?>)"
                                                        onclick="toggleFilterLocal(<?php echo e($filter->id); ?>, this, event)"
                                                        class="chip inline-flex items-center px-3 py-1 mr-2 mb-2 rounded-full border border-gray-300 text-sm cursor-pointer select-none hover:bg-gray-100 
                                                            <?php echo e(in_array($filter->id, $selectedFilters ?? []) ? 'bg-blue-500 text-white' : ''); ?>"
                                                    >
                                                        <?php echo e(__($filter->filter_value)); ?>

                                                    </button>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </ul>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            
                            <div class="filter-category hidden" id="filter-2">
                                <?php $__currentLoopData = DB::table('filters')->where('category', 'backgrounds')->select('id', 'title', 'filter_value')->get()->groupBy('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $filters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="filter-title font-semibold mt-2">
                                            <span class="cursor-pointer" onclick="toggleDropdown('filter-values-fondos-<?php echo e($loop->index); ?>', this)">
                                            <?php echo e(__($title)); ?> <span class="ml-2">&#9662;</span>
                                            </span>
                                        </div>
                                        <ul class="filter-options hidden pl-8 flex flex-wrap gap-2" id="filter-values-fondos-<?php echo e($loop->index); ?>">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="flex items-center">
                                                    <button type="button"
                                                        data-filter-id="<?php echo e($filter->id); ?>"
                                                        wire:click="toggleFilter(<?php echo e($filter->id); ?>)"
                                                        onclick="toggleFilterLocal(<?php echo e($filter->id); ?>, this, event)"
                                                        class="chip inline-flex items-center px-3 py-1 mr-2 mb-2 rounded-full border border-gray-300 text-sm cursor-pointer select-none hover:bg-gray-100 
                                                            <?php echo e(in_array($filter->id, $selectedFilters ?? []) ? 'bg-blue-500 text-white' : ''); ?>"
                                                    >
                                                    <?php echo e(__($filter->filter_value)); ?>

                                                    </button>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </ul>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            
                            <div class="filter-category hidden" id="filter-3">
                                <?php $__currentLoopData = DB::table('filters')->where('category', 'characters')->select('id', 'title', 'filter_value')->get()->groupBy('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $filters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="filter-title font-semibold mt-2">
                                            <span class="cursor-pointer" onclick="toggleDropdown('filter-values-personajes-<?php echo e($loop->index); ?>', this)">
                                            <?php echo e(__($title)); ?> <span class="ml-2">&#9662;</span>
                                            </span>
                                        </div>
                                        <ul class="filter-options hidden pl-8 flex flex-wrap gap-2" id="filter-values-personajes-<?php echo e($loop->index); ?>">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="flex items-center">
                                                    <button type="button"
                                                        data-filter-id="<?php echo e($filter->id); ?>"
                                                        wire:click="toggleFilter(<?php echo e($filter->id); ?>)"
                                                        onclick="toggleFilterLocal(<?php echo e($filter->id); ?>, this, event)"
                                                        class="chip inline-flex items-center px-3 py-1 mr-2 mb-2 rounded-full border border-gray-300 text-sm cursor-pointer select-none hover:bg-gray-100 
                                                            <?php echo e(in_array($filter->id, $selectedFilters ?? []) ? 'bg-blue-500 text-white' : ''); ?>"
                                                    >
                                                    <?php echo e(__($filter->filter_value)); ?>

                                                    </button>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </ul>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </ul>
                        
                        
                        
                        <script>
// Store references to selected category and open dropdowns in localStorage
let lastSelectedCategory = localStorage.getItem('lastSelectedCategory');
let openDropdowns = new Set(JSON.parse(localStorage.getItem('openDropdowns') || '[]'));

// Initialize selected filters from the server data
const selectedFilters = new Set(<?php echo json_encode($selectedFilters ?? [], 15, 512) ?>);

// Toggle an individual filter selection
function toggleFilterLocal(filterId, button, event) {
    event.preventDefault();
    event.stopPropagation();
    
    filterId = parseInt(filterId);
    
    // Toggle filter selection state and update UI
    if (selectedFilters.has(filterId)) {
        selectedFilters.delete(filterId);
        button.classList.remove('bg-blue-500', 'text-white');
    } else {
        selectedFilters.add(filterId);
        button.classList.add('bg-blue-500', 'text-white');
    }
    
    // Find the Livewire component and update the server
    const projectEditComponent = document.querySelector('div[wire\\:id]');
    if (projectEditComponent) {
        const component = window.Livewire.find(projectEditComponent.getAttribute('wire:id'));
        component.$wire.toggleFilter(filterId);
    }
}

// Filter display by category selection
function filterByCategory(categoryId) {
    console.log('Filtering by category:', categoryId);
    
    // Hide all filter categories
    document.querySelectorAll('.filter-category').forEach(category => {
        category.classList.add('hidden');
    });
    
    // Show the selected category
    const selectedCategory = document.getElementById('filter-' + categoryId);
    if (selectedCategory) {
        selectedCategory.classList.remove('hidden');
        lastSelectedCategory = categoryId;
        localStorage.setItem('lastSelectedCategory', categoryId);
        
        // Restore dropdown states from localStorage
        openDropdowns.forEach(dropdownId => {
            const dropdown = document.getElementById(dropdownId);
            if (dropdown) {
                dropdown.classList.remove('hidden');
                // Find the title element through the parent li
                const listItem = dropdown.closest('li');
                if (listItem) {
                    const titleSpan = listItem.querySelector('.filter-title span span:last-child');
                    if (titleSpan) {
                        titleSpan.innerHTML = '&#9652;'; // Up arrow
                    }
                }
            }
        });
    }
}

// Toggle dropdown visibility
function toggleDropdown(dropdownId, element) {
    const dropdown = document.getElementById(dropdownId);
    if (!dropdown) return;
    
    const arrow = element.querySelector('span:last-child');
    
    if (dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
        if (arrow) arrow.innerHTML = '&#9652;'; // Up arrow
        openDropdowns.add(dropdownId);
    } else {
        dropdown.classList.add('hidden');
        if (arrow) arrow.innerHTML = '&#9662;'; // Down arrow
        openDropdowns.delete(dropdownId);
    }
    
    localStorage.setItem('openDropdowns', JSON.stringify(Array.from(openDropdowns)));
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    // Check for a selected category radio button
    const selectedCategoryInput = document.querySelector('input[name="categories"]:checked');
    if (selectedCategoryInput) {
        filterByCategory(selectedCategoryInput.value);
    } else if (lastSelectedCategory) {
        // If none is selected but we have a stored preference, use that
        const categoryRadio = document.getElementById('category-' + lastSelectedCategory);
        if (categoryRadio) {
            categoryRadio.checked = true;
            filterByCategory(lastSelectedCategory);
        }
    }
    
    // Set up Livewire event listener for when a filter is updated
    if (typeof Livewire !== 'undefined') {
        Livewire.on('filterUpdated', () => {
            if (lastSelectedCategory) {
                filterByCategory(lastSelectedCategory);
            }
        });
    }
});

// Before Livewire navigation, save state
window.addEventListener('livewire:navigating', () => {
    if (lastSelectedCategory) {
        localStorage.setItem('lastSelectedCategory', lastSelectedCategory);
        localStorage.setItem('openDropdowns', JSON.stringify(Array.from(openDropdowns)));
    }
});

// After Livewire finishes navigating or initializing
document.addEventListener('livewire:initialized', () => {
    const selectedCategoryInput = document.querySelector('input[name="categories"]:checked');
    if (selectedCategoryInput) {
        filterByCategory(selectedCategoryInput.value);
    } else if (lastSelectedCategory) {
        const categoryRadio = document.getElementById('category-' + lastSelectedCategory);
        if (categoryRadio) {
            categoryRadio.checked = true;
            filterByCategory(lastSelectedCategory);
        }
    }
});
</script>
                         
                        
                        
                        
                        
                        <!--[if BLOCK]><![endif]--><?php if(auth()->user()->is_admin && !$this->creating): ?>
                            <div><div class="border-end">               
                                <b><?php echo e(__("Ajustos d'administrador")); ?></b>
                                <div class="flex items-center mt-2">
                                    <div class="w-32"><?php echo e(__('Autor')); ?></div>
                                
                                        <select wire:model.live='user_id' class="block w-full rounded border-gray-300" >
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> <?php echo e($user->surnames); ?></option> 
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                        </select>
                            
                                </div>
                                
                                <div class="flex items-center mt-2">
                                    <div class="w-32"><?php echo e(__('Data')); ?></div>
                                    
                                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['class' => 'block w-full','type' => 'date','wire:model' => 'created_at']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block w-full','type' => 'date','wire:model' => 'created_at']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                                    
                                </div>
                            </div></div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                        <div class="flex justify-between">
                            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('GUARDAR CANVIS')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                            <!--[if BLOCK]><![endif]--><?php if($post->id): ?>
                                <div>
                                    <?php if (isset($component)) { $__componentOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8f45cad7b1364a5266e8d6a5b6131b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.link-primary','data' => ['target' => '_blank','class' => 'px-4','href' => ''.e(route('post.show', [$post])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('buttons.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => '_blank','class' => 'px-4','href' => ''.e(route('post.show', [$post])).'']); ?><?php echo e(__('Veure projecte')); ?>

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
                        </div>
                    </div>
                </form>
            </div>
            </div>
       </div>
       <style>
        .change {
            display: flex;
            flex-direction: row; 
        }
        .filter-title {
  display: block !important;
}
    
        @media (max-width: 768px) {
            .change {
                flex-direction: column;
            }
        }
    </style><?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/project-edit.blade.php ENDPATH**/ ?>