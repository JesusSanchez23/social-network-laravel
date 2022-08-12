@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de post {{ $post->titulo }}">
            <div class="p-3 flex items-center gap-4">

                @auth
                <livewire:like-post :post="$post"/>
                    {{-- @if ($post->checkLike(auth()->user()))
                    <form action="{{ route('post.likes.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="my-4">
                          
                        </div>
                    </form>
                    @else
                    <form action="{{ route('post.likes.store', $post) }}" method="POST">
                        @csrf
                        <div class="my-4">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    @endif --}}
                @endauth
                <p class="font-bold">{{$post->likes->count()}} <span class="font-normal">Likes</span></p>
            </div>
            <div class="p-3">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="bg-red-600 text-white font-bold cursor-pointer p-2 rounded"
                            value="Eliminar Publicación">
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            @auth
                @if (session('mensaje'))
                    <div class="bg-green-400 rounded p-2 mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <div class="shadow bg-white p-5 mb-5">
                    <p class="text-xl font-bold mb-4">Agrega un nuevo comentario</p>
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="uppercase mb-2 text-gray-500 font-bold">Comentario:</label>
                            <textarea name="comentario" id="comentario" placeholder="Envia un comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ $message }}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="Enviar Comentario"
                            class="bg-sky-600 transition-colors w-full p-3 rounded-lg text-white font-bold cursor-pointer">
                    </form>
                </div>
            @endauth

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                        <div class="p-5 border-gray-300 border-b">
                            <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                {{ $comentario->user->username }}
                            </a>
                            <p>{{ $comentario->comentario }}</p>
                            <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center">No hay comentarios aún</p>
                @endif
            </div>
        </div>
    </div>
@endsection
