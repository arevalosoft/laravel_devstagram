@extends('layouts.app')

@section('title')
    Página Principal
@endsection

@section('content')
    <x-list-posts :posts="$posts" />

    {{-- otra forma de hacer lo de arriba --}}
    {{-- @forelse ($posts as $post)
      <h1>{{ $post->title }}</h1>
    @empty
      <p>No hay posts</p>
    @endforelse --}}

@endsection

{{-- 
  @if ($posts->count())
      <div class="grid md:grid-cols-2 ls:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
        <div>
          <a href="{{ route('posts.show', [$post->user, $post]) }}">
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
  
  --}}