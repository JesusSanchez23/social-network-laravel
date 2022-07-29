<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Devstagram - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">


    @vite('resources/css/app.css')


</head>

<body class="bg-gray-100">
    <header class="p-5 border-b shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">Devstagram</h1>

            <nav class="flex gap-2 items-center">
                @auth
                    <a href="#" class=" font-bold ">Hola: {{auth()->user()->username}}</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" href="{{ route('logout') }}" class="uppercase font-bold text-gray-600 text-sm">Cerrar Sesión</button>
                    </form>
                @endauth (auth()->user())
                @guest
                    <a href="{{ route('login') }}" class="uppercase font-bold text-gray-600 text-sm">Login</a>
                    <a href="{{ route('register') }}" class="uppercase font-bold text-gray-600 text-sm">Crear cuenta</a>
                @endguest


            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-10">
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
</body>

</html>
