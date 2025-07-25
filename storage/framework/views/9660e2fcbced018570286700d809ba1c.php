<?php 

$filter = request()->input('filter', 'default'); 

$title = 'Explora';

if (in_array($filter, ['projects', 'characters', 'backgrounds', 'makes'])) {
    $title = ucfirst($filter);
}
?>





<!DOCTYPE html>
<html class="overflow-x-hidden" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title); ?> | ScracthJr Tactile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    
    <style>
        .trix-button-group--file-tools {
            display: none !important;
        }
        
        [x-cloak] { display: none !important; }
		
		html, body {
            overflow-x: hidden;
        }
        
    </style>
</head>
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-9RW974KFYB"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-9RW974KFYB'); </script>

<body class="overflow-x-hidden font-sans antialiased">

    <div class="mb-4 " style="min-height: calc(100vh - 200px)">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="">
            <?php echo e($slot); ?> <!-- Muestra el contenido original sin modificar -->
        </main>

        <footer>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>

</body>

</html>
<?php /**PATH D:\dev\temp\projects\resources\views/layouts/app.blade.php ENDPATH**/ ?>