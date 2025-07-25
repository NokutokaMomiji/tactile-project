<div style="background: rgb(56 127 195)">
    <div class="w-full h-20">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <div class="flex items-center w-2/3">
                <img src="/img/logo.png" alt="logo" class="my-3 w-36 mr-11" />
                <div class="flex h-20">
                    <a href="<?php echo e(route('home')); ?>"
                        class="flex items-center block h-full px-8 text-xl text-white hover:bg-blue-300">EXPLORA</a>
                    <a href="#"
                        class="flex items-center h-full px-8 text-xl text-white hover:bg-blue-300">PERFIL</a>
                    <a href="#"
                        class="flex items-center h-full px-8 text-xl text-white hover:bg-blue-300">NOSALTRES</a>
                </div>
                <button class="border px-3 py-0.5 text-white text-l mx-2.5">
                    CA
                </button>
            </div>
            <div class="flex items-center justify-between w-1/3">
                <div class="w-full">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1464394012-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
                <div class="ml-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/orioltriguero/code/scratch/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>