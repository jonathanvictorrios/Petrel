@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Crear Año - Petrel')@endphp
@include('estructura/header')
<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

    {{-- inicio formulario nuevo año --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Nueva Carpeta Año</h2>
                    </div>
                    <form class="form-card" action="{{ route('anio.store') }}" method="POST" autocomplete="off">
                        @csrf
                        {{-- ingrese año --}}
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-control py-2">Año</label>
                                <input class="border-0 cell" type="number" id="anio" name="anio" value="{{ old('anio') }}" placeholder="Ingrese año válido">
                            </div>
                        </div>
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    {{-- @extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('anio.store') }}" method="POST" autocomplete="off">
    @csrf
    <h1>Creando una carpeta de año</h1>
    Año de para la nueva carpeta:
    <input type="number" id="anio" name="anio" value="{{ old('anio') }}">
    <input type="submit" value="enviar">
</form>

@endsection --}}
