<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<title><?php echo e(__('Explora | Scratch Tactile')); ?></title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<!-- Scripts -->
	<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
	<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

	
	<style>
		.trix-button-group--file-tools {
			display: none !important;
		}
	</style>
</head>

<body class="font-sans antialiased">
	<div class="mb-4 " style="min-height: calc(100vh - 200px)">
		<?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<main class="container mx-auto my-5">
			
			
			Here you can include the content!
			
			
		</main>

		<footer>
			<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</footer>
	</div>

	<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

	<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>

</body>

</html>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/create.blade.php ENDPATH**/ ?>