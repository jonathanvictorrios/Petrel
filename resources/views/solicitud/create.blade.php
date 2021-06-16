@extends('estructura/layout')


@section('contenido')
<form action="{{route('solicitud.store')}}" method='POST' >
@csrf
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
        <select class='form-control' name="unidadAcademica" id="unidadAcademica">
        @foreach($unidadesAcademicas as $unidad)
            <option value="{{$unidad->id_unidad_academica}}">{{$unidad->unidad_academica}}</option>
        @endforeach
        </select>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Carrera</label>
        <select class='form-control' name="carrera" id="carrera">

        </select>
    </div>
</div>

<button type='submit' class='btn btn-primary mt-2'>Enviar</button>
</form>

<a href="{{route('solicitud.index')}}" class='btn btn-primary'>Volver</a>

@endsection