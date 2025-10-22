<?php include'db_connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">


    <style>
    /* Estilos para el HEAD de la tabla */
    table.dataTable thead {
        background-color: #F38B3B;
        color: azure;
    }

    /* Estilos para los botones de paginacion */
    .page-item.active .page-link {
        background-color: #F38B3B !important;
        color: azure !important;
        /* border: 1px solid black; */
    }

    .page-link {
        color: black !important;
    }

    .btn-warning {
        color: #000;
        background-color: #F38B3B;
        border-color: #ffc107;
    }
    </style>


</head>



<body>
    <div class="container shadow-xl p-3 mb-5 mt-5 bg-body rounded">
        <div class="row">
            <div class="col-xl-16">
                <table id="filtros" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                    <colgroup>
                        <col width="1%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="35%">
                        <col width="35%">
                        <col width="35%">
                        <col width="5%">
                        <col width="35%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <!-- <col width="5%"> -->
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Fecha creación</th>
                            <th class="text-center">Nombre Tala</th>
                            <th class="text-center">ID Tala</th>
                            <th class="text-center">Especie</th>
                            <th class="text-center">Especie otro</th>
                            <th class="text-center">Foto completo</th>
                            <th class="text-center">Fecha Foto</th>
                            <th class="text-center">Provincia</th>
                            <th class="text-center">Localidad</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Origen</th>
                            <th class="text-center">Espinas</th>
                            <th class="text-center">Foto espinas</th>
                            <th class="text-center">1=Sol,2=Sombra</th>
                            <th class="text-center">Distancia edif.</th>
                            <th class="text-center">Coordenadas</th>
                            <th class="text-center">ID Argentinat</th>
                            <th class="text-center">Permiso 1=Si; 2=No</th>
                            <th class="text-center">Comentarios</th>
                            <!-- <th>Ver</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$i = 1;						
					$consulta =  $bdd->query("SELECT fenologia_tala.*, date(fenologia_tala.fecha_creacion) as fecha_tala, especies.*, provincias.*, localidades.*, tipo.*, origen.*, frutos.*, espinas.*, concat(users.lastname,' ',users.firstname) as name
					FROM fenologia_tala
						INNER JOIN especies ON fenologia_tala.id_especie=especies.id_especie
						LEFT OUTER JOIN provincias ON fenologia_tala.id_provincia=provincias.id_provincia
						LEFT OUTER JOIN localidades ON fenologia_tala.id_localidad=localidades.id_localidad
						LEFT OUTER JOIN tipo ON fenologia_tala.id_tipo=tipo.id_tipo    
						LEFT OUTER JOIN origen ON fenologia_tala.id_origen=origen.id_origen
						LEFT OUTER JOIN frutos ON fenologia_tala.id_fruto=frutos.id_fruto
						LEFT OUTER JOIN espinas ON espinas.id_espinas=fenologia_tala.id_espinas
						INNER JOIN users ON users.id=fenologia_tala.id_user
						ORDER BY fecha_tala DESC
						");					

					while($row= $consulta->fetch(PDO::FETCH_ASSOC)):									
				
					?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <td class="text-center">
                                <?php echo  ($row['id_user'])	?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['name'])?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['fecha_tala'])?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['Nombre_individuo'])?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['id_fenologia'])?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Especie']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['especie_otro']) ?>
                            </td>
                            <td class="text-center">
                                <a target="_blank"
                                    href="https://restaura.com.ar/app/assets/uploads/Talas/<?php echo ($row['foto_completo']) ?>"><b><?php echo ucwords($row['foto_completo']) ?></a>
                            </td>
                            <td class="text-center"><?php echo date("d M y",strtotime($row['fecha_foto'])) ?></td>
                            <td class="text-center">
                                <?php echo ucwords($row['Provincia']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Localidad']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Tipo']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Origen']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Espinas']) ?>
                            </td>
                            <td class="text-center">
                                <a target="_blank"
                                    href="https://restaura.com.ar/app/assets/uploads/Talas/<?php echo ($row['foto_espinas']) ?>"><b><?php echo ucwords($row['foto_espinas']) ?></a>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['luz']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['distancia_edif']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Coordenadas']) ?>
                            </td>

                            <td class="text-center">
                                <?php echo ucwords($row['id_argentinat']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['permiso']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ($row['Sugerencias']) ?>
                            </td>
                            <!-- 						<td class="text-right">
						<a  class="fas fa-eye btn btn-warning btn-sm btn-flat " data-toggle="tooltip" title="Ver" href="./index.php?page=editar_fenologia_tala&id_fenologia=<?php echo $row['id_fenologia'] ?>" data-id="<?php echo $row['id_fenologia'] ?>"></a>
		
		                    </div>
						</td> -->

                        </tr>

                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>



    <script>
    $(document).ready(function() {
        $('#list').dataTable()

        $('.delete_project').click(function() {
            _conf("Seguro que desea borrar el requerimiento?", "delete_project", [$(this).attr(
                'data-id')])
        })
    })

    function delete_project($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_project',
            method: 'POST',
            data: {
                id: $id
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("Borrado exitosamente", 'success')
                    setTimeout(function() {
                        location.reload()
                    }, 1500)

                }
            }
        })
    }
    </script>

    <script>
    $(document).ready(function() {
        var table = $('#filtros').removeAttr('width').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            },
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: false,
            paging: false,
            dom: "PBfrtip",
            sort: false,
            buttons: {
                dom: {
                    button: {
                        className: 'btn'
                    }
                },
                buttons: [{
                    //definimos estilos del boton de excel
                    extend: "excel",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
                            18, 19, 20
                        ]
                    },
                    text: 'Exportar tabla <i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    title: 'Talas',
                    className: 'btn btn-warning',

                    // 1 - ejemplo básico - uso de templates pre-definidos
                    //definimos los parametros al exportar a excel

                    excelStyles: {
                        //template: "header_blue",  // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
                        //template:"green_medium" 

                        "template": [
                            "blue_medium",
                            "header_green",
                            "title_medium"
                        ]

                    },


                }]
            },
            searchPanes: {
                threshold: 0,
                cascadePanes: true,
                dtOpts: {
                    dom: 'tp',
                    paging: 'true',
                    pagingType: 'simple',
                    searching: false
                }
            },

            columnDefs: [{
                searchPanes: {
                    show: true
                },
                columns: [{
                        data: "uname"
                    },
                    {
                        data: "mname"
                    },
                    {
                        data: "status"
                    }
                ],
                targets: [1, 2, 9]
            }]
        });


    });
    </script>

</body>

</html>