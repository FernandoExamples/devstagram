@extends('layouts.app')

@section('title')
    Pagina Principal
@endsection

@section('content')
    @if ($posts->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['user' => $post->author->username, 'post' => $post->id]) }}">
                        <img src="/storage/{{ $post->image_path }}" alt="Imagen del Post {{ $post->title }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div>
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts para mostrar</p>
    @endif


@endsection
