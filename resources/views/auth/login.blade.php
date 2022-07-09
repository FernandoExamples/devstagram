@extends('layouts.app')

@section('title')
    Inicia Sesión en Devstagram
@endsection

@section('content')
    <div class="md:flex md:items-center md:justify-center md:gap-10">
        <div class="p-5 md:w-6/12">
            <img
                src="{{ asset('img/login.jpg') }}"
                alt="Login de usuarios"
            />
        </div>

        <div class="rounded-lg bg-white p-6 shadow-xl md:w-4/12">
            <form
                method="POST"
                action="{{ route('login') }}"
            >
                @csrf

                @if (session('message'))
                    <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ session('message') }} </p>
                @endif

                <div>
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
                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                        >
                        <label
                            for="remember"
                            class="text-sm text-gray-500"
                        >Mantener mi sesión abierta</label>
                    </div>

                    <input
                        type="submit"
                        value="Iniciar Sesión"
                        class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700"
                    >
                </div>
            </form>
        </div>

    </div>
@endsection
