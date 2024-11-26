@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                <h3 class="card-title">¿Desea eliminar los datos de la secretaria?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/secretarias',$secretaria->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombres</label> 
                                    <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" disabled>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> 
                                    <input type="text" value="{{$secretaria->apellidos}}" name="apellidos" class="form-control" disabled>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero documento</label> 
                                    <input type="text" value="{{$secretaria->cedula}}" name="cedula" class="form-control" disabled>
                                    @error('cedula')
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
                                    <input type="text" value="{{$secretaria->celular}}" name="celular" class="form-control" disabled>
                                    @error('celular')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Direccion</label> 
                                    <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control" disabled>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Ciudad</label> 
                                    <input type="text" value="{{$secretaria->ciudad}}" name="ciudad" class="form-control" disabled>
                                    @error('ciudad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Departamento</label> 
                                    <input type="text" value="{{$secretaria->departamento}}" name="departamento" class="form-control" disabled>
                                    @error('departamento')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Codigo Postal</label> 
                                    <input type="text" value="{{$secretaria->codigo_postal}}" name="codigo_postal" class="form-control" disabled>
                                    @error('codigo_postal')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numuro de seguro social</label> 
                                    <input type="text" value="{{$secretaria->num_seguro_social}}" name="num_seguro_social" class="form-control" disabled>
                                    @error('num_seguro_social')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico</label> 
                                    <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" disabled>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>                   
                        </div>
                        
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="sutmit" class="btn btn-danger">Eliminar secretaria</buttom>
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