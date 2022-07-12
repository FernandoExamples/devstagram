@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto flex flex-wrap">
        <div class="md:w-1/2">
            <img src="/storage/{{ $post->image_path }}" alt="Imagen de {{ $post->title }}">

            <div class="p-3 flex items-center gap-4">
                @auth
                    <form action="{{ route('post.like', $post) }}" method="POST">
                        @csrf
                        <button type="submit">
                            {{-- blade-formatter-disable --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="@if($post->checkLike($user)) red @else none @endif" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                            {{-- blade-formatter-enable --}}
                        </button>
                    </form>
                @endauth
                <p class="font-bold ">{{ $post->likes->count() }} <span class="font-normal">Likes</span></p>
            </div>

            <div>
                <p class="font-bold">{{ $user->username }}</p>
                <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }} </p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>

            @auth
                @if ($post->isMyPost())
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Eliminar publicación"
                               class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                    </form>
                @endif
            @endauth

        </div>

        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                    <form action="{{ route('comments.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comment" class="mb-2 block font-bold uppercase text-gray-500">Añade un
                                comentario</label>
                            <textarea type="text" id="comment" name="comment"
                                      class="@error('comment') border-red-500 @enderror w-full rounded-lg border p-3"
                                      placeholder="Agrega un comentario">{{ old('comment') }}</textarea>

                            @error('comment')
                                <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Comentar"
                                   class="text-sm cursor-pointer rounded-lg bg-sky-600 p-2 font-bold uppercase text-white transition-colors hover:bg-sky-700">
                        </div>
                    </form>
                @endauth

                <div class="bg-white shadow my-5 p-5 max-h-96 overflow-y-auto">
                    @if ($post->comments->count() > 0)
                        @foreach ($post->comments as $comment)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('profile.index', $comment->user) }}" class="font-bold">
                                    {{ $comment->user->username }}
                                    @if ($post->user_id == $comment->user->id)
                                        <span class="text-xs text-gray-500">(Autor)</span>
                                    @endif
                                </a>
                                <p>{{ $comment->comment }}</p>
                                <p class="text-right text-sm text-gray-500">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p>Sin comentarios aún</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
