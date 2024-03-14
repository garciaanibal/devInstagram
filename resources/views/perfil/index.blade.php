@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="p-6 bg-white shadow md:w-1/2">
            <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">
                           Username
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}"
                    />

                    @error('username')
                        <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="block mb-2 font-bold text-gray-500 uppercase">
                           Imagen Perfil
                    </label>
                    <input
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="w-full p-3 border rounded-lg"
                        value=""
                        accept=".jpg, .jpeg, .png"
                    />
                </div>

                <div class="mb-5">
                    <label for="password" class="block mb-2 font-extrabold text-gray-500 uppercase">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password de registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500
                        @enderror"
                    />
                </div>
                @error('password')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{ $message }}
                    </p>
                @enderror
                
                <input
                    type="submit"
                    value="Guardar Cambios"
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                />
            </form>
        </div>
    </div>
@endsection
