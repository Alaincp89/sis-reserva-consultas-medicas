@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-success">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/pacientes',$paciente->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombres</label> <b>*</b>
                                    <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b>*</b>
                                    <input type="text" value="{{$paciente->apellidos}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero documento</label> <b>*</b>
                                    <input type="text" value="{{$paciente->cedula}}" name="cedula" class="form-control" required>
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
                                    <input type="text" value="{{$paciente->telefono}}" name="telefono" class="form-control" required>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Direccion</label> <b>*</b>
                                    <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control" required>
                                    @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medico_id">Médico Asignado</label> <b>*</b>
                                    <select name="medico_id" id="medico_id" class="form-control" required>
                                        <option value="">Seleccione un médico</option>
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                                                {{ $medico->nombres }} {{ $medico->apellidos }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <br> 
                        <div class="row">  
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Codigo Postal</label> <b>*</b>
                                    <input type="text" value="{{$paciente->codigo_postal}}" name="codigo_postal" class="form-control" required>
                                    @error('codigo_postal')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>           
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero de seguro social</label> <b>*</b>
                                    <input type="text" value="{{$paciente->num_seguro_social}}" name="num_seguro_social" class="form-control" required>
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
                                    <input type="email" value="{{$paciente->user->email}}" name="email" class="form-control" required>
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
                                    <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar paciente</buttom>
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