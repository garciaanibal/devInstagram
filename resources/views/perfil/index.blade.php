@extends('layouts.app')

@section('titulo')
    Editar Perfil:{{ Auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 md:mt-0">
            <form method="Post" action="{{ route('perfil.store')}}" enctype="multipart/form-data">

                @csrf
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-extrabold text-gray-500 uppercase">
                       Username
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500
                        @enderror"
                        value="{{ auth()->user()->username }}"
                    />

                    @error('username')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-extrabold text-gray-500 uppercase">
                       Imagen Perfil
                    </label>
                    <input
                        id="imagen"
                        name="imagen"
                        type="file"
                        value=""
                        accept=".jpg, .jpeg, .png, .gif"
                    />
                    <input
                    type="submit"
                    value="Guardar Cambios"
                    class="w-full p-3 mt-4 font-bold text-white uppercase transition-colors rounded-lg cursor-poinfirst:ter bg-sky-600 hover:bg-sky-700"

                />
                </div>
            </form>
        </div>
    </div>
@endsection
