<style>
.centrar {
    line-height: 37px;
}

.border-date {
    border: 0;
}

.caja-maceta {

    margin: 5px;
    width: 8rem;

}

.boton_volver {
    margin-right: 4px;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-left: 6px;
    width: 5rem;
    font-size: 14px;
}

.boton_deshacer_siembra {
    margin-right: 4px;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-left: 54px;
    width: 12rem;
    font-size: 14px;
}

.caja-mes {
    max-width: 100%;
}

.row-macetas {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}

.texto-fecha {
    line-height: 38px;
    text-align: center;
}
</style>

<?php
/* ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL); */

//session_start();

$months = array(
  'January' => 'Enero',
  'February' => 'Febrero',
  'March' => 'Marzo',
  'April' => 'Abril',
  'May' => 'Mayo',
  'June' => 'Junio',
  'July' => 'Julio',
  'August' => 'Agosto',
  'September' => 'Septiembre',
  'October' => 'Octubre',
  'November' => 'Noviembre',
  'December' => 'Diciembre'
);
	$mes_siembra_germino = $_REQUEST['mes_siembra_germino'];
  //echo $mes_siembra_germino; 
  $monthName =  date('F', mktime(0, 0, 0, intval($mes_siembra_germino), 10));
  //echo $monthName;
  $esMonth = $months[$monthName];
  //echo $esMonth;

?>
<div class='row justify-content-md-right'>

    <a href="index.php?page=germinacion_tala">
        <div class="btn btn-warning boton_volver"><b>VOLVER</b></div>
    </a>

</div>
<div class="card text-center card-outline card-warning caja-mes">
    <h3>
        <b><?php echo $esMonth;?></b>

    </h3>
</div>
<?php
               $deshacer_siembra = $bdd->query("SELECT * FROM germinacion_tala WHERE user_id = {$_SESSION['login_id']} and mes_siembra=".$mes_siembra_germino."");
               $row_deshacer_siembra= $deshacer_siembra->fetch(PDO::FETCH_ASSOC);
               ?>
<div class="accordion md-accordion card-outline card-warning caja-mes" id="accordionEx" role="tablist"
    aria-multiselectable="true">
    <div class="card">
        <div class="card-header" role="tab" id="headingThree1">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree1"
                aria-expanded="false" aria-controls="collapseThree1">
                <h6 class="mb-0">Instrucciones<i class="fas fa-angle-down rotate-icon"></i></h6>
            </a>
        </div>
    </div>
</div>
<!-- Card body -->
<div class="container">
    <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1"
        data-parent="#accordionEx">
        <ul>
            <li><b>GUARDAR:</b> Ingresá el día que germinó y apretá el botón <span style="color: #ff9632"><b>"GUARDAR"
                    </b></span>para registrar la fecha.</li>
            <li><b>DESHACER:</b> Si te equivocaste al guardar la fecha de germinación no te preocupes, podés deshacer
                con el botón <span style="color: #ff9632"><b>"DESHACER"</b></span> y volver a cargarla.</li>
            <li><b>DESHACER SIEMBRA:</b> Si te equivocaste al crear la siembra del mes podés deshacerla con el botón
                <span style="color: #dc3545"><b>"DESHACER SIEMBRA"</b></span> y volver a cargarla.
            </li>
        </ul>
    </div>
</div>


<div class="row-macetas">
    <?php            
            $macetas = $bdd->query("SELECT * FROM germinacion_tala WHERE user_id = {$_SESSION['login_id']} and mes_siembra=".$mes_siembra_germino."");         
            while($row_maceta= $macetas->fetch(PDO::FETCH_ASSOC)):  
           ?>

    <?php  if ($row_maceta['fecha_germinacion']=='0000-00-00'){?>

    <div class='card caja-maceta'>
        <div class="row"> <img class="mx-auto d-block"
                src="assets\uploads\Macetas\sin germinar\Maceta_sin_germinar_<?php echo $row_maceta['n_maceta'];?>.jpg"
                width="54" height="95"></img></div>
        <form method="POST"
            action="guardar_germinacion.php?n_maceta=<?php echo $row_maceta['n_maceta'];?>&mes_siembra=<?php echo $mes_siembra_germino;?>"
            id="form_germinacion">
            <script>
            fecha_germinacion.max = new Date().toISOString().split("T")[0];
            </script>
            <input type="date" name="fecha_germinacion" id="fecha_germinacion" class="form-control border-date"
                max="<?= date('Y-m-d'); ?>" required />
            <div class="h-50 text-center "><button type="submit"
                    class="btn btn-warning w-100"><b>GUARDAR</b></a></button></div>
        </form>


    </div>
    <?php  }else{ ?>
    <div class='card caja-maceta'>
        <div class="row"> <img class="mx-auto d-block"
                src="assets\uploads\Macetas\germinada\Maceta_germinada_<?php echo $row_maceta['n_maceta'];?>.jpg"
                width="54" height="95"></img></div>
        <span class="texto-fecha"><?php echo $row_maceta['fecha_germinacion']; ?> </span>

        <div class="btn btn-warning deshacer_germinacion" data-toggle="tooltip" title="Borrar" href="javascript:void(0)"
            data-id="<?php echo $row_maceta['id']; ?>" data-n_maceta="<?php echo $row_maceta['n_maceta'];?>">
            <b>DESHACER</b></a>
        </div>

    </div>
    <?php  } ?>

    <?php endwhile; ?>
</div>
<?php
               $deshacer_siembra = $bdd->query("SELECT * FROM germinacion_tala WHERE user_id = {$_SESSION['login_id']} and mes_siembra=".$mes_siembra_germino."");
               $row_deshacer_siembra= $deshacer_siembra->fetch(PDO::FETCH_ASSOC);
               ?>
<div class="btn btn-danger boton_deshacer_siembra deshacer_siembra"><a><b>DESHACER SIEMBRA</b></a></div>
</div>



<script language="JavaScript" type="text/javascript">
function deshacer_siembra(mes_siembra) {

    window.location.href = "deshacer_siembra.php?&mes_siembra=" + mes_siembra;

}



$(document).ready(function() {

    $('.deshacer_germinacion').click(function() {
        _conf("Seguro que desea borrar la fecha de germinación?", "deshacer_germinacion", [$(this).attr(
            'data-id')])
    })

    $('.deshacer_siembra').click(function() {
        _conf("Seguro que desea borrar la siembra? Se borrará TODO el mes y no podrás recuperar los datos",
            "deshacer_siembra", [<?php echo $mes_siembra_germino;?>])
    })

})

function deshacer_germinacion(id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=deshacer_germinacion',
        method: 'POST',
        data: {
            id: id
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