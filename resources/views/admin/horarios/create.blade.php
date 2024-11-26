@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo horario</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/horarios/create')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="consultorio_id">Consultorios</label> <b>*</b>
                                    <select name="consultorio_id" id="consultorio_id" class="form-control" required>
                                        <option value="">Seleccione un médico</option>
                                        @foreach ($consultorios as $consultorio)
                                            <option value="{{ $consultorio->id }}" {{ old('consultorio_id') == $consultorio->id ? 'selected' : '' }}>
                                                {{ $consultorio->nombre }} - {{ $consultorio->especialidad }}
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
                                    <label for="">Día</label> <b>*</b>
                                    <select name="dia" id="" class="form-control">
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIERCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        <option value="SABADO">SABADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora Inicio</label> <b>*</b>
                                    <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora Final</label> <b>*</b>
                                    <input type="time" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>                           
                        </div>                                                                                   
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
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