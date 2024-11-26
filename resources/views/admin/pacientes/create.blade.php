@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo paciente</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/pacientes/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Nombres</label> <b>*</b>
                                    <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                                    @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Apellidos</label> <b>*</b>
                                    <input type="text" value="{{old('apellidos')}}" name="apellidos" class="form-control" required>
                                    @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Direccion</label> <b>*</b>
                                    <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
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
                                    <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                                    @error('telefono')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Codigo Postal</label> <b>*</b>
                                    <input type="text" value="{{old('codigo_postal')}}" name="codigo_postal" class="form-control" required>
                                    @error('codigo_postal')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Numero documento</label> <b>*</b>
                                    <input type="text" value="{{old('cedula')}}" name="cedula" class="form-control" required>
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
                                    <input type="text" value="{{old('num_seguro_social')}}" name="num_seguro_social" class="form-control" required>
                                    @error('num_seguro_social')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medico_id">Médicos</label> <b>*</b>
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
                                    <label for="">Correo Electronico</label> <b>*</b>
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña</label> <b>*</b>
                                    <input type="password" value="{{old('password')}}" name="password" class="form-control" required>
                                    @error('password')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Verificar Contraseña</label> <b>*</b>
                                    <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control" required>
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
                                    <button type="sutmit" class="btn btn-primary">Registrar paciente</buttom>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection