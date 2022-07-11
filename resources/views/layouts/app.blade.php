<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Devstagram | @yield('title')</title>

    @yield('styles')

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <header class="border-b bg-white p-5 shadow">
        <div class="item-center container mx-auto flex justify-between">
            <h1 class="text-3xl font-black">Devstagram</h1>
            @auth
                <nav class="flex items-center gap-2">
                    {{-- blade-formatter-disable --}}
                    <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold"
                        href="{{route('posts.create')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Crear
                    </a>
                    {{-- blade-formatter-enable --}}

                    <a
                        class="font-bold text-gray-600"
                        href="{{ route('posts.index', auth()->user()->username) }}"
                    >
                        Hola: <span class="font-normal">{{ auth()->user()->username }}</span>
                    </a>

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="font-bold uppercase text-gray-600"
                        >Cerrar Sesión</button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex items-center gap-2">
                    <a
                        href="{{ route('login') }}"
                        class="font-bold uppercase text-gray-600"
                    >Login</a>
                    <a
                        href="/crear-cuenta"
                        class="font-bold uppercase text-gray-600"
                    >Crear cuenta</a>
                </nav>
            @endguest
        </div>

    </header>

    <main class="container mx-auto mt-10">
        <h2 class="mb-10 text-center text-3xl font-black">
            @yield('title')
        </h2>
        @yield('content')
    </main>

    <footer class="mt-10 p-5 text-center font-bold uppercase text-gray-500">
        Devstagram - Todos los derechos reservados {{ now()->year }} &copy;
    </footer>

    @vite('resources/js/app.js')
</body>

</html>
