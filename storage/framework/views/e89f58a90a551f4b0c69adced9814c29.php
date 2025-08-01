<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="flex flex-col items-center min-h-screen pt-6 bg-white sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <img src="/img/tactile.svg" class="w-96">
            </a>
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-gray-100 shadow-md sm:max-w-md sm:rounded-lg">
            <?php echo e($slot); ?>

        </div>
    </div>
</body>

</html>
<?php /**PATH /Users/marc/Code/scratch/resources/views/layouts/guest.blade.php ENDPATH**/ ?>