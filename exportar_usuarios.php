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
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                        <col width="5%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">ID usuario</th>
                            <th class="text-center">Fecha alta</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Edad</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Mail</th>
                            <th class="text-center">Provincia</th>
                            <th class="text-center">Localidad</th>
                            <th class="text-center">Exp. identificación</th>
                            <th class="text-center">Exp. cultivo</th>
                            <th class="text-center">Vivero</th>
                            <th class="text-center">Provincia vivero</th>
                            <th class="text-center">Localidad vivero</th>
                            <th class="text-center">Tipo vivero</th>
                            <th class="text-center">Objetivos vivero</th>
                            <th class="text-center">Contacto</th>
                            <th class="text-center">Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$i = 1;						
					$consulta =  $bdd->query("SELECT users.*, date(date_created) as fecha_alta ,provincias.*, localidades.*, objetivos_vivero.Objetivo, tipo_vivero.Tipo
					FROM users
					LEFT OUTER JOIN provincias ON users.id_provincia=provincias.id_provincia
					LEFT OUTER JOIN localidades ON users.id_localidad=localidades.id_localidad
					LEFT OUTER JOIN objetivos_vivero ON users.Objetivo_vivero=objetivos_vivero.id
					LEFT OUTER JOIN tipo_vivero ON users.Tipo_vivero=tipo_vivero.id
						order by users.id DESC
						");					

					while($row= $consulta->fetch(PDO::FETCH_ASSOC)):									
				
					?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <td class="text-center">
                                <?php echo  ($row['id'])?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['fecha_alta']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['type']) ?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['firstname'])?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['lastname'])?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['edad']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Telefono']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['email']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Provincia']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['Localidad']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['exp_identificacion']) ?>
                            </td>
                            <td class="text-center">
                                <?php echo ucwords($row['exp_cultivo']) ?>
                            </td>
                            <td class="text-center"><?php echo ucwords($row['Vivero']) ?></td>
                            <td class="text-center"><?php echo ucwords($row['provincia_vivero']) ?></td>
                            <td class="text-center"><?php echo ucwords($row['localidad_vivero']) ?></td>
                            <td class="text-center"><?php echo ucwords($row['Tipo_vivero']) ?></td>
                            <td class="text-center"><?php echo ucwords($row['Objetivo_vivero']) ?></td>
                            <td class="text-center"><?php echo ucwords($row['Contacto']) ?></td>
                            <td class="text-center"><?php echo ucwords($row['Sugerencias']) ?></td>


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
            sort: false,
            dom: "PBfrtip",
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
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    },
                    text: 'Exportar tabla <i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    title: 'Usuarios Restaura',
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

                targets: [1, 3, 9]
            }]
        });


    });
    </script>



</body>

</html>