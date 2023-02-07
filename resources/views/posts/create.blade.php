@extends('layouts.app')

@section('title')
  Crea una nueva publicación
@endsection

@push('styles')
  {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
  <div class="md:flex md:items-center">
    <div class="md:w-6/12 px-10">
      <form id="dropzone" action="{{ route('images.store') }}" 
      method="POST" enctype="multipart/form-data" 
      class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        @csrf
      </form>
    </div>

    <div class="md:w-6/12 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
      <form action="{{ route('posts.store') }}" method="POST" novalidate>
        @csrf
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="title">Título</label>
          <input id="title" name="title" type="text" placeholder="Título de la publicación" class="w-full border p-3 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">
          @error('title')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="description">Descripción</label>
          <textarea id="description" name="description" placeholder="Descripción de la publicación" class="w-full border p-3 rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
          @error('description')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <input type="hidden" name="image" value="{{ old('image') }}">  
          @error('image')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>

        <input type="submit" value="Crear Post" class="block bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white text-lg mx-auto p-2 rounded">
      </form>
    </div>
  </div>
@endsection