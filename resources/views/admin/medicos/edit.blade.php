@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar medico: {{$medico->nombres}} {{$medico->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-success">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/medicos',$medico->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombres</label> <b>*</b>
                                    <input type="text" value="{{$medico->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b>*</b>
                                    <input type="text" value="{{$medico->apellidos}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Direccion</label> <b>*</b>
                                    <input type="address" value="{{$medico->direccion}}" name="direccion" class="form-control" required>
                                    @error('direccion')
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
                                    <input type="text" value="{{$medico->telefono}}" name="telefono" class="form-control" required>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Ciudad</label> <b>*</b>                                   
                                    <input type="text" value="{{$medico->ciudad}}" name="ciudad" class="form-control" required>
                                    @error('ciudad')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero documento</label> <b>*</b>
                                    <input type="text" value="{{$medico->cedula}}" name="cedula" class="form-control" required>
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
                                    <label for="">Numero de seguro social</label> <b>*</b>
                                    <input type="text" value="{{$medico->num_seguro_social}}" name="num_seguro_social" class="form-control" required>
                                    @error('num_seguro_social')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero de colegiado</label> <b>*</b>
                                    <input type="text" value="{{$medico->num_colegiado}}" name="num_colegiado" class="form-control" required>
                                    @error('num_colegiado')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Tipo de medico</label> <b>*</b>
                                    <input type="text" value="{{$medico->tipo_medico}}" name="tipo_medico" class="form-control" required>
                                    @error('tipo_medico')
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
                                    <input type="email" value="{{$medico->user->email}}" name="email" class="form-control" required>
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
                                    <a href="{{url('admin/medicos')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar medico</buttom>
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