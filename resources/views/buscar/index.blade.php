@extends('layouts.app')

@section('navegacion')
@include('ui.navcategorias')

@endsection
@section('content')
    @if (count($vacantes)>0)
    <div class="flex flex-col lg:flex-row shadow bg-white mt-10">
        
    </div>
    <div class="my-10 bg-gray-100 p-10 shadow">
    <h1 class="text-center text-gray-700 m-0 text-3xl">Resutados de la busqueda</h1>

        <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($vacantes as $vacante)
                <li class="p-10 border border-gray-300 bg-white shadow">
                    <h2 class="text-2xl font-bold text-teal-500">{{$vacante->titulo}}</h2>
                <p class="block text-gray-700 my-2 font-normal">{{$vacante->categoria->nombre}}</p>
                <p class="block text-gray-700 my-2 font-normal">Ubicacion:
                    <span class="font-bold">{{$vacante->ubicacion->nombre}}</span></p>
                    <p class="block text-gray-700 my-2 font-normal">Experiencia:
                        <span class="font-bold">{{$vacante->experiencia->nombre}}</span></p>
                        <a href="{{route('vacantes.show',['vacante'=>$vacante->id])}}" class="bg-teal-500 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm">
                            Ver Vacante
                        </a>
                </li>
                
            @endforeach
        </ul>
    </div>
    @else

    <p class="text-center text-gray-700">No hay vacantes que coincidad con esta busqueda</p>
    @endif
@endsection
