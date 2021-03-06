@extends('estructura/layout')

@section('cuerpo')

<main class=p-2 id=cuerpo> {{-- Inicio main cuerpo --}}
    <div class=container>
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

{{-- inicio formulario nueva solicitud --}}
<div class="container-fluid p-1 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11">
            <div class="card-form bg-light">
                <div class="tittle card-header p-2 bg-light">
                    <h2 class="text-center fw-bold">Nueva Solicitud</h2>
                </div>
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
                    {{-- elija unidad academica e ingrese el legajo --}}
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Legajo</label>
                            <input class="border-0 cell" type="text" id="legajo" name="legajo" placeholder="Ingrese su legajo sin guion">
                        </div>
                        <div class="form-group col-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Unidad Académica</label>
                            <select class="form-select border-0 rounded-0 cell" aria-label="Default select example" name="unidadAcademica" id="unidadAcademica">
                            {{-- @foreach($unidadesAcademicas as $unidad)
                                <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
                                @endforeach 
                                --}}
                              </select>
                        </div>
                    </div>

                    {{-- elija la carrera --}}
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Carrera</label>
                            <select class="form-select border-0 rounded-0 cell" aria-label="Default select example" id="carrera" name="carrera">
                               {{-- @foreach($unidadesAcademicas as $unidad)
                                <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
                                @endforeach
                                --}}
                              </select>
                        </div>
                    </div>
                    {{-- ingrese universidad de destino --}}
                    <div class="row justify-content-between text-left ">
                        <div class="form-group col-12 flex-column d-flex py-3 ">
                            <label class="form-control-label px-3 py-2">Institución Educativa de Destino</label>
                            <input class="border-0 cell" type="text" id='universidadDestino' name='universidadDestino' placeholder="Ingrese la Institución Educativa de destino">
                        </div>
                    </div>
                    {{-- opcion extranjero --}}
                    <div class="row justify-content-between text-left ">
                        <div class="form-group col-12  ">
                            <label class="form-control-label px-3 py-2">¿La Institución Educativa es extranjera?</label>
                            {{-- <input class="border-0 cell" type="text" id='extranjero' name='extranjero' placeholder="Ingrese la Institución Educativa de destino"> --}}
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="extrajero" value="si">
                                <label class="form-check-label" for="extrajero">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="extrajero" value="no">
                                <label class="form-check-label" for="extrajero">No</label>
                            </div>
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
@endsection
