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


                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">ID usuario</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Historial login</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$i = 1;						
					$consulta =  $bdd->query("SELECT t1.*, concat(users.firstname,' ',users.lastname) as name, users.email
                    FROM sesiones AS t1 
                    LEFT OUTER JOIN sesiones AS t2 ON t1.user_id = t2.user_id AND (t1.logindate < t2.logindate OR (t1.logindate = t2.logindate AND t1.id_session < t2.id_session))
                    INNER JOIN users ON users.id=t1.user_id
                    WHERE t2.user_id IS NULL AND t1.user_id<>1 AND t1.user_id<>34 AND t1.user_id<>41 AND t1.user_id<>36
                    ORDER BY logindate desc
                  ");					

					while($row= $consulta->fetch(PDO::FETCH_ASSOC)):									
				
					?>
                        <tr>
                            <th class="text-center"><?php echo $i++ ?></th>
                            <td class="text-center">
                                <?php echo  ($row['user_id'])	?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['name'])?>
                            </td>
                            <td class="text-center">
                                <?php  echo ($row['email'])?>

                            </td>
                            <td class="text-center">
                                <?php  echo ($row['logindate'])?>
                            </td>

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
                        columns: [0, 1, 2, 3, 4]
                    },
                    text: 'Exportar tabla <i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    title: 'Inicios de sesión RESTAURA',
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
                        data: "name"
                    },
                    {
                        data: "logintime"
                    },
                    {
                        data: "user_id"
                    }
                ],
                targets: [2, 3, 4]
            }]
        });


    });
    </script>

</body>

</html>