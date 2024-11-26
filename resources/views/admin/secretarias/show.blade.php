@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title">Datos de registro</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre completo</label>
                                    <p>{{$secretaria->nombres}} {{$secretaria->apellidos}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de identificacion</label>
                                    <p>{{$secretaria->cedula}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de Telefono</label>
                                    <p>{{$secretaria->celular}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Ciudad</label> 
                                    <p>{{$secretaria->ciudad}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Departamento</label>
                                    <p>{{$secretaria->departamento}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Codigo Postal</label>
                                    <p>{{$secretaria->codigo_postal}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de seguro social</label> 
                                    <p>{{$secretaria->num_seguro_social}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Volver</a>                           
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>    
@endsection