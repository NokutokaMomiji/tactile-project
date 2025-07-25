<div>
    <div class="border-t-4 bg-blau border-groc">
        <div class="container flex items-center justify-between h-24 px-4 mx-auto text-white">
            <div class="flex items-center text-2xl font-bold uppercase">
                @if (auth()->check() && auth()->id() == $user->id)
                    {{__('HOLA')}}, {{ $user->name }}
                @else
                    {{ $user->name }} {{ $user->surnames }}
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
    <script>
        document.title = "{{ $user->name }} | Scracht Tactile";
    </script> 
   
        <div class="border-b-4 bg-blauclar border-groc">
            <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
                <div class="w-full md:w-3/4">
                    <div class="flex flex-wrap gap-2 py-4 ">
                        <div class="w-40 px-2">
                        <x-buttons.link-primary href="{{ route('profile-page', $user) }}"  selected="{{ ! $this->filter }}">{{__('TOTS')}}</x-buttons.link-primary>
                        </div>

                        @foreach (\App\Models\PostCategory::oldest('order')->get() as $category)
                          <div class="w-40 px-2">
                                
                            <x-buttons.link-primary href="?filter={{$category->slug }}"
                            selected="{{ $this->filter == $category->slug }}">{{ __ ($category->name) }}</x-buttons.link-primary>
                          </div>
                        @endforeach
                    </div>
                </div>
               
            </div>
        </div>

        <div class="bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full">


                        <div class="my-4 text-3xl text-center text-gray-900">{{__('PROJECTES')}}</div>
                        <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            @foreach ($this->posts as $post)
                                @if($post->is_restricted != 2)
                                    @include('partials.post-snippet')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            @if (auth()->id() == $user->id)
            <div class="bg-gray-100 py-4 border-t-4 border-groc border-b-4">
                 <div class="container px-4 mx-auto" x-data="{ addingCollection: false }">
                        <div class="mt-4 text-3xl text-center text-gray-900 flex items-center justify-center">{{__('COLLECCTIONS')}}<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 duration-150 cursor-pointer ml-2"
                                :class="addingCollection ? 'rotate-45' : 'rotate-0'"
                                x-on:click="addingCollection = ! addingCollection">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg></div>
                            <div x-show="addingCollection" x-transition style="width: 300px" class="mx-auto">
                                <form wire:submit="addCollection" class=" flex px-2 items-center py-2 mx-auto justify-center">
                                    <x-text-input type="text" name="newpost" placeholder="Collection name..." id="newpost"
                                        wire:model="collectionName" />
                                    <x-primary-button type="submit" x-on:click="addingCollection = false"
                                        class="inline-block ml-2">Save</x-primary-button>
                                </form>
                            </div>
                            <div class="flex flex-wrap bg-gray-100 justify-center mt-4">
                                @foreach ($user->collections as $collection)
                                    <a href="{{ route('collection-page', [$user, $collection]) }}" class="bg-white mr-4 p-2 rounded-full px-4 border border-black hover:bg-gray-100">{{ $collection->name }}</a>   
                                @endforeach
                            </div>
                            
                            
                    </div>
                    
                </div>  
            </div>
            
            
            
            @endif
            
            <div class=" py-4">
                 <div class="container px-4 mx-auto" x-data="{ addingCollection: false }">
                        <div class="mt-4 text-3xl text-center text-gray-900 flex items-center justify-center">{{__('FAVORITES')}}</div>
                    
                    
                    <div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($user->favorites as $post)
                            @include('partials.post-snippet')
                    @endforeach    
                                </div>   
                </div>  
            </div>
                   
              
        </div>
    
</div>
