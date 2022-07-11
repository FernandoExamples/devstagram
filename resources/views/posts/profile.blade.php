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
@endsection
