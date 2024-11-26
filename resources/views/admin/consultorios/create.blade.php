@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo consultorio</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/consultorios/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> <b>*</b>
                                    <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Ubicacion</label> <b>*</b>
                                    <input type="text" value="{{old('ubicacion')}}" name="ubicacion" class="form-control" required>
                                    @error('ubicacion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Capacidad</label> <b>*</b>
                                    <input type="address" value="{{old('capacidad')}}" name="capacidad" class="form-control" required>
                                    @error('capacidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>                           
                        </div>
                        <br>                       
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Telefono</label> <b>*</b>
                                    <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad</label> <b>*</b>
                                    <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" required>
                                    @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Estado</label> <b>*</b>
                                    <input type="text" value="{{old('estado')}}" name="estado" class="form-control" required>
                                    @error('estado')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>                           
                        </div>                      
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="sutmit" class="btn btn-primary">Registrar consultorio</buttom>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection