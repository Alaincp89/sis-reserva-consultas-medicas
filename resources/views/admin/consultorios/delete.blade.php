@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1> {{$consultorio->nombre}} - {{$consultorio->especialidad}} </h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-danger">
                <div class="card-header">
                <h3 class="card-title">¿Desea eliminar los datos del consultorio?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/consultorios',$consultorio->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombre</label> 
                                    <input type="text" value="{{$consultorio->nombre}}" name="nombres" class="form-control" disabled>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Ubicacion</label> 
                                    <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control" disabled>
                                    @error('ubicacion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Capacidad</label> 
                                    <input type="address" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control" disabled>
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
                                    <label for="">Telefono</label> 
                                    <input type="text" value="{{$consultorio->telefono}}" name="telefono" class="form-control" disabled>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Especialidad</label> 
                                    <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" disabled>
                                    @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Estado</label> 
                                    <input type="text" value="{{$consultorio->estado}}" name="estado" class="form-control" disabled>
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
                                    <button type="sutmit" class="btn btn-danger">Eliminar consultorio</buttom>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection