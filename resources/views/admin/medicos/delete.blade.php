@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Medico {{$medico->tipo_medico}}: {{$medico->nombres}} {{$medico->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-danger">
                <div class="card-header">
                <h3 class="card-title">¿Desea eliminar los datos del medico?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/medicos',$medico->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombres</label> 
                                    <input type="text" value="{{$medico->nombres}}" name="nombres" class="form-control" disabled>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> 
                                    <input type="text" value="{{$medico->apellidos}}" name="apellidos" class="form-control" disabled>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Direccion</label> 
                                    <input type="address" value="{{$medico->direccion}}" name="direccion" class="form-control" disabled>
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
                                    <label for="">Telefono</label> 
                                    <input type="text" value="{{$medico->telefono}}" name="telefono" class="form-control" disabled>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero documento</label> 
                                    <input type="text" value="{{$medico->cedula}}" name="cedula" class="form-control" disabled>
                                    @error('cedula')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Ciudad</label> 
                                    <input type="text" value="{{$medico->ciudad}}" name="ciudad" class="form-control" disabled>
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
                                    <label for="">Numero de seguro social</label> 
                                    <input type="text" value="{{$medico->num_seguro_social}}" name="num_seguro_social" class="form-control" disabled>
                                    @error('num_seguro_social')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero de colegiado</label> 
                                    <input type="text" value="{{$medico->num_colegiado}}" name="num_colegiado" class="form-control" disabled>
                                    @error('num_colegiado')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Correo Electronico</label> 
                                    <input type="email" value="{{$medico->user->email}}" name="email" class="form-control" disabled>
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
                                    <a href="{{url('admin/medicos')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="sutmit" class="btn btn-danger">Eliminar medico</buttom>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection