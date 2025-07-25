<div>
    <div class="border-t-4 bg-blau border-groc">
        <div class="container flex items-center justify-between h-24 px-4 mx-auto text-white">
            <div class="flex items-center text-2xl font-bold uppercase">

               
                @if (auth()->check() && auth()->id() == $user->id)
                    {{__('HOLA')}}, {{ $user->name }}
                @else
                    <a href="/{{ $user->username }}">{{ $user->name }} {{ $user->surnames }}</a>
                @endif
            </div>
            <div class="uppercase">
                @if (auth()->check() && auth()->id() == $user->id)
                    <a href="/project/create">{{__('CREAR NOU PROJECTE')}}</a>
                @else
                    {{ $user->city }}
                    @if ($user->country)
                        , {{ $user->country }}
                    @endif
                @endif
            </div>
        </div>
    </div>
    
    @if ($this->posts->count())
        

        <div class="bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full">


                        <div class="my-4 text-3xl text-center text-gray-900">{{ $this->collection->name }}</div>
                        <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            @foreach ($this->posts as $post)
                                    @include('partials.post-snippet')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
           
                   
              
        </div>
    @else
        <div class="py-12 text-center bg-white">
            {{__('Aquesta col·lecció no té projectes.')}}
        </div>
    @endif
</div>
