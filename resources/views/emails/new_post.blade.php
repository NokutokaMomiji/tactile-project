<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <ul>
        <li><h1>Título: {{ $post->title }}</h1></li>
        <li><h3>Autor: {{ $post->user->name }}</h3></li>
        <li><h3>Fecha de creación: {{ $post->created_at->format('d/m/Y') }}</h3></li>
        <li><h3><strong>Categorías:</strong>
            @foreach($post->categories as $category)
                {{ $category->name }}
            @endforeach
            </h3>
        </li>
        <li> <a href="{{ url('/project/' . $post->id) }}">  Ver proyecto </a></li>
    </ul>
</body>
</html>
