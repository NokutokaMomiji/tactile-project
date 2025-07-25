<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
	<div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
		<div class="grid grid-cols-1 gap-3 mb-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full">
			@foreach($posts as $post)
				<a target="_parent" href="{{ route('post.show', [ $post]) }}"
					class="p-5 text-center bg-white border border-gray-500 rounded-xl" style="display: flex;flex-direction: column;justify-content: space-between">
					<div style="background-image: url('{{ \Storage::url($post->featured_image_path) }}')" class="bg-center bg-cover h-52">
					</div>
					<h3 class="py-3 text-xs border-b border-black bg-blauclar">
						{{ $post->user->name }} {{ $post->user->surnames }} - {{ $post->user->city }}
					</h3>
					<h2 class="pt-2 text-lg font-semibold uppercase leading-1 text-blau"> {{ $post->title }}</h2>
					<p class="pb-2 text-sm border-b border-black leading-1 overflow-hidden">
						{!! \Str::limit(strip_tags($post->body), 60) !!}
					</p>
					<div class="flex items-center justify-between pt-2 text-gray-400">
						<div class="flex items-center ">
							<x-icons.like />
							<span class="ml-1">{{ $post->likes()->count() }}</span>
						</div>
						<div class="flex items-center">
							<x-icons.comment />
							<span class="ml-1">{{ $post->comments()->count() }}</span>
						</div>
						<div class="flex items-center {{ auth()->check() &&auth()->user()->favorites()->where('post_id', $post->id)->exists()? 'text-groc': 'text-gray-400' }}">
							<x-icons.fav />
						</div>
						<div class="flex items-center">
							<x-icons.share />
						</div>
					</div>
				</a>
			@endforeach
		</div>
	</div>
</body>
</html>