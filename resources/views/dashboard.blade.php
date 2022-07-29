@extends('layouts.app')


@section('titulo')
    Perfil: {{$user->username}}
@endsection


@section('contenido')
    <div class="flex justify-center">

        <div class="flex flex-col w-full md:w-8/12 lg:w-6/12 md:flex-row md:gap-5 items-center">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/user.svg')}}" alt="Imagen Usuario">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center py-10 md:py-0 md:items-start">
                <p class="text-gray-700 text-2xl font-bold mb-3">{{$user->username}}</p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0 <span class="font-normal">Post</span>
                </p>
            </div>

        </div>
    </div>
@endsection
