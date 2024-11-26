@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar secretaria: {{$secretaria->nombres}} {{$secretaria->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/secretarias',$secretaria->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombres</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->apellidos}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero documento</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->cedula}}" name="cedula" class="form-control" required>
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
                                    <label for="">Telefono</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->celular}}" name="celular" class="form-control" required>
                                    @error('celular')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Direccion</label> <b>*</b>
                                    <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control" required>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Ciudad</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->ciudad}}" name="ciudad" class="form-control" required>
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
                                    <label for="">Departamento</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->departamento}}" name="departamento" class="form-control" required>
                                    @error('departamento')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Codigo Postal</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->codigo_postal}}" name="codigo_postal" class="form-control" required>
                                    @error('codigo_postal')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero de seguro social</label> <b>*</b>
                                    <input type="text" value="{{$secretaria->num_seguro_social}}" name="num_seguro_social" class="form-control" required>
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
                                    <label for="">Correo Electronico</label> <b>*</b>
                                    <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" required>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña</label> 
                                    <input type="password" value="{{old('password')}}" name="password" class="form-control">
                                    @error('password')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Verificar Contraseña</label> 
                                    <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control">
                                    @error('password_confirmation')
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
                                    <button type="submit" class="btn btn-success">Actualizar secretaria</buttom>
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