<style>
.boton_volver {
    margin-right: 4px;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-left: 6px;
    width: 5rem;
    font-size: 14px;
}

.card_tools {
    margin-right: 22px;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-left: 40px;
    font-size: 14px;
    margin: 0 auto;
    /* Added */
    float: none;
    /* Added */

}

.boton_accion {
    margin-right: 4px;
    margin-top: 5px;
    margin-bottom: 12px;
    margin-left: 6px;
    width: 7rem;
    font-size: 12px;

}

.col_botones {
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
}
</style>


<?php
$qry_nombre = $conn->query("SELECT ft.*FROM fenologia_tala ft WHERE id_fenologia =" . $_GET['id_tala']);
$nombre = $qry_nombre->fetch_assoc()
?>

<div class="container">
    <!-- <div class="col-md-8 mx-auto"> -->
    <div class='row'>
        <div class='col'>
            <a href="index.php?page=mis_talas">
                <div class="btn btn-warning boton_volver"><b>VOLVER</b></div>
            </a>
        </div>
    </div>
    <div class='row '>
        <div class='col'>
            <div class="accordion md-accordion card-outline card-warning " id="accordionEx" role="tablist"
                aria-multiselectable="true">
                <!-- Accordion card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingThree1">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree1"
                            aria-expanded="false" aria-controls="collapseThree1">
                            <h6 class="mb-0">Instrucciones<i class="fas fa-angle-down rotate-icon"></i></h6>
                        </a>
                    </div>
                    <!-- Card body -->
                    <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1"
                        data-parent="#accordionEx">
                        <ul>
                            <li><b>AGREGAR ETAPA:</b> Podrás asignarle a tu tala etapas, ya se fructificación,
                                floración, entre otros. Te pediremos la fecha de la etapa, así que tenela a mano</li>
                            <li><b>EDITAR TALA:</b> Desde acá podrás editar la información del tala que cargaste cuándo
                                lo diste de alta. Si te equivocaste no te preocupes, ¡siempre hay una solución! </li>
                            <li><b>MODIFICAR FOTOS:</b> Para modificar las fotos sólo tenés que subir la nueva foto, la
                                anterior se reemplaza automaticamente</li>
                            <li><b>ELIMINAR TALA:</b> Si por alguna razón tenés que eliminar el Tala de tu lista, podés
                                hacerlo, pero ¡ojo! no podrás recuperarlo </li>
                            <li><b>EDITAR ETAPA:</b> Si cargaste una etapa (por ej. floración), podrás editarlo. </li>
                            <li><b>ELIMINAR ETAPA:</b> Podrás eliminar la etapa.</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-outline card-warning">
        <div class="card-header">
            <div class='row justify-content-md-center'>

                <h5><b>El nombre del Tala es <?php echo ucwords($nombre['Nombre_individuo']); ?></b></h5>
            </div>
            <?php

        $qry2 = $conn->query("SELECT * FROM fenologia_tala WHERE id_fenologia =". $_GET['id_tala']);
        while ($row2 = $qry2->fetch_assoc()) :?>
            <div class='row justify-content-md-center'>
                <div class='col col_botones'>
                    <?php if (is_null($row2['foto_completo']) or ($row2['foto_completo'])==""){ ?>
                    <h6><b>Tala completo</b> <a class="fas fa-eye btn btn-warning btn-sm disabled"></a></h6>

                    <?php }else{ ?>
                    <h6><b>Tala completo</b> <a class="fas fa-eye btn btn-warning btn-sm " target="_blank"
                            href="https://restaura.com.ar/app/assets/uploads/Talas/<?php echo ($row2['foto_completo']) ?>">
                        </a></h6>
                    <?php  } ;?>
                </div>
                <div class='col col_botones'>
                    <?php if (is_null($row2['foto_espinas'])){ ?>
                    <h6><b>Espinas</b><a class="fas fa-eye btn btn-warning btn-sm disabled"></a></h6>
                    <?php }else{ ?>
                    <h6><b>Espinas</b> <a class="fas fa-eye btn btn-warning btn-sm " target="_blank"
                            href="https://restaura.com.ar/app/assets/uploads/Talas/<?php echo ($row2['foto_espinas']) ?>">
                        </a></h6>
                    <?php  } ;?>
                </div>
                <?php endwhile; ?>

            </div>

            <?php
				$id_tala = $_REQUEST['id_tala'];
				//echo $id_tala;
				?>
            <div class='row '>
                <div class='col col_botones'>
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary boton_accion"
                        href="./index.php?page=nuevo_evento_tala&id_fenologia=<?php echo $id_tala ?>"><i
                            class="fa fa-plus"></i> Agregar etapa</a>
                </div>
                <div class="col col_botones">
                    <a class="fas fa-edit btn btn-warning btn btn-block btn-sm btn-default btn-flat border-primary boton_accion"
                        href="./index.php?page=editar_fenologia_tala&id_fenologia=<?php echo $_REQUEST['id_tala'] ?>">
                        Editar Tala</a>
                </div>
                <div class="col col_botones">
                    <a class="fas fa-trash-alt btn btn-warning btn btn-block btn-sm btn-default btn-flat border-primary boton_accion delete_tala"
                        href="javascript:void(0)" data-id="<?php echo $_REQUEST['id_tala'] ?>"> Eliminar Tala</a>
                </div>
            </div>

        </div>
    </div>


    <div class='row '>
        <div class='col'>
            <div class="card card-outline card-warning">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- <table class="table tabe-hover  " id="list"> -->
                        <table class="table m-0 table-hover">
                            <colgroup>
                                <!-- <col width="5%"> -->
                                <col width="10%">
                                <col width="10%">
                                <col width="5%">
                                <col width="5%">
                                <col width="5%">

                            </colgroup>
                            <thead>
                                <tr>
                                    <!-- <th class="text-center">#</th> -->
                                    <th class="text-center">Etapa</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Editar etapa</th>
                                    <th class="text-center">Eliminar etapa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
						//	$i = 1;
						$qry = $conn->query("SELECT ft.*, et.*, eventos.* FROM fenologia_tala ft, eventos_tala et, eventos WHERE (ft.id_fenologia = et.id_tala) and (et.id_evento = eventos.id_evento) and id_tala =" . $_GET['id_tala']);
						while ($row = $qry->fetch_assoc()) :
						?>
                                <tr>
                                    <!-- <th class="text-center"><?php echo $i++ ?></th> -->
                                    <td class="text-center"><b><?php echo $row['evento'] ?></b></td>
                                    <td class="text-center"><b><?php echo $row['fecha_evento'] ?></b></td>
                                    <?php if (is_null($row['foto_evento'])){ ?>
                                    <td class="text-center"><a class="fas fa-eye btn btn-warning btn-sm disabled"></a>
                                    </td>
                                    <?php }else{ ?>
                                    <td class="text-center"><a class="fas fa-eye btn btn-warning btn-sm "
                                            target="_blank"
                                            href="https://restaura.com.ar/app/assets/uploads/Eventos/<?php echo $row['foto_evento']; ?>"></a>
                                    </td>

                                    <?php  } ;?>

                                    <td class="text-center">
                                        <a class="fas fa-edit btn btn-warning btn-sm"
                                            href="./index.php?page=editar_eventos_fenologia&id_eventostala=<?php echo $row['id_eventostala'] ?>&id_fenologia=<?php echo $row['id_fenologia'] ?>"></a>
                                    </td>
                                    <td class="text-center">
                                        <?php //echo $row['id_eventostala'] 
									?>
                                        <a class="fas fa-trash-alt btn btn-warning btn-sm delete_evento"
                                            href="javascript:void(0)"
                                            data-id="<?php echo $row['id_eventostala'] ?>"></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('.delete_evento').click(function() {
        _conf("Seguro que desea eliminar este evento?", "delete_evento", [$(this).attr('data-id')])
    })
    $('.delete_tala').click(function() {
        _conf("Seguro que desea eliminar este tala?", "delete_tala", [$(this).attr('data-id')])
    })
})

function delete_evento($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_evento',
        method: 'POST',
        data: {
            id: $id
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully deleted", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1500)

            }
        }
    })
}

function delete_tala($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_tala',
        method: 'POST',
        data: {
            id: $id
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully deleted", 'success')
                setTimeout(function() {
                    location.replace('index.php?page=mis_talas')
                }, 1500)

            }
        }
    })
}
</script>