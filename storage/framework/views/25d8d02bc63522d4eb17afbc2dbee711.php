<div class="bg-blau">
    <div class="w-full h-20">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <div class="flex items-center w-2/3">
                <a href="/home"><img src="/img/tactile.svg" alt="logo" class="my-3 w-36 mr-11" /></a>
                <div class="flex h-20">
                    <a href="<?php echo e(route('home')); ?>"
                        class="flex items-center h-full px-8 text-xl text-white hover:bg-blue-300">EXPLORA</a>
                    <?php if(auth()->check()): ?>
                        <a href="<?php echo e(route('profile-page', auth()->user())); ?>"
                            class="flex items-center h-full px-8 text-xl text-white hover:bg-blue-300">PERFIL</a>
                    <?php endif; ?>
                    
                </div>
                
            </div>
            <div class="flex items-center justify-between w-1/3">
                <div class="w-full">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3631761783-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
                <div class="relative ml-6">
                    <?php if(auth()->check()): ?>
                        <div x-data="{ open: false }" class="relative">
                            <button type="button" class="text-white" x-on:click="open = ! open">
                                <?php if(auth()->user()->featured_image): ?>
                                    <div class="bg-cover border-2 border-white rounded-full size-10"
                                        style="background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                                    </div>
                                <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                <?php endif; ?>
                            </button>

                            <div x-show="open"
                                class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                    <a href="<?php echo e(route('profile-page', auth()->user())); ?>"
                                        class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                        id="menu-item-0">Perfil</a>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="menu-item-1">Preferències</a>
                                    <form method="POST" action="<?php echo e(route('logout')); ?>" role="none">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-sm text-left text-gray-700"
                                            role="menuitem" tabindex="-1" id="menu-item-3">Tancar sessió</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex ml-4 space-x-4 text-white">
                            <a href="/login" class="hover:underline">Accedir</a>
                            <a href="/register" class="hover:underline">Registra't</a>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/marc/Code/scratch/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>