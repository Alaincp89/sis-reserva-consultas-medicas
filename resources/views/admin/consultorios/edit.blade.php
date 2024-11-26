@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar: {{$consultorio->nombre}} - {{$consultorio->especialidad}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-success">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/consultorios',$consultorio->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> <b>*</b>
                                    <input type="text" value="{{$consultorio->nombre}}" name="nombre" class="form-control" required>
                                    @error('nombre')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Ubicación</label> <b>*</b>
                                    <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control" required>
                                    @error('ubicacion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Capacidad</label> <b>*</b>
                                    <input type="address" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control" required>
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
                                    <input type="text" value="{{$consultorio->telefono}}" name="telefono" class="form-control" required>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad</label> <b>*</b>                                   
                                    <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" required>
                                    @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Estado</label> <b>*</b>
                                    <input type="text" value="{{$consultorio->estado}}" name="estado" class="form-control" required>
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
                                    <button type="submit" class="btn btn-success">Actualizar consultorio</buttom>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>    
@endsection