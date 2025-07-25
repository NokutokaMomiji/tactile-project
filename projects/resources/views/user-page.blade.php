<x-app-layout>

    <div class="flex">
        <div class="w-1/4">
            <div class="flex flex-col items-center justify-center">
                <img src="#" class="w-32 h-32 rounded-full">
                <h2 class="mt-1 font-semibold leading-tight text-gray-800 text-xxl">
                    {{ $username }}
                </h2>
                <div class="flex">
                    <a href="/{{ $username }}/followers" class="mr-1 link-primary">Followers</a>
                    <a href="/{{ $username }}/following" class="link-primary">Following</a>
                </div>
            </div>
        </div>
        <div class="w-3/4">



            @livewire('feed', ['username' => $username])
        </div>
    </div>

</x-app-layout>
