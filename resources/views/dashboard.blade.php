@extends('layouts.app')


@section('titulo')
    Tu cuenta
@endsection


@section('contenido')
    <div class="flex justify-center">

        <div class="md:flex w-full md:w-8/12 lg:w-6/12 md:gap-5 md:items-center">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/user.svg')}}" alt="Imagen Usuario">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl font-bold">{{auth()->user()->username}}</p>
            </div>

        </div>
    </div>
@endsection
