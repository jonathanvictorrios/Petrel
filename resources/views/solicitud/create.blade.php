@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Crear solicitud')

@include('estructura/header')
<main class="p-5" id=cuerpo> <!-- Inicio main cuerpo -->
    <div class="container p-5">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

{{-- inicio formulario nueva solicitud --}}
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11">
            <div class="tittle">
                <h2 class="text-center fw-bold">Nueva Solicitud</h2>
            </div>
            <div class="card-form">
                <form class="form-card" action="{{route('solicitud.store')}}" method='POST'>
                    @csrf
                    {{-- ingrese nombre y apellido --}}
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Nombres</label>
                            <input class="border-0 cell" type="text" id="nombre" name="nombre" placeholder="Ingrese todos sus nombres">
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Apellidos</label>
                            <input class="border-0 cell" type="text" id="apellido" name="apellido" placeholder="Ingrese todos sus apellidos">
                        </div>
                    </div>
                    {{-- ingrese el legajo --}}
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Legajo</label>
                            <input class="border-0 cell" type="text" id="legajo" name="legajo" placeholder="Ingrese su legajo sin guion">
                        </div>
                    </div>
                    {{-- elija unidad académica --}}
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Unidad Académica</label>
                            <select class="form-select border-0 rounded-0 cell" aria-label="Default select example" name="unidadAcademica">
                                @foreach($unidadesAcademicas as $unidad)
                                <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    {{-- elija la carrera --}}
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Carrera</label>
                            <select class="form-select border-0 rounded-0 cell" aria-label="Default select example" id="carrera" name="carrera">
                                @foreach($unidadesAcademicas as $unidad)
                                <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    {{-- ingrese universidad de destino --}}
                    <div class="row justify-content-between text-left ">
                        <div class="form-group col-12 flex-column d-flex py-3 ">
                            <label class="form-control-label px-3 py-2">Universidad de Destino</label>
                            <input class="border-0 cell" type="text" id='universidadDestino' name='universidadDestino' placeholder="Ingrese la universidad de destino">
                        </div>
                    </div>

                    <div class="row justify-content-center text-center py-4">
                        <div class="form-group col-sm-6">
                            <button id="boton" name="boton" type="submit" class="btn-block w-100 p-1 rounded-2">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- fin formulario nueva solicitud --}}
{{-- <form action="{{route('solicitud.store')}}" method='POST' >
@csrf
-----------------formulario anterior-----------
<div class="row">
    <div class="col col-8">
    <label class="form-label" for="">Nombre:</label>
    <input type="text"  class='form-control' value='Nombre del Usuario Logueado' disabled>
    </div>
    <div class="col col-4">
    <label class="form-label" for="">Legajo</label>
    <input type="text" class='form-control' name='legajo'>
    </div>
</div>

<div class="row">
    <div class="col-col-12">
        <label class="form-label" for="">Universidad Destino</label>
        <input class='form-control' type="text" name='universidadDestino'>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Unidad Academica</label>
        <select class='form-control' name="unidadAcademica" id="">
        @foreach($unidadesAcademicas as $unidad)
            <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
        @endforeach
        </select>
    </div>
</div>
<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Carrera</label>
        <select class='form-control' name="carrera" id="">
        <!-- @foreach($unidadesAcademicas as $unidad)
            <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
        @endforeach -->
        </select>
    </div>
</div>

<button type='submit' class='btn btn-primary mt-2'>Enviar</button>
</form> --}}

</main> <!-- Fin main cuerpo -->

@endsection
