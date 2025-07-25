<div>
    <form wire:submit="save">
        <div class="mb-2 text-right">
            {{-- <x-link-primary href="/p/immobles/{{ $immoble->id }}" class="bg-green-700" target="_bank">Versió pública</x-link-primary> --}}
            <x-primary-button type="submit">Guardar canvis</x-primary-button>
        </div>
        <div class="p-4 mt-4 bg-white border rounded-lg shadow">
            <x-input-label for="title">Título</x-input-label>
            <x-text-input type="text" id="title" required wire:model="post.title" />

            <x-input-label for="body">Texto</x-input-label>
            <x-text-input type="text" id="body" required wire:model="post.body" />

            @livewire('upload-images', ['post' => $post])
        </div>
    </form>
</div>

{{-- <form wire:submit="save">
    <div class="mb-2 text-right">
        <x-link-primary href="/p/immobles/{{ $immoble->id }}" class="bg-green-700" target="_bank">Versió pública
        </x-link-primary>
        <x-primary-button type="submit">Guardar canvis</x-primary-button>
    </div>
    <div class="flex flex-wrap -mx-2">
        <div class="w-full px-2 mb-4 md:w-1/3">
            <div class="p-4 bg-white border rounded-lg shadow">
                <h2 class="mb-4 text-base font-semibold leading-7 text-gray-900">Informació general</h2>
                <div class="mb-4">
                    <x-input-label for="nom">Nom de l'immoble</x-input-label>
                    <x-text-input type="text" id="nom" required wire:model="immoble.nom" />
                </div>

                <div class="mb-4">
                    <x-input-label for="about">Descripció</x-input-label>
                    <x-textarea rows="10" type="text" name="about" id="about"
                        wire:model="immoble.descripcio" />
                </div>

                <div class="mb-4">
                    <x-input-label for="actiu">Tipus d'actiu</x-input-label>
                    <x-select wire:model="solicitud.immoble.tipus_actiu_id">
                        @foreach (\App\Models\TipusActiu::oldest('nom')->get() as $tipus)
                            <option value="{{ $tipus->id }}">{{ $tipus->nom }}</option>
                        @endforeach
                    </x-select>

                </div>

                <div class="mb-4">
                    <x-input-label for="regim">Règim</x-input-label>
                    <x-select wire:model.live="immoble.regim">
                        <option value="0">Escull un règim</option>
                        <option value="1">Lloguer</option>
                        <option value="2">Venda</option>
                    </x-select>
                </div>

                <div class="mb-4">
                    <x-input-label for="poblacio">Població</x-input-label>
                    <x-select wire:model="immoble.poblacio_id" wire:change="checkZones">
                        <option value="0">Escull una població</option>
                        @foreach ($poblacions as $poblacio)
                            <option value="{{ $poblacio->id }}">{{ $poblacio->nom }}</option>
                        @endforeach
                    </x-select>
                </div>

                @if ($this->hasZones)
                    <x-input-label for="zona">Zona</x-input-label>
                    <x-select wire:model="immoble.zona_id">
                        <option value="0">Escull una zona</option>
                        @foreach ($zones as $zona)
                            <option value="{{ $zona->id }}">{{ $zona->nom }}</option>
                        @endforeach
                    </x-select>
                @endif
            </div>
        </div>

        <div class="px-2 mb-4 md:w-1/3"w-full>
            <div class="p-4 bg-white border rounded-lg shadow">

                <h2 class="mb-4 text-base font-semibold leading-7 text-gray-900">Detalls de l'immoble</h2>
                <div class="flex space-x-2">
                    <div class="mb-4">
                        <x-input-label for="num-habitacions">Habitacions</x-input-label>
                        <x-text-input type="number" name="num-habitacions" id="num-habitacions"
                            wire:model="immoble.num_habitacions" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="num-banys">Banys</x-input-label>
                        <x-text-input type="number" name="num-banys" id="num-banys"
                            wire:model="immoble.num_banys" />
                    </div>
                </div>

                <div class="flex space-x-2">
                    <div class="mb-4">
                        <x-input-label for="metres">m<sup>2</sup></x-input-label>
                        <x-text-input type="number" name="metres" id="metres"
                            wire:model="immoble.metres" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="metres">m<sup>2</sup> útils</x-input-label>
                        <x-text-input type="number" name="metres" id="metres"
                            wire:model="immoble.metres" />
                    </div>
                </div>
                <div class="mb-4">
                    <x-input-label for="preu">
                        Preu
                        @if ($immoble->regim == 1)
                            mensual
                        @endif
                    </x-input-label>
                    <div class="mt-2">
                        <x-text-input type="number" name="preu" id="preu"
                            wire:model="immoble.preu" />
                    </div>
                </div>
                <div class="pt-2 border-t">
                    <b>Extres</b>
                    @foreach (\App\Models\Tag::oldest('nom')->get() as $tag)
                        <div class="mb-1">
                            <label>
                                <input type="checkbox" value="{{ $tag->id }}" wire:model="tags"
                                    class="w-4 h-4 mr-2 text-black border-gray-300 rounded focus:ring-black">
                                {{ $tag->nom }}
                            </label>
                        </div>
                    @endforeach

                </div>

                <div class="pt-2 border-t">
                    <x-input-label for="obs">Observacions</x-input-label>
                    <x-textarea rows="10" type="text" name="obs" id="obs"
                        wire:model="immoble.observacions" />
                </div>
            </div>
        </div>
        @if ($this->immoble->id)
            <div class="px-2 mb-4 md:w-1/3"w-full>


                <div class="p-4 bg-white border rounded-lg shadow" x-data="{ openUpload: false }">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Documentació</h2>
                        <x-secondary-button x-on:click="openUpload = ! openUpload" type="button">Nou document
                        </x-secondary-button>
                    </div>

                    <div x-show="openUpload" x-transition class="mb-4">
                        <div class="mb-2">
                            <x-input-label>Nom del document</x-input-label>
                            <x-text-input wire:model="document.nom" type="text" />
                        </div>

                        <div class="mb-2">
                            <x-input-label>URL Extern</x-input-label>
                            <x-text-input wire:model="document.url" type="text" />
                        </div>
                        <div class="flex justify-between">
                            <x-secondary-button type="button"
                                x-on:click="$wire.saveDocument(); openUpload = false">
                                Guardar document</x-secondary-button>
                            @if ($document->id)
                                <button class="text-xs text-red-500"
                                    x-on:click="if (confirm('Segur que vols eliminar el document?')) $wire.deleteDocument({{ $document->id }})">Eliminar
                                    document</button>
                            @endif
                        </div>
                    </div>

                    @if ($this->immoble->documents->count())
                        <ul role="list" class="border border-gray-200 divide-y divide-gray-100 rounded-md">
                            @foreach ($this->immoble->documents as $document)
                                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                    <div class="flex items-center flex-1 w-0">
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="flex flex-1 min-w-0 gap-2 ml-4">
                                            <span class="font-medium truncate">{{ $document->nom }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-shrink-0 ml-4">
                                        <a href="{{ $document->url }}" target="_blank"
                                            class="font-medium text-black">Veure</a>
                                        <button type="button" class="ml-2 font-medium text-black"
                                            x-on:click="$wire.editDocument({{ $document->id }});openUpload = true"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="p-4 mt-4 bg-white border rounded-lg shadow">
                    @livewire('upload-images', ['immoble' => $immoble])
                </div>

                <div class="p-4 mt-4 bg-white border rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('comunicacions', ['immoble' => $this->immoble->id]) }}">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Visites</h2>
                        </a>
                        <x-link-primary
                            href="{{ route('edicio-comunicacio', ['immoble' => $this->immoble->id]) }}">
                            Nova
                            visita
                        </x-link-primary>
                    </div>

                    @if (0 && $immoble->visites->count())
                        <ul role="list" class="divide-y divide-gray-100">
                            @foreach ($immoble->visites as $visita)
                                <li class="relative py-5 gap-x-6">
                                    <a href="{{ route('edicio-comunicacio', $visita->id) }}"
                                        class="flex justify-between">
                                        <div class="mb-1">{{ $visita->client->nom }}</div>
                                        <div class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::create($visita->datetime)->format('d/m/Y H:i') }}
                                        </div>
                                    </a>
                                    <p class="text-sm leading-6 text-gray-900">{{ $visita->observacions }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="p-4 mt-4 bg-white border rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('solicituds', ['immoble' => $this->immoble->id]) }}">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Sol·licituds coincidents
                            </h2>
                        </a>

                    </div>
                </div>

                <div class="p-4 mt-4 bg-white border rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('processos', ['immoble' => $this->immoble->id]) }}">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Processos</h2>
                        </a>
                        <div class="relative" x-data="{ open: false }">
                            <x-primary-button type="button" x-on:click="open = ! open">Nou
                                procés</x-primary-button>
                            <div x-show="open"
                                class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                tabindex="-1">
                                <div class="py-1" role="none">
                                    @foreach (\App\Models\TipusProces::all() as $tipus)
                                        <a class="block px-4 py-2 text-sm text-gray-700"
                                            href="{{ route('edicio-proces', ['tipus_proces' => $tipus->id, 'immoble_id' => $immoble->id]) }}">{{ $tipus->nom }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (0 && $immoble->processos->count())
                        <ul role="list" class="divide-y divide-gray-100">
                            @foreach ($immoble->processos as $proces)
                                <li class="relative py-5 gap-x-6">
                                    <a href="{{ route('edicio-proces', $proces->id) }}" class="">
                                        <b>{{ $proces->tipus->nom }}</b>
                                        @if ($proces->nom)
                                            <div>{{ $proces->nom }}</div>
                                        @endif
                                        <div class="mb-1">
                                            {{ $proces->client->nom ?? 'Sense client assignat' }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $proces->created_at->format('d/m/Y H:i') }}
                                        </div>
                                    </a>
                                    <p class="text-sm leading-6 text-gray-900"></p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endif


    </div>

</form> --}}
