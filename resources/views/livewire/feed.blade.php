<div>
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($this->posts as $post)
            @include('partials.post-snippet')
        @endforeach
    </ul>

</div>
