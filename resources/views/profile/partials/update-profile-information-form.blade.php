<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informació del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualitza la informació del teu compte i l'adreça de correu electrònic.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="surnames" :value="__('Cognoms')" />
            <x-text-input id="surnames" class="block w-full mt-1" type="text" name="surnames" :value="old('surnames', $user->surnames)"
                required autofocus autocomplete="surnames" />
            <x-input-error :messages="$errors->get('surnames')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Àlies')" />
            <x-text-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username', $user->username)"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Correu electrònic')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('La teva adreça de correu electrònic no està verificada.') }}

                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Fes clic aquí per reenviar el correu de verificació.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __("S'ha enviat un nou enllaç de verificació a la teva adreça de correu electrònic.") }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="entity" :value="__('Escola/Organització')" />
            <x-text-input id="entity" class="block w-full mt-1" type="text" name="entity" :value="old('entity', $user->entity)"
                autofocus autocomplete="entity" />
            <x-input-error :messages="$errors->get('entity')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="charge" :value="__('Càrrec')" />
            <x-text-input id="charge" class="block w-full mt-1" type="text" name="charge" :value="old('charge', $user->charge)"
                autofocus autocomplete="charge" />
            <x-input-error :messages="$errors->get('charge')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="city" :value="__('Ciutat')" />
            <x-text-input id="city" class="block w-full mt-1" type="text" name="city" :value="old('city', $user->city)"
                autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="reason" :value="__('Per a què planejes usar scjtactile?')" />
            <x-text-input id="reason" class="block w-full mt-1" type="text" name="reason" :value="old('reason', $user->reason)"
                autofocus autocomplete="reason" />
            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="birthdate" :value="__('Data de naixement')" />
            <x-text-input id="birthdate" class="block w-full mt-1" type="date" name="birthdate" 
                :value="old('birthdate', $user->birthdate)" required autofocus max="{{ date('Y-m-d') }}" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('DESA') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Desat.') }}</p>
            @endif
        </div>
    </form>
</section>
