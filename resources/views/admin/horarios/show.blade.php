@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Horarios</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title">Datos del horario asignado</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Día de la consulta</label>
                                    <p>{{$horario->dia}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora de Inicio</label>
                                    <p>{{$horario->hora_inicio}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Hora Final</label>
                                    <p>{{$horario->hora_fin}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre del Medico</label> 
                                    <p>
                                        {{$horario->medico->nombres ?? 'Sin médico asignado'}}
                                        {{$horario->medico->apellidos ?? ''}}
                                    </p>
                                </div>
                            </div>
                        </div>                  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Datos del consultorio</label>
                                    <p>
                                        {{$horario->consultorio->nombre}} -
                                        {{$horario->consultorio->especialidad}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Volver</a>                           
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>    
@endsection