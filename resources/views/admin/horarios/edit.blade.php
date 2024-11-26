@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar Horario del dia  {{$horario->dia}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-11">
            <div class="card card-outline card-success">
                <div class="card-header">
                <h3 class="card-title">Complete los datos de registro</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/horarios',$horario->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Día de la consulta</label> <b>*</b>
                                    <input type="text" value="{{$horario->dia}}" name="dia" class="form-control" required>
                                    @error('dia')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora de Inicio</label> <b>*</b>
                                    <input type="time" value="{{$horario->hora_inicio}}" name="hora_inicio" class="form-control" required>
                                    @error('hora_inicio')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Hora Final</label> <b>*</b>
                                    <input type="time" value="{{$horario->hora_fin}}" name="hora_fin" class="form-control" required>
                                    @error('hora_fin')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medico_id">Consultorio</label> <b>*</b>
                                    <select name="medico_id" id="medico_id" class="form-control" required>
                                        <option value="">Seleccione un consultorio</option>
                                        @foreach ($consultorios as $consultorio)
                                            <option value="{{ $consultorio->id }}" {{ old('consultorio_id') == $consultorio->id ? 'selected' : '' }}>
                                                {{ $consultorio->nombre }} {{ $consultorio->especialidad }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            
                        </div>                                                                
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar horario</buttom>
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