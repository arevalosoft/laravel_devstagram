@extends('layouts.app')

@section('title')
  Informacion de Cuenta :: Perfil {{ $user->username }}
@endsection

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
      <div class="w-8/12 lg:w-6/12 px-5">
        <img src="{{ asset('img/usuario.svg') }}" alt="Imagen del Usuario">
      </div>
      <div class="md:w-8/12 lg:w-6/12 px-5 md:flex md:flex-col md:justify-center items-center md:items-start py-10 md:py-10">
        <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

        <p class="text-gray-800 text-sm font-bold mb-3 mt-5">
          XXXX<span class="font-normal">&nbsp;seguidores</span>
        </p>

        <p class="text-gray-800 text-sm font-bold mb-3">
          XXXX<span class="font-normal">&nbsp;siguiendo</span>
        </p>

        <p class="text-gray-800 text-sm font-bold mb-3">
          XXXX<span class="font-normal">&nbsp;posts</span>
        </p>
      </div>
    </div>
  </div>

  <section class="container mx-auto mt-10">

    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    
    @if($posts->count() )

      <div class="grid md:grid-cols-2 ls:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
        <div>
          <a href="{{ route('posts.show', [$user, $post]) }}">
            <img src="{{ asset('uploads')  . '/' . $post->image }}" alt="Imagen del Post :: {{ $post->title }}">
          </a>
        </div>
        @endforeach
      </div>

      <div class="my-5">
        {{ $posts->links('pagination::tailwind'); }}
      </div>

    @else

      <p class="text-gray-600 uppercase text-sm font-bold text-center">¡No hay posts para mostrar!</p>

    @endif

  </section>
@endsection