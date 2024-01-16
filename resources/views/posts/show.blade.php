@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
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

            @auth
                @if($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{route('posts.destroy',$post)}}">
                        @method('DELETE') {{--method spoofing--}}
                            @csrf
                                <input
                                type="submit"
                                value="Eliminar publicacion"
                                class="p-2 mt-4 font-bold text-white bg-red-500 rounded cursor-pointer hover:bg-red-600"
                                />
                      </form>
                @endif
             @endauth

        </div>

        <div class="w-1/2 p-5">
            <div>
                @auth

                    <p class="mb-4 text-xl font-bold text-center">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="p-2 mb-6 text-center text-white uppercase bg-green-500 rounded-lg font-blod">
                            {{session('mensaje')}}
                        </div>
                    @endif

                    <form action="{{route('comentario.store',['post'=>$post,'user'=>$user])}}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="coment" class="block mb-2 font-bold text-gray-500 uppercase">
                                Añade un comentario
                            </label>
                            <textarea
                                id="coment"
                                name="coment"
                                placeholder="Agrega tu comentario"
                                class="border p-3 w-full max-h-96 rounded-lg @error('name') border-red-500 @enderror"
                            >{{ old('coment')}}</textarea>

                            @error('coment')
                                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }} </p>
                            @enderror
                        </div>
                        <input
                        type="submit"
                        value="Comentar"
                        class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"

                    />
                    </form>
                @endauth
                <div class="mb-5 overflow-y-scroll bg-white shadow max-h-96">
                    {{-- {{dd($post->comentarios)}}; --}}
                    @if ($post->comentarios->count())

                        @foreach ($post->comentarios as $coment )

                            <div class="p-5 border-b border-gray-300">
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
