@extends('layouts.app')

@section('titulo')
     Inicia Sesion en DevInstagram
@endsection

@section('contenido')
   <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="p-5 md:w-6/12">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro de usuario">
        </div>

        <div class="p-6 bg-white rounded-lg shadow-xl md:w-4/12">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje'))
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                    {{ session('mensaje') }}
                </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="block mb-2 font-extrabold text-gray-500 uppercase">
                       Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email de registro"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500
                        @enderror"
                        value="{{ old('email') }}"
                    />
                </div>
                @error('email')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">
                        {{ $message }}
                    </p>
                 @enderror

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

                <div class="mb-5">
                    <input type="checkbox" name="remember">
                        <label class="text-gray-500">
                            Mantener mi sesion abierta</label>
                </div>

                <input
                    type="submit"
                    value="Iniciar Sesion"
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"

                />

            </form>

        </div>

   </div>
@endsection



