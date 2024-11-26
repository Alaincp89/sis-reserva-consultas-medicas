@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>{{$consultorio->nombre}}: {{$consultorio->especialidad}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title">Datos del consultorio</h3>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre consultorio</label>
                                    <p>{{$consultorio->nombre}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Ubicación</label>
                                    <p>{{$consultorio->ubicacion}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Capacidad</label>
                                    <p>{{$consultorio->capacidad}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Telefono</label> 
                                    <p>{{$consultorio->telefono}}</p>
                                </div>
                            </div>
                        </div>                  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Especialidad</label>
                                    <p>{{$consultorio->especialidad}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Estado</label> 
                                    <p>{{$consultorio->estado}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Volver</a>                           
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>    
@endsection