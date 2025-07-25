<x-app-layout>
    <x-slot name="header">
        <i class="bi bi-arrow-left"></i>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post
        </h2>
    </x-slot>

    @if (auth()->user()->username == $username)
        @livewire('post-edit', ['post'=>$post])
    @else
        @livewire('post-page', ['post'=>$post, 'username'=>$username])
    @endif

    {{-- Seria interessant fer una component de comentaris i així si s'entra a editar un post propi també es pot accedir a comentaris etc
    sense repetir codi. --}}

</x-app-layout>
