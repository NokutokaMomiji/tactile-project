<x-app-layout>
    <x-slot name="header">
        <i class="bi bi-arrow-left"></i>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Twit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('feed')
            </div>
        </div>
    </div>
</x-app-layout>
