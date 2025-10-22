<?php
if(!isset($bdd)){ include 'db_connect.php'; } 
$mes_actual = idate('m');
?>

<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="/assets/plugins/bootstrap.min.css" /> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
    .meses_button {
        min-width: 90px;
        max-width: 90px;
    }

    .card_meses {
        width: 100%;
    }

    ul.b {
        list-style-type: square;
    }

    .botones {
        margin-right: 5px;
        margin-top: 5px;
        margin-bottom: 10px;
        width: 10rem;
    }

    .siembra {
        width: 100%;
    }

    #user_dialog {
        width: 100px;
    }
    </style>

</head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container">
    <div class="card text-center card-outline card-warning caja-mes">
        <h3><b>GERMINACIÓN</b></h3>
    </div>
    <div class="card card-outline card-warning">
        <div class="card-body">
            <div class="col-12">
                <h6> Meses de siembra: En este apartado encontrarás los meses de siembra </h6>
            </div>
            <div class="accordion md-accordion card-outline card-warning" id="accordionEx" role="tablist"
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
                    <div class="container card_meses">
                        <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1"
                            data-parent="#accordionEx">
                            <ul class="b">
                                <li>Los meses en gris son los que aún no están sembrados.</li>
                                <li>Los meses en naranja son los que ya sembraste.</li>
                                <li>Para ver las macetas sembradas tenés que seleccionar el botón naranja del mes.</li>
                                <li>Si te equivocaste y cargaste la siembra de un mes que no corresponde podés entrar al
                                    mes y deshacer la siembra. Vas a encontrar un botón rojo que dice "Deshacer
                                    siembra". Ojo no te confundas con el botón naranja "Deshacer".</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- SECCIÓN BOTONES DE LOS MESES
SE RECORRE LA TABLA MESES_ANIO DE LA BASE DE DATOS PARA CARGAR LOS MESES
QUE FORMAN PARTE DEL PROYECTO. A FUTURO SE PODRÍA RELACIONAR CON LA TABLA
USERS (RELACIÓN MANY TO MANY) Y ASÍ ASIGNAR QUE MESES DEBE SEMBRAR CADA PARTICIPANTE
EN CASO DE ABARCAR MAS DE UN AÑO HAY QUE AGREGARLE AL NOMBRE DE LOS BOTONES EL AÑO QUEDANDO MES-AÑO EL FORMATO
-->
    <div class="card card-outline card-warning text-center card_meses">
        <form action="" method="POST">
            <?php 
            $meses_anio = $bdd->query ("SELECT * FROM meses_anio ; ");      
            while($row=  $meses_anio->fetch(PDO::FETCH_ASSOC)):         
                    $qry =  $bdd->query("SELECT * FROM germinacion_tala WHERE user_id = {$_SESSION['login_id']} and mes_siembra={$row['mes_numero']} ");
                    $row_sembradas=  $qry->fetch(PDO::FETCH_ASSOC);
                    if ($row_sembradas <> null){
                    ?>
            <a href="index.php?page=macetas_sembradas&mes_siembra_germino=<?php echo $row_sembradas['mes_siembra'];?>"><button
                    type="button"
                    class="btn btn-warning meses_button btn-sm botones"><b><?php echo $row['Mes']//;echo" ";echo $row['Anio'];?></b></button>
            </a>
            <?php } else {?>
            <button type="button" class="btn btn-secondary meses_button btn-sm botones"
                onclick="abrir_mes(<?php echo $row['mes_numero'];?>, '<?php echo $row['Mes']?>')"><?php echo $row['Mes']//;echo" ";echo $row['Anio'];?></button>
            <?php }  ?>

            <?php endwhile; ?>
        </form>
    </div>
</div>


<!-- 
CUADRO DE DIALOGO QUE SE ABRE PARA SEMBRAR EL MES
-->
<div id="user_dialog" title="Siembra">
    <div class="form-group">
        <form method="POST" action="guardar_siembra.php">
            <label>¿Qué día sembraste?</label>
            <input type="date" name="fecha_siembra" id="fecha_siembra" class="form-control" required="true" />
            <div class="form-group">
                <label>¿Frecuencia de riego por semana?</label>
                <select name="fq_riego" id="fq_riego" class="custom-select custom-select-sm" required="true">
                    <option disabled selected value="">Seleccionar frecuencia</option>
                    <option value="1" <?php echo isset($fq_riego) && $fq_riego == 1 ? 'selected' : '' ?>>1</option>
                    <option value="2" <?php echo isset($fq_riego) && $fq_riego == 2 ? 'selected' : '' ?>>2</option>
                    <option value="3" <?php echo isset($fq_riego) && $fq_riego == 3 ? 'selected' : '' ?>>3</option>
                    <option value="4" <?php echo isset($fq_riego) && $fq_riego == 4 ? 'selected' : '' ?>>4</option>
                    <option value="5" <?php echo isset($fq_riego) && $fq_riego == 5 ? 'selected' : '' ?>>5</option>
                    <option value="6" <?php echo isset($fq_riego) && $fq_riego == 6 ? 'selected' : '' ?>>6</option>
                    <option value="7" <?php echo isset($fq_riego) && $fq_riego == 7 ? 'selected' : '' ?>>7</option>
                </select>
            </div>
            <input type="hidden" name="mes_siembra" id="mes_siembra" />
            <div class="form-group" align="center">
                <input type="hidden" name="row_id" id="hidden_row_id" />
                <button type="submit" name="save" id="save" class="btn btn-info">Guardar</button>
            </div>
        </form>
    </div>



    <script>
    /// -------- SIEMBRA ---------- //
    function abrir_mes(mes, texto_mes) {
        var ancho = 400;
        if ($(window).width() < 700) {
            ancho = 300;
        }

        $('#user_dialog').dialog('option', 'width', ancho);
        $('#user_dialog').dialog('option', 'title', 'Vas a sembrar ' + texto_mes);
        $('#mes_siembra').val(mes);
        $('#frecuencia_riego').val('');
        $('#error_mes_siembra').text('');
        $('#error_frecuencia_riego').text('');
        $('#save').text('Guardar');
        $('#user_dialog').dialog('open');
        let ahora = new Date();
        var oneDay = 1000 * 60 * 60 * 24;
        let primerdia = new Date(ahora.getFullYear(), mes - 1, 1);
        let ultimodia = new Date(ahora.getFullYear(), mes, 1);
        if (ahora.getMonth() + 1 == mes) {
            ultimodia = ahora;
        }
        var input = document.getElementById("fecha_siembra");
        input.setAttribute("value", primerdia.toISOString().split("T")[0]);
        input.setAttribute("min", primerdia.toISOString().split("T")[0]);
        input.setAttribute("max", ultimodia.toISOString().split("T")[0]);
    }


    //-------- GERMINACION ---------//

    function germinacion(germinacion) {
        $('#germinacion').dialog('option', 'title', 'Cargar germinación');
        $('#fecha_germinacion').val('');
        $('#mes_siembra_germino').val(germinacion);
        $('#n_maceta').val('');
        $('#save').text('Guardar');


        $.ajax({
            type: "GET",
            url: "macetas_sembradas.php?mes_siembra_germino=" + germinacion,
            success: function(d) {
                $("#form_germinacion").html(d);
                $('#mes_siembra_germino').val(germinacion);
                $('#germinacion').dialog('open');
            }

        })
    }

    $(document).ready(function() {

        var count = 0;

        $('#user_dialog').dialog({
            autoOpen: false,
            width: 400
        });

        $('#germinacion').dialog({
            autoOpen: false,
            width: 400
        });

    });
    </script>