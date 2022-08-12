<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')
    <title>Devstagram - @yield('titulo')</title>
    {{-- <link rel="stylesheet" href="{{ asset('js/app.js') }}"> --}}
    <script src="{{ asset('js/app.js') }}"></script>


    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    {{-- <script src="./path/to/your/powerglitch.min.js"></script> --}}
    @livewireStyles

</head>

<body class="bg-gray-100">
    <header class="p-5 border-b shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{route('home')}}">
                <h1 class="text-3xl font-black">Devstagram</h1>
            </a>

            <nav class="flex gap-2 items-center">
                @auth
                    <a href="{{route('posts.create')}}" class="flex items-center gap-2 border p-2 text-gray-700 rounded text-sm cursor-pointer font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>
                        Crear</a>
                    <a href="{{route('posts.index', auth()->user()->username)}}" class=" font-bold ">Hola: {{ auth()->user()->username }}</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" href="{{ route('logout') }}"
                            class="uppercase font-bold text-gray-600 text-sm">Cerrar Sesión</button>
                    </form>
                @endauth (auth()->user())
                @guest
                    <a href="{{ route('login') }}" class="uppercase font-bold text-gray-600 text-sm">Login</a>
                    <a href="{{ route('register') }}" class="uppercase font-bold text-gray-600 text-sm">Crear cuenta</a>
                @endguest


            </nav>
        </div>
    </header>

    <main class="container mt-10 mx-auto">
        <h2 class="font-black mb-10 text-3xl text-center">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="text-center uppercase font-bold mt-10">
        Devstagram - Todos los derechos reservados {{ now()->year }}

        {{-- @php
            echo date('Y')
        @endphp --}}
    </footer>

    @livewireScripts
</body>

</html>
