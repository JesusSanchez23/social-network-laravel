@extends('layouts.app')


@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')
    <div class="flex justify-center">

        <div class="flex flex-col w-full md:w-8/12 lg:w-6/12 md:flex-row md:gap-5 items-center">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->imagen ? asset('perfiles'.'/'.$user->imagen) : asset('img/user.svg') }}" alt="Imagen Usuario">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center py-10 md:py-0 md:items-start">

                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl font-bold mb-3">{{ $user->username }}</p>
    
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{route('perfil.index')}}" class="text-gray-500 hover:text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->followers->count()}} <span class="font-normal">@choice('seguidor|seguidores',$user->followers->count())</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->followings->count()}} <span class="font-normal">Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts->count()}} <span class="font-normal">Post</span>
                </p>
                @auth  
                @if ($user->id !== auth()->user()->id) 
                
                @if ($user->siguiendo(auth()->user()))
                <form action="{{route('users.unfollow', $user)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input 
                    type="submit"
                    class="bg-red-600 text-white uppercase rounded px-3 py-1 text-xs font-bold cursor-pointer"
                    value="Dejar de seguir"
                    />
                </form>
                @else         
                <form action="{{route('users.follow', $user)}}" method="POST">
                    @csrf
                    <input 
                    type="submit"
                    class="bg-blue-600 text-white uppercase rounded px-3 py-1 text-xs font-bold cursor-pointer"
                    value="Seguir"
                    />
                </form>
                @endif

                @endif    
                @endauth
            </div>

        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay Post</p>
        @endif
    </section>
@endsection
