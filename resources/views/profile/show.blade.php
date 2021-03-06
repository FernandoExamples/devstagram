@extends('layouts.app')

@section('title')
    @if ($user->isMe())
        Tu Perfil
    @else
        Perfil: {{ $user->username }}
    @endif
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="flex w-full flex-col items-center md:w-8/12 md:flex-row lg:w-6/12">
            <div class="w-8/12 px-5 lg:w-6/12">
                <img src="{{ $user->image_path ? 'storage/' . $user->image_path : asset('img/usuario.svg') }}"
                     alt="Imagen usuario">
            </div>
            <div class="flex flex-col items-center px-5 py-10 md:w-8/12 md:items-start md:justify-center lg:w-6/12">

                <div class="flex items-center gap-2 mb-5">
                    <p class="text-2xl text-gray-700"> {{ $user->username }} </p>
                    @auth
                        @if ($user->isMe())
                            <a href="{{ route('profile.edit') }}" class="text-gray-500 hover:text-gray-600 ">
                                {{-- blade-formatter-disable --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                {{-- blade-formatter-enable --}}
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->followers->count() }} <span class="font-normal">Seguidores</span>
                </p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->following->count() }} <span class="font-normal">Siguiendo</span>
                </p>

                <p class="mb-3 text-sm font-bold text-gray-800">
                    {{ $user->posts->count() }} <span class="font-normal">Post</span>
                </p>

                @auth
                    @if (!$user->isMe())
                        <form action="{{ route('follow.toggle', $user) }}" method="POST">
                            @csrf
                            <input type="submit"
                                   class="bg-blue-600 text-white uppercase rounded-lg font-bold cursor-pointer text-xs px-3 py-1"
                                   value="{{ auth()->user()->iMFollowingThisUser($user)? 'Dejar de Seguir': 'Seguir' }}">
                        </form>
                    @endif
                @endauth

            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="my-10 text-center text-4xl font-black">Publicaciones</h2>

        <x-post-list :posts="$posts" />

    </section>
@endsection
