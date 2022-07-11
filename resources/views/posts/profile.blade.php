@extends('layouts.app')

@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="flex w-full flex-col items-center md:w-8/12 md:flex-row lg:w-6/12">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img
                    src="{{ asset('img/usuario.svg') }}"
                    alt="Imagen usuario"
                >
            </div>
            <div class="flex flex-col items-center px-5 py-10 md:w-8/12 md:items-start md:justify-center lg:w-6/12">
                <p class="mb-5 text-2xl text-gray-700">
                    {{ $user->username }}
                </p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    0 <span class="font-normal">Seguidores</span>
                </p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    0 <span class="font-normal">Suigiendo</span>
                </p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    0 <span class="font-normal">Post</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-center text-4xl font-black">Publicaciones</h2>

        @if ($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="#">
                            <img
                                src="storage/{{ $post->image_path }}"
                                alt="Imagen del Post {{ $post->title }}"
                            >
                        </a>
                    </div>
                @endforeach
            </div>

            <div>
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">Sin publicaciones</p>
        @endif

    </section>
@endsection
