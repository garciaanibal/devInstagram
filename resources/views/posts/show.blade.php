@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container  mx-auto md:flex">
        <div class="w-1/2">
            <img src="{{asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->titulo}}">

            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div>
                <p class="font-bold"> {{$post->user->username}}</p>
                <p class="text-sm text-gray-500"> {{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5"> {{$post->descripcion}}</p>
            </div>

        </div>

        <div class="w-1/2 p-5">
            <div>
                @auth

                    <p class="text-xl font-bold text-center  mb-4">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-blod">
                            {{session('mensaje')}}
                        </div>
                    @endif

                    <form action="{{route('comentario.store',['post'=>$post,'user'=>$user])}}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="coment" class="mb-2 block uppercase text-gray-500 font-bold">
                                Añade un comentario
                            </label>
                            <textarea
                                id="coment"
                                name="coment"
                                placeholder="Agrega tu comentario"
                                class="border p-3 w-full max-h-96 rounded-lg @error('name') border-red-500 @enderror"
                            >{{ old('coment')}}</textarea>

                            @error('coment')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>
                        <input
                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                        uppercase font-bold w-full p-3 text-white rounded-lg"

                    />
                    </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    {{-- {{dd($post->comentarios)}}; --}}
                    @if ($post->comentarios->count())

                        @foreach ($post->comentarios as $coment )

                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{route('post.index',$coment->user->username)}}" class="font-bold">
                                    {{$coment->user->username}}
                                </a>
                                <p>{{$coment->coment}}</p>
                                <p class="text-sm text-gray-500">{{$coment->created_at->diffForHumans()}}</p>
                            </div>

                        @endforeach

                    @else
                        <p class="p-10 text-center">No Hay Comentarios Aun</p>
                    @endif

                </div>
            </div>

        </div>

    </div>

@endsection
