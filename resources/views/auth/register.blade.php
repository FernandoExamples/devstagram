@extends('layouts.app')

@section('title')
    Regístrate en Devstagram
@endsection

@section('content')
    <div class="md:flex md:items-center md:justify-center md:gap-10">
        <div class="p-5 md:w-6/12">
            <img
                src="{{ asset('img/registrar.jpg') }}"
                alt="Registro de usuarios"
            />
        </div>

        <div class="rounded-lg bg-white p-6 shadow-xl md:w-4/12">
            <form
                action="{{ route('register') }}"
                method="POST"
            >
                @csrf
                <div>
                    <div class="mb-5">
                        <label
                            for="name"
                            class="mb-2 block font-bold uppercase text-gray-500"
                        >Nombre</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="@error('name') border-red-500 @enderror w-full rounded-lg border p-3"
                            placeholder="Tu Nombre"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                            <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label
                            for="username"
                            class="mb-2 block font-bold uppercase text-gray-500"
                        >Nombre</label>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="@error('username') border-red-500 @enderror w-full rounded-lg border p-3"
                            placeholder="Nombre de Usuario"
                            value="{{ old('username') }}"
                        >
                        @error('username')
                            <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label
                            for="email"
                            class="mb-2 block font-bold uppercase text-gray-500"
                        >Email</label>
                        <input
                            type="text"
                            id="email"
                            name="email"
                            class="@error('email') border-red-500 @enderror w-full rounded-lg border p-3"
                            placeholder="Tu Email"
                            value="{{ old('email') }}"
                        >

                        @error('email')
                            <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label
                            for="password"
                            class="mb-2 block font-bold uppercase text-gray-500"
                        >Contraseña</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="@error('password') border-red-500 @enderror w-full rounded-lg border p-3"
                            placeholder="Contraseña"
                        >

                        @error('password')
                            <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label
                            for="password_confirmation"
                            class="mb-2 block font-bold uppercase text-gray-500"
                        >Repite tu contraseña</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="@error('password') border-red-500 @enderror w-full rounded-lg border p-3"
                            placeholder="Contraseña"
                        >

                    </div>

                    <input
                        type="submit"
                        value="Crear cuenta"
                        class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700"
                    >
                </div>
            </form>
        </div>

    </div>
@endsection
