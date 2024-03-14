@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
   @if($posts->count())

   <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @foreach ($posts as $post )
            {{-- {{dd($post)}} --}}
            <div>
                <a href="{{ route('posts.show', [ 'post'=>$post,'user'=>$post->user ]) }}">
                    <img src="{{asset('uploads').'/'.$post->imagen}}" alt="imangen del post {{$post->titulo}}">
                </a>
            </div>
        @endforeach
    </div>

    <div class="my-10">
        {{ $posts->links('') }}
    </div>

   @else
   <p class="text-sm font-bold text-center text-gray-600 uppercase">No hay posts sigue a alguien</p>
   @endif
@endsection
