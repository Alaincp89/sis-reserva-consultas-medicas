@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Medico {{$medico->tipo_medico}}: {{$medico->nombres}} {{$medico->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title">Datos del medico</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre completo</label>
                                    <p>{{$medico->nombres}} {{$medico->apellidos}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de identificacion</label>
                                    <p>{{$medico->cedula}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de Telefono</label>
                                    <p>{{$medico->telefono}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Dirección</label> 
                                    <p>{{$medico->direccion}}</p>
                                </div>
                            </div>
                        </div>                  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de colegiado</label>
                                    <p>{{$medico->num_colegiado}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Numero de seguro social</label> 
                                    <p>{{$medico->num_seguro_social}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/medicos')}}" class="btn btn-secondary">Volver</a>                           
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>    
@endsection