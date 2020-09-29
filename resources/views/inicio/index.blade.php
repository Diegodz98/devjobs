@extends('layouts.app')

@section('navegacion')
    @include('ui.navcategorias')
@endsection
@section('content')
    <div class="flex flex-col lg:flex-row shadow bg-white mt-10">
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24 t">
            <p class="text-2xl text-gray-700">Dev<span class="font-bold">Jobs</span></p>
            <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-700 leading-tight">Encuentra un trabajo remoto en tu pais
                <span class="text-teal-500 block ">Para Desarrolladores y diseñadores Web</span>
            </h1>

            <h2 class="my-10 text-2xl text-center text-gray-700">Busca una vacante</h2>
        <form action="{{route('vacantes.buscar')}}" method="POST">
            @csrf
                <div class="mb-5">
                    <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria </label>
                    <select id="categoria"
                        class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
                        name="categoria">
                        <option disabled selected>Seleciona una Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option {{ old('categoria') == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}</option>
                        @endforeach
        
                    </select>
                    @error('categoria')
                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
        
        
                </div>
                <div class="mb-5">
                    <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicacion </label>
                    <select id="ubicacion"
                        class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
                        name="ubicacion">
                        <option disabled selected>Ubicacion</option>
                        @foreach ($ubicaciones as $ubicacion)
        
                            <option {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }} value="{{ $ubicacion->id }}">
                                {{ $ubicacion->nombre }}</option>
                        @endforeach
                       
                    </select>
                    @error('ubicacion')
                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit"
            class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
            Buscar Vacantes
        </button>
            </form>

        </div>
        <div class="block lg:w-1/2">
        <img src="{{asset('img/banner.jpg')}}" alt="" class="inset-0 h-full w-full object-cover ">
        </div>
    </div>
    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">Nuevas <span class="font-bold">Vacantes</span></h1>
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
@endsection
