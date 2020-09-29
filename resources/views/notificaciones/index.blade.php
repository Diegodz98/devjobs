@extends('layouts.app')

@section('navegacion')
    @include('ui.navadministracion')

@endsection
@section('content')
    <h1 class="text-center text-2xl mt-10">Notificaciones</h1>

    @if (count($notificaciones) > 0)
        <ul class="max-w-md mx-auto mt-10">


            @foreach ($notificaciones as $notificacion)
                <li class="p-5 border border-gray-400 mb-5">
                    <p class="mb-4">Tienes un nuevo canditado en <span
                            class="font-bold">{{ $notificacion->data['vacante'] }}</span></p>
                    <p class="mb-4">Solicitadi: <span
                            class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span></p>
                    <a href="{{ route('candidatos.index', ['id' => $notificacion->data['vacante_id']]) }}"
                        class="bg-teal-500 p-3 inline-block text-xs font-bold uppercase text-white">Ver candidatos</a>
                </li>

            @endforeach
        </ul>
    @else
        <p class="text-center mt-5">No hay notificaciones</p>
    @endif
@endsection
