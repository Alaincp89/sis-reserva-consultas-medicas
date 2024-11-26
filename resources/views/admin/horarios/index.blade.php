@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Horarios</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Horarios registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/horarios/create')}}" class="btn btn-primary">
                        Nuevo registro
                    </a>
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead style="background-color: #c0c0c0">
                            <tr>
                                <td style="text-align: center"><b>#</b></td>
                                <td style="text-align: center"><b>Día</b></td>
                                <td style="text-align: center"><b>Hora de Inicio</b></td>
                                <td style="text-align: center"><b>Hora Fin</b></td>
                                <td style="text-align: center"><b>ID Medico</b></td>
                                <td style="text-align: center"><b>ID Consultorio</b></td>                                                                               
                                <td style="text-align: center"><b>Acciones</b></td> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?> 
                        @foreach($horarios as $horario)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td style="text-align: center">{{$horario->dia}}</td>
                                <td style="text-align: center">{{$horario->hora_inicio}}</td>
                                <td style="text-align: center">{{$horario->hora_fin}}</td>
                                <td style="text-align: center">{{$horario->medico_id}}</td>
                                <td style="text-align: center">{{$horario->consultorio_id}}</td>
                                <td style="text-align: center"> 
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
                                    </div>
                                </td>
                            </tr>           
                        @endforeach
                        </tbody>
                    </table>   
                    <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando START a END de TOTAL horarios",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 horarios",
                                    "infoFiltered": "(Filtrado de MAX total horarios)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar MENU horarios",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>  
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Calendario de atencion de Medicos</h3>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped table-hover table-sm table-bordered">
                        <thead>
                            <tr style="text-align: center">
                                <th>Hora</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                                <th>Sabado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $horas = ['08:00:00 - 09:00:00','09:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','12:00:00 - 13:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00'];
                                $dias_semana = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO'];
                            @endphp
                            @foreach ($horas as $hora)
                                @php
                                    list($hora_inicio,$hora_fin) = explode(' - ',$hora);
                                @endphp
                                <tr style="text-align: center">
                                    <td>{{$hora}}</td>
                                    @foreach ($dias_semana as $dia)
                                        @php
                                            $nombre_medico = '';
                                            foreach ($horarios as $horario){
                                                if(strtoupper($horario->dia) == $dia && 
                                                $hora_inicio >= $horario->hora_inicio && 
                                                $hora_fin <= $horario->hora_fin){
                                                    $nombre_medico = $horario->medico_id;
                                                    break;
                                                }
                                            }
                                                
                                        @endphp
                                        <td>{{$nombre_medico}}</td>
                                    @endforeach
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                   
                </div>
            </div>
        </div>
        
    </div>
@endsection