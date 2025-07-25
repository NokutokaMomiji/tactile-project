<div>
    <label class="flex items-center space-x-2">
        <input type="checkbox" wire:click="toggleSubscription" class="form-checkbox" <?php echo e($isSubscribed ? 'checked' : ''); ?>>
        <span><?php echo e($isSubscribed ? 'Desuscribirse a recibir novedades por email.' : 'Suscribirse a recibir novedades por email.'); ?></span>
    </label>

    <div id="mensaje"></div>

    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="alert alert-success"><?php echo e(session('message')); ?></div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>

<script>
    function showMessage(string) {
        document.getElementById('mensaje').innerHTML = string;

        setTimeout(function () {
            document.getElementById('mensaje').innerHTML = ''; 
        }, 5000);
    }

    Livewire.on('subscriptionUpdated', (isSubscribed) => {
        if (isSubscribed) {
            showMessage("Se ha suscrito correctamente");
        } else {
            showMessage("Se ha desuscrito correctamente");
        }
    });
</script>
<?php /**PATH /hosting/www/tactilejr.org/projects/resources/views/livewire/profile/edit-subscription.blade.php ENDPATH**/ ?>