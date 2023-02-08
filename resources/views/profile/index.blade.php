@extends('layouts.app')

@section('title')
  Editar Perfil: {{ auth()->user()->username }}
@endsection


@section('content')
  <div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6 rounded-lg">
      <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
        @csrf
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">Usuario</label>
          <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" 
            class="w-full border p-3 rounded-lg @error('username') border-red-500 @enderror" 
            value="{{ auth()->user()->username }}">
          @error('username')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="image">Imagen del Perfil</label>
          <input 
            class="w-full border p-3 rounded-lg"
            id="image" 
            name="image" 
            type="file" 
            accept=".jpg,.jpeg,.png"
            value=""
          >
        </div>

        <input type="submit" value="Guardar Cambios" class="block bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white text-lg mx-auto p-2 rounded">
      </form>
    </div>
  </div>
@endsection