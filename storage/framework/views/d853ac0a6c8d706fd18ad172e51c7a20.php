<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-4E5RQ9Z4NC"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-4E5RQ9Z4NC'); </script>
<?php
    $currentUrl = Request::url();  // Obtiene la URL actual
    $langPrefix = '';
    if (App::getLocale() == 'ca') {
        $langPrefix = '/ca';
    } elseif (App::getLocale() == 'en') {
        $langPrefix = '/en';
    } elseif (App::getLocale() == 'es') {
        $langPrefix = '';
    }
?>


<div class="bg-blau">
    <div class="w-full h-20">
        <div class="container flex items-center justify-between px-4 mx-auto h-20">
            
            <!-- Desktop menu -->
            <div class="hidden md:flex items-center justify-between w-full h-20">
                <div class="flex items-center w-2/3">
                <a href="/home"><img src="/logo.png" alt="logo" class="w-36 mr-11" /></a>
                <div class="flex h-20">
                    

                    <a href="<?php echo e(route('home')); ?>"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        bg-groc font-bold 
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('EXPLORA')); ?>

                    </a>

                    <a href="https://www.scratchjrtactile.org<?php echo e($langPrefix); ?>/create"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        <?php if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/create'): ?> bg-blue-500 font-bold underline <?php endif; ?>
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('CREA')); ?>

                    </a>

                    <a href="https://www.scratchjrtactile.org<?php echo e($langPrefix); ?>/start"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        <?php if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/start'): ?> bg-blue-500 font-bold underline <?php endif; ?>
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('COMENÇA')); ?>

                    </a>

                    <a href="https://www.scratchjrtactile.org<?php echo e($langPrefix); ?>/learn"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        <?php if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/learn'): ?> bg-blue-500 font-bold underline <?php endif; ?>
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('ENSENYA')); ?>

                    </a>

                    <?php if(auth()->check()): ?>
                        <a href="<?php echo e(route('profile-page', auth()->user())); ?>"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            <?php echo e(__('PERFIL')); ?>

                        </a>
                        <a href="/project/create"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            <?php echo e(__('CREAR PROJECTE')); ?>

                        </a>

                        <?php if(auth()->user()->is_admin): ?>
                            <a href="/moderation"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                <?php echo e(__('MODERAR')); ?>

                            </a>
                            <a href="/users"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                <?php echo e(__('USUARIS')); ?>

                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="relative" x-data="{open: false}" x-cloak>
                    <button class="border px-3 py-0.5 text-white text-l mx-2.5 uppercase" x-on:click="open = ! open">
                        <?php if(\Cookie::get('lang') == 'ca'): ?>
                            CATALÀ
                        <?php elseif(\Cookie::get('lang') == 'es'): ?>
                            ESPAÑOL
                        <?php elseif(\Cookie::get('lang') == 'en'): ?>
                            ENGLISH
                        <?php elseif(\Cookie::get('lang') == 'de'): ?>
                            DEUTSCH
                        <?php elseif(\Cookie::get('lang') == 'el'): ?>
                            ΕΛΛΗΝΙΚΑ
                        <?php elseif(\Cookie::get('lang') == 'pl'): ?>
                            POLSKI
                        <?php endif; ?>
                    </button>

                    <div class="absolute mt-2" x-show="open" x-transition>
                        <ul>
                            <?php if(App::getLocale() == 'ca'): ?>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'es'): ?>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'en'): ?>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'de'): ?>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'el'): ?>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'pl'): ?>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-white border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
                <div class="flex items-center justify-between w-1/3">
                <div class="w-full">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1243604470-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
                <div class="relative ml-6 flex items-center gap-4">
                    
                    <?php if(auth()->check()): ?>
                        <!-- Botón del usuario -->
                        <div x-data="{ open: false }" class="relative" x-cloak>
                            <button type="button" class="text-white flex items-center" x-on:click="open = ! open">
                                <?php if(auth()->user()->featured_image): ?>
                                    <div class="bg-cover border-2 border-white rounded-full size-10"
                                        style="background-image: url('<?php echo e(auth()->user()->featured_image); ?>')">
                                    </div>
                                <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                <?php endif; ?>
                            </button>

                            <!-- Submenú del usuario -->
                            <div x-show="open"
                                class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="<?php echo e(route('profile-page', auth()->user())); ?>"
                                        class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                        id="menu-item-0"><?php echo e(__('Perfil')); ?></a>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="menu-item-1"><?php echo e(__('Preferències')); ?></a>
                                </div>
                            </div>
                        </div>

                        <!-- Botón de Cerrar Sesión -->
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline-block">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-white" title="<?php echo e(__('Cerrar sesión')); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-9a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 4.5 21h9a2.25 2.25 0 0 0 2.25-2.25V15m-3-6h8.25m0 0L18 12m2.25-3L18 6" />
                                </svg>
                            </button>
                        </form>
                    <?php else: ?>
                        <div class="flex ml-4 space-x-4 text-white items-center">
                            <a href="/login" class="hover:underline" style="text-wrap:nowrap"><?php echo e(__('Iniciar sessió')); ?></a>
                            <a href="/register" class="hover:underline" style="text-wrap:nowrap"><?php echo e(__("Registra't")); ?></a>
                        </div>
                    <?php endif; ?>
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
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1243604470-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>
                </div>
                
                <div class="absolute right-0 bg-blau top-0 space-y-2 py-4" style="margin-top:5rem;width: 200px;z-index: 10" x-show="open" x-transition>
                    
                    <a href="<?php echo e(route('home')); ?>"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                         font-bold 
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('EXPLORA')); ?>

                    </a>
                    
                    <a href="https://www.scratchjrtactile.org<?php echo e($langPrefix); ?>/create"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        <?php if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/create'): ?> bg-blue-500 font-bold underline <?php endif; ?>
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('CREA')); ?>

                    </a>
                    
                    <a href="https://www.scratchjrtactile.org<?php echo e($langPrefix); ?>/start"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        <?php if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/start'): ?> bg-blue-500 font-bold underline <?php endif; ?>
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('COMENÇA')); ?>

                    </a>
                    
                    <a href="https://www.scratchjrtactile.org<?php echo e($langPrefix); ?>/learn"
                        class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center 
                        <?php if($currentUrl == 'https://www.scratchjrtactile.org' . $langPrefix . '/learn'): ?> bg-blue-500 font-bold underline <?php endif; ?>
                        hover:bg-blue-400 hover:underline hover:text-lg">
                        <?php echo e(__('ENSENYA')); ?>

                    </a>
                    
                    <?php if(auth()->check()): ?>
                        <a href="<?php echo e(route('profile-page', auth()->user())); ?>"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            <?php echo e(__('PERFIL')); ?>

                        </a>
                        <a href="/project/create"
                            class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                            <?php echo e(__('CREAR PROJECTE')); ?>

                        </a>
                    
                        <?php if(auth()->user()->is_admin): ?>
                            <a href="/moderation"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                <?php echo e(__('MODERAR')); ?>

                            </a>
                            <a href="/users"
                                class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg">
                                <?php echo e(__('USUARIS')); ?>

                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <div class="relative" x-data="{open: false}"  x-cloak>
                        <button class="border px-3 py-0.5 text-white text-l mx-2.5 uppercase" x-on:click="open = ! open">
                            <?php if(\Cookie::get('lang') == 'ca'): ?>
                                CATALÀ
                            <?php elseif(\Cookie::get('lang') == 'es'): ?>
                                ESPAÑOL
                            <?php elseif(\Cookie::get('lang') == 'en'): ?>
                                ENGLISH
                            <?php elseif(\Cookie::get('lang') == 'de'): ?>
                                DEUTSCH
                            <?php elseif(\Cookie::get('lang') == 'el'): ?>
                                ΕΛΛΗΝΙΚΑ
                            <?php elseif(\Cookie::get('lang') == 'pl'): ?>
                                POLSKI
                            <?php endif; ?>
                        </button>
                    
                        <div class="absolute mt-2" x-show="open" x-transition>
                            <ul>
                            <?php if(App::getLocale() == 'ca'): ?>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'es'): ?>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'en'): ?>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'de'): ?>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'el'): ?>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=pl">POLSKI</a></li>
                            <?php endif; ?>
                            <?php if(App::getLocale() == 'pl'): ?>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=ca">CATALÀ</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=es">ESPAÑOL</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=en">ENGLISH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=de">DEUTSCH</a></li>
                                <li class="px-3 py-2 bg-blau border hover:underline mx-2.5"><a href="/lang?l=el">ΕΛΛΗΝΙΚΑ</a></li>
                            <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    
                    <?php if(auth()->check()): ?>
                        <div x-data="{ open: false }" x-cloak class="relative">
                            <button type="button" class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg" x-on:click="open = ! open">
                                <?php if(auth()->user()->featured_image): ?>
                                    <div class="bg-cover border-2 border-white rounded-full size-10"
                                        style="background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                                    </div>
                                <?php else: ?>
                                    <?php echo e(auth()->user()->name); ?>

                                <?php endif; ?>
                            </button>
                    
                            <div x-show="open"
                                class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-blau"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="<?php echo e(route('profile-page', auth()->user())); ?>"
                                        class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                        id="menu-item-0"><?php echo e(__('Perfil')); ?></a>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-white" role="menuitem"
                                        tabindex="-1" id="menu-item-1"><?php echo e(__('Preferències')); ?></a>
                                    <form method="POST" action="<?php echo e(route('logout')); ?>" role="none">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-left text-white"
                                            role="menuitem" tabindex="-1" id="menu-item-3"><?php echo e(__('Tancar sessió')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        
                            <a href="/login" class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg" style="text-wrap:nowrap"><?php echo e(__('Iniciar sessió')); ?></a>
                           <a href="/register" class="flex items-center h-full px-3 text-base text-white transition duration-300 text-center hover:bg-blue-400 hover:underline hover:text-lg" style="text-wrap:nowrap"><?php echo e(__("Registra't")); ?></a>
                        
                    <?php endif; ?>
                </div>
            </div>
            
            
            
            
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/projects/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>