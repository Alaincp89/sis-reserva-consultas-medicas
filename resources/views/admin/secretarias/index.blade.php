@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de Secretarias</h1>
    </div>

    <div class="row">
        <div class="col-md-20">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Secretarias registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/secretarias/create')}}" class="btn btn-primary">
                        Registar Nuevo
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
                                <td style="text-align: center"><b>Nombres</b></td>
                                <td style="text-align: center"><b>Apellidos</b></td>
                                <td style="text-align: center"><b>Cedula</b></td>
                                <td style="text-align: center"><b>Telefono</b></td>
                                <td style="text-align: center"><b>Direccion</b></td>
                                <td style="text-align: center"><b>Ciudad</b></td>
                                <td style="text-align: center"><b>Departamento</b></td>
                                <td style="text-align: center"><b>Codigo Postal</b></td>
                                <td style="text-align: center"><b>Seguro social</b></td>   
                                <td style="text-align: center"><b>Acciones</b></td> 

                            </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?> 
                        @foreach($secretarias as $secretaria)
                            <tr>
                                <td>{{$contador++}}</td>
                                <td>{{$secretaria->nombres}}</td>
                                <td>{{$secretaria->apellidos}}</td>
                                <td>{{$secretaria->cedula}}</td>
                                <td>{{$secretaria->celular}}</td>
                                <td>{{$secretaria->direccion}}</td>
                                <td>{{$secretaria->ciudad}}</td>
                                <td>{{$secretaria->departamento}}</td>
                                <td>{{$secretaria->codigo_postal}}</td>
                                <td>{{$secretaria->num_seguro_social}}</td>
                                <td style="text-align: center"> 
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/secretarias/'.$secretaria->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('admin/secretarias/'.$secretaria->id.'/edit')}}" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                        <a href="{{url('admin/secretarias/'.$secretaria->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
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
                                    "info": "Mostrando START a END de TOTAL Secretarias",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",
                                    "infoFiltered": "(Filtrado de MAX total Secretarias)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar MENU Secretarias",
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
            <!-- /.card -->
        </div>
        
    </div>
@endsection
