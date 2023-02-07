<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevStagram - @yield('title')</title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="bg-gray-100 flex flex-col min-h-screen">
        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>

                @auth
                <nav class="flex gap-3 items-center">
                    <a href="{{ route('posts.create') }}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                          </svg>&nbsp;crear
                    </a>

                    <a class="font-bold  text-gray-600 text-sm" href="{{ route('posts.index', [auth()->user()->username]) }}">
                        <span class="font-normal">
                            Hola&nbsp;{{ auth()->user()->username }}
                        </span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm" href="{{ route('logout') }}">Cerrar Sesión</button>
                    </form>
                </nav>
                @endauth

                @guest
                <nav class="flex gap-3 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Ingresar</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Registro</a>
                </nav>
                @endguest

                {{-- @if (auth()->user())
                <nav class="flex gap-3 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="#">Salir</a>
                </nav>    
                @else
                <nav class="flex gap-3 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Ingresar</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Registro</a>
                </nav>
                @endif --}}
            </div>
            
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-2xl mb-10">@yield('title')</h2>
            @yield('content')
        </main>

        <footer class="mt-auto text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos reservados. {{ now()->year }}
        </footer>
    </body>
</html>
