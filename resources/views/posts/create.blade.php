@extends('layouts.app')

@section('title')
  Crea una nueva publicación
@endsection

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
  <div class="md:flex md:items-center">
    <div class="md:w-6/12 px-10">
      <form id="dropzone" action="{{ route('images.store') }}" 
      method="POST" enctype="multipart/form-data" 
      class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        
      </form>
    </div>

    <div class="md:w-6/12 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
      <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="postTitle">Título</label>
          <input id="postTitle" name="postTitle" type="text" placeholder="Título de la publicación" class="w-full border p-3 rounded-lg @error('postTitle') border-red-500 @enderror" value="{{ old('postTitle') }}">
          @error('postTitle')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="postDescription">Descripción</label>
          <textarea id="postDescription" name="postDescription" placeholder="Descripción de la publicación" class="w-full border p-3 rounded-lg @error('postDescription') border-red-500 @enderror">{{ old('postDescription') }}</textarea>
          @error('postDescription')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <input type="submit" value="Crear Post" class="block bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white text-lg mx-auto p-2 rounded">
      </form>
    </div>
  </div>
@endsection