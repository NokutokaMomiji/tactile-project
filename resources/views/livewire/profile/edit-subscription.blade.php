<div>
    <label class="flex items-center space-x-2">
        <input type="checkbox" wire:click="toggleSubscription" class="form-checkbox" {{ $isSubscribed ? 'checked' : '' }}>
        <span>{{ $isSubscribed ? 'Desuscribirse a recibir novedades por email.' : 'Suscribirse a recibir novedades por email.' }}</span>
    </label>

    <div id="mensaje"></div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
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
