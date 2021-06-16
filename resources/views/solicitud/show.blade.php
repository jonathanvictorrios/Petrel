@extends('estructura/layout')

@section('contenido')

<div class="row">
    <div class="col col-8">
    <label class="form-label" for="">Fecha Inicio</label>
    <input type="text" class='form-control' name='fechaInicio' value='{{$solicitud->Estado->created_at}}' disabled>
    </div>
    <div class="col col-4">
    <label class="form-label" for="">Legajo</label>
    <input type="text" class='form-control' name='legajo' value='{{$solicitud->legajo}}' disabled>
    </div>
</div>

<div class="row">
    <div class="col-col-12">
        <label class="form-label" for="">Universidad Destino</label>
        <input class='form-control' type="text" name='universidadDestino' value="{{$solicitud->universidad_destino}}" disabled>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Unidad Academica</label>
        <input class='form-control' type="text" name="unidadAcademica" value='{{$solicitud->unidadAcademica->unidad_academica}}' disabled>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Carrera</label>
        <input class='form-control' type="text" name='carrera' value='{{$solicitud->carrera->carrera}}' disabled>
    </div>
</div>

<a href="{{route('solicitud.index')}}" class='btn btn-primary'>Volver</a>

@endsection


<label class="form-label" for="">Nombre:</label>
    <input type="text"  class='form-control' value='{{$solicitud->usuarioEstudiante->nombre}}' disabled>