<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <ul>
        <li><h1>Título: <?php echo e($post->title); ?></h1></li>
        <li><h3>Autor: <?php echo e($post->user->name); ?></h3></li>
        <li><h3>Fecha de creación: <?php echo e($post->created_at->format('d/m/Y')); ?></h3></li>
        <li><h3><strong>Categorías:</strong>
            <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($category->name); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </h3>
        </li>
        <li> <a href="<?php echo e(url('/project/' . $post->id)); ?>">  Ver proyecto </a></li>
    </ul>
</body>
</html>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/emails/new_post.blade.php ENDPATH**/ ?>