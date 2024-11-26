@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title">Datos del paciente</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre completo</label>
                                    <p>{{$paciente->nombres}} {{$paciente->apellidos}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de identificacion</label>
                                    <p>{{$paciente->cedula}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de Telefono</label>
                                    <p>{{$paciente->telefono}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Dirección</label> 
                                    <p>{{$paciente->direccion}}</p>
                                </div>
                            </div>
                        </div>                  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Codigo Postal</label>
                                    <p>{{$paciente->codigo_postal}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de seguro social</label> 
                                    <p>{{$paciente->num_seguro_social}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Medico asignado</label> 
                                    <p>
                                        {{$paciente->medico->nombres ?? 'Sin médico asignado'}}
                                        {{$paciente->medico->apellidos ?? ''}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Volver</a>                           
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>    
@endsection