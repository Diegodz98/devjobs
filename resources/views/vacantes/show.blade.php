@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection
@section('content')
    <h1 class="text-2xl text-center mt-10">{{ $vacante->titulo }}</h1>
    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
                Por: <span class="font-normal">{{ $vacante->reclutador->name }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Categoria: <span class="font-normal">{{ $vacante->categoria->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Ubicacion: <span class="font-normal">{{ $vacante->ubicacion->nombre }}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal">{{ $vacante->experiencia->nombre }}</span>
            </p>
            @php
                $arraySkills= explode(',',$vacante->skills)
            @endphp
            <h2 class="text-2xl text-center mt-10 text-gray-700 mb-5">Conocimientos y Tecnologias</h2>
            @foreach ($arraySkills as $skill)
            <p class="inline-block text-gray-700 my-2 rounded border-gray-500 border px-5 py-3">
               {{$skill}}
            </p>
            
            @endforeach
        <a href="/storage/vacantes/{{$vacante->imagen}}"  data-lightbox="imagen" data-title="Vacante {{$vacante->titulo}}">
                <img src="/storage/vacantes/{{$vacante->imagen}}" alt="" class="w-40 mt-10">
            </a>
            <div class="mt-10 mb-5">
                {{!!$vacante->descripcion!!}}
            </div>

        </div>
        @if ($vacante->activa===1)
        <div class="md w-2/5 bg-teal-500 p-5 rounded m-3">
            <h2 class="text-2xl text-white uppercase font-bold text-center" >Contacta al reclutador</h2>
        <form action="{{route('candidatos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-white text-sm font-bold my-4">
                        Nombre: 
                    </label>
                <input type="text" name="nombre" id="nombre" class="p-3 bg-gray-100 rounded form-input w-full mb-5 @error('nombre') border border-red-500 @enderror" placeholder="Tu nombre" value="{{old('nombre')}}">
                @error('nombre')
                <span class=" mt-5 bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm p-4" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="mb-4">
                    <label for="nombre" class="block text-white text-sm font-bold my-4">
                        Email: 
                    </label>
                <input type="email" name="email" id="email" class="p-3 bg-gray-100 rounded form-input w-full mb-5 @error('email') border border-red-500 @enderror" placeholder="Tu email" value="{{old('email')}}">
                @error('email')
                <span class=" mt-5 bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm p-4" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="mb-4">
                    <label for="nombre" class="block text-white text-sm font-bold my-4">
                        Hoja de vida(PDF): 
                    </label>
                <input type="file" name="cv" id="cv" class="p-3 bg-gray-100 rounded form-input w-full mb-5 @error('cv') border border-red-500 @enderror" accept="application/pdf">
                @error('cv')
                <span class=" mt-5 bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm p-4" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
            <input type="hidden" name="vacante_id" value="{{$vacante->id}}">
            <button type="submit"
            class="bg-teal-900 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
            Publicar Vacante
        </button>
            </form>
        </div>  
        @endif
        
        

    </div>
@endsection
