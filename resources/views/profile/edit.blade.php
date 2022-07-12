@extends('layouts.app')

@section('title')
    Editar Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('profile.update') }}" class="mt-10 md:mt-0">
                @csrf
                @method('put')

                @if (session('message'))
                    <p class="my-2 rounded-lg bg-green-500 p-2 text-center text-sm text-white">
                        {{ session('message') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label
                           for="username"
                           class="mb-2 block font-bold uppercase text-gray-500">Username</label>
                    <input
                           type="text"
                           id="username"
                           name="username"
                           class="@error('username') border-red-500 @enderror w-full rounded-lg border p-3"
                           placeholder="Nombre de usuario"
                           value="{{ $user->username }}">

                    @error('username')
                        <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label
                           for="image"
                           class="mb-2 block font-bold uppercase text-gray-500">Imagen de Perfil</label>
                    <input
                           type="file"
                           accept=".jpg, .jpeg, .png"
                           id="image_path"
                           name="image_path"
                           class="w-full rounded-lg border p-3"
                           value="{{ old('image_path') }}">
                </div>

                <input
                       type="submit"
                       value="Editar Perfil"
                       class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700">

            </form>
        </div>
    </div>
@endsection
