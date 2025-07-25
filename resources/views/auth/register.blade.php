<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="space-y-4">
            <!-- Name -->
            @if(request('from') !== 'minor')
            <div>
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            @endif

            <!-- Menor de edad -->
            @if(request('from') !== 'adult')
            <!--
            <div class="mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_minor" value="1" class="form-checkbox" 
                        {{ (request('from') === 'minor' || old('is_minor')) ? 'checked' : '' }} 
                        id="is_minor" 
                        @if(request('from') === 'minor') disabled @endif>
                    <input type="hidden" name="is_minor" value="{{ request('from') === 'minor' ? '1' : '0' }}">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Sóc menor d\'edat') }}</span>
                </label>
                <x-input-error :messages="$errors->get('is_minor')" class="mt-2" />
            </div>
            -->
            @endif

            <!-- Surnames -->
            @if(request('from') !== 'minor')
            <div>
                <x-input-label for="surnames" :value="__('Cognoms')" />
                <x-text-input id="surnames" class="block w-full mt-1" type="text" name="surnames" :value="old('surnames')"
                    required autofocus autocomplete="surnames" />
                <x-input-error :messages="$errors->get('surnames')" class="mt-2" />
            </div>
            @endif

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Àlies')" />
                <x-text-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correu electrònic')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Entity -->
            @if(request('from') !== 'minor')
            <div id="entityField">
                <x-input-label for="entity" :value="__('Escola/Organització')" />
                <x-text-input id="entity" class="block w-full mt-1" type="text" name="entity" :value="old('entity')"
                required autofocus autocomplete="entity" />
                <x-input-error :messages="$errors->get('entity')" class="mt-2" />
            </div>
            @endif

            <!-- Charge -->
            @if(request('from') !== 'minor')
            <div id="chargeField">
                <x-input-label for="charge" :value="__('Càrrec')" />
                <x-text-input id="charge" class="block w-full mt-1" type="text" name="charge" :value="old('charge')"
                required autofocus autocomplete="charge" />
                <x-input-error :messages="$errors->get('charge')" class="mt-2" />
            </div>
            @endif

            <!-- City -->
            <div>
                <x-input-label for="city" :value="__('Ciutat')" />
                <x-text-input id="city" class="block w-full mt-1" type="text" name="city" :value="old('city')"
                    required autofocus autocomplete="city" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- Country -->
            <div>
                <x-input-label for="country" :value="__('País')" />
                <x-text-input id="country" class="block w-full mt-1" type="text" name="country" :value="old('country')"
                    required autofocus autocomplete="country" />
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>

            <!-- Birthdate -->
            <div>
                <x-input-label for="birthdate" :value="__('Data de naixement')" />
                <x-text-input id="birthdate" class="block w-full mt-1" type="date" name="birthdate" 
                    :value="old('birthdate')" required autofocus max="{{ date('Y-m-d') }}" />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            <!-- Reason -->
            <div>
                <x-input-label for="reason" :value="__('Per a què planejes usar scjtactile?')" />
                <x-text-input id="reason" class="block w-full mt-1" type="text" name="reason" :value="old('reason')"
                    required autofocus autocomplete="reason" />
                <x-input-error :messages="$errors->get('reason')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contrasenya')" />

                <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contrasenya')" />

                <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Ja registrat?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </div>
    </form>

    <script>
        console.log('Script loaded - test'); // Mensaje de prueba
        
        document.addEventListener('DOMContentLoaded', function() {
            const minorCheckbox = document.getElementById('is_minor');
            
            // Campos a deshabilitar
            const fieldsToDisable = [
                'name', 'surnames', 'entity', 'charge'
            ].map(id => document.getElementById(id)).filter(field => field);

            // Si el checkbox está marcado o deshabilitado (viene de la ruta de menores)
            if (minorCheckbox && (minorCheckbox.checked || minorCheckbox.disabled)) {
                fieldsToDisable.forEach(field => {
                    field.disabled = true;
                    field.classList.add('bg-gray-100', 'cursor-not-allowed', 'opacity-50');
                    field.removeAttribute('required');
                    field.setAttribute('readonly', true);
                    field.value = '';
                });
            }

            // Solo agregar el event listener si el checkbox no está deshabilitado
            if (minorCheckbox && !minorCheckbox.disabled) {
                minorCheckbox.addEventListener('change', function() {
                    fieldsToDisable.forEach(field => {
                        field.disabled = this.checked;
                        field.classList.toggle('bg-gray-100', this.checked);
                        field.classList.toggle('cursor-not-allowed', this.checked);
                        field.classList.toggle('opacity-50', this.checked);
                        field.toggleAttribute('required', !this.checked);
                        field.toggleAttribute('readonly', this.checked);
                        if (this.checked) field.value = '';
                    });
                });
            }
        });
    </script>
</x-guest-layout>
