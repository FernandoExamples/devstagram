@extends('layouts.app')

@section('title')
    Crear Nuevo Post
@endsection

@section('content')
    <div class="md:flex md:items-center">
        <div class="px-10 md:w-1/2">
            Imagen Aqui
        </div>

        <div class="mt-10 rounded-lg bg-white p-10 shadow-xl md:mt-0 md:w-1/2">
            <form
                action="#"
                method="POST"
            >
                @csrf
                <div>
                    <div class="mb-5">
                        <label
                            for="title"
                            class="mb-2 block font-bold uppercase text-gray-500"
                        >Título</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="@error('title') border-red-500 @enderror w-full rounded-lg border p-3"
                            placeholder="Título de la publicación"
                            value="{{ old('title') }}"
                        >

                        @error('title')
                            <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label
                            for="description"
                            class="mb-2 block font-bold uppercase text-gray-500"
                        >Descripción</label>
                        <textarea
                            type="text"
                            id="description"
                            name="description"
                            class="@error('description') border-red-500 @enderror w-full rounded-lg border p-3"
                            placeholder="Descripción de la publicación"
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <p class="my-2 rounded-lg bg-red-500 p-2 text-center text-sm text-white">{{ $message }} </p>
                        @enderror
                    </div>
                </div>

                <input
                    type="submit"
                    value="Publicar"
                    class="w-full cursor-pointer rounded-lg bg-sky-600 p-3 font-bold uppercase text-white transition-colors hover:bg-sky-700"
                >

            </form>
        </div>
    </div>
@endsection
