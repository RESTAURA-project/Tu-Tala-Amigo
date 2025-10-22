<?php include('db_connect.php')
 ?>
<?php
/* ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL); */
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<style>
.card-text {
    font-size: 18px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

@media only screen and (max-width: 1240px) {
    .tablita {
        margin-right: 15px;
        margin-left: 25px;
        margin-top: 5px;
        margin-bottom: 10px;
        height: 30px;
        width: 80px;
    }
}


@media only screen and (max-width: 640px) {
    .tablita {
        margin-right: 15px;
        margin-left: 25px;
        margin-top: 5px;
        margin-bottom: 10px;
        height: 60px;
        width: 80px;

    }
}

@media only screen and (max-width: 360px) {
    .tablita {
        margin-right: 15px;
        margin-left: 25px;
        margin-top: 5px;
        margin-bottom: 10px;
        height: 30px;
        width: 80px;
    }
}
</style>


<?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 4): ?>
<!-- HOME PARA FENOLOGIA -->
<?php 

    $where = "";
    if($_SESSION['login_type'] == 2){
      $where = " where manager_id = '{$_SESSION['login_id']}' ";
    }elseif($_SESSION['login_type'] == 3){
      $where = " where concat('[',REPLACE(user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
    }
     $where2 = "";
    if($_SESSION['login_type'] == 2){
      $where2 = " where p.manager_id = '{$_SESSION['login_id']}' ";
    }elseif($_SESSION['login_type'] == 3){
      $where2 = " where concat('[',REPLACE(p.user_ids,',','],['),']') LIKE '%[{$_SESSION['login_id']}]%' ";
    }
    ?>

<?php if($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 4): ?>
<div class="col-12">
    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center card-text">Talas censados
                    <i class="fa fa-seedling"></i>
                    <div class="inner">
                        <?php $talas = $conn->query("SELECT COUNT(id_fenologia) as talas FROM fenologia_tala");
                                            while($row= $talas->fetch_assoc()): ?>
                        <h2><?php echo ($row['talas'])?></h2>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center card-text">Tus Talas
                    <i class="fa fa-leaf"></i>
                    <div class="inner">
                        <?php $talas_propios = $conn->query("SELECT COUNT(id_fenologia) as talas_propios FROM fenologia_tala where id_user={$_SESSION['login_id']}");
                                            while($row_talas_propios= $talas_propios->fetch_assoc()): ?>
                        <h2><?php echo ($row_talas_propios['talas_propios'])?></h2>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-warning">
                    <h5 class="text-center">Provincias que participan</h5>
                    <div class="card-body" id="divGraph5">
                        <div class="chart-container tablita">
                            <!-- GRAFICO VA ACA EN ESTE DIV -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-outline card-warning">
                    <h5 class="text-center">Talas censados acumulados</h5>
                    <div class="card-body" id="divGraph6">
                        <div class="chart-container tablita">
                            <!-- GRAFICO VA ACA EN ESTE DIV -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php endif; ?>





<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
</script>
<script>
//Grafico "¿Cuándo están germinando?" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_germinados_mensual.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph").html(bar);
                $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));
            }
        });
    });


});


//Grafico "¿Cuántos se van sembrando?" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_sembrados_mensual.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph2").html(bar);
                $("#graph2").chart = new Chart($("#graph2"), $("#graph2").data("settings"));
            }
        });
    });

});



//Grafico "¿Cuántos se van sembrando?" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_representacion_por_provincia.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph3").html(bar);
                $("#graph3").chart = new Chart($("#graph3"), $("#graph3").data("settings"));
            }
        });
    });

});



//Grafico "Acumulados" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_germinados_acumulados.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph4").html(bar);
                $("#graph4").chart = new Chart($("#graph4"), $("#graph4").data("settings"));
            }
        });
    });

});

//Grafico "Censados por provincia" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_censados_por_provincia.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph5").html(bar);
                $("#graph5").chart = new Chart($("#graph5"), $("#graph5").data("settings"));
            }
        });
    });

});

//Grafico "Censados acumulados" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_censados_acumulados.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph6").html(bar);
                $("#graph6").chart = new Chart($("#graph6"), $("#graph6").data("settings"));
            }
        });
    });

});
</script>
<?php endif; ?>


<!-- HOME PARA GERMINACION -->

<?php if($_SESSION['login_type'] == 3 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 4): ?>


<div class="col-12">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center card-text">Talas germinados
                    <i class="fa fa-seedling"></i>
                    <div class="inner">
                        <?php $germinados = $conn->query("SELECT COUNT(id) as germinados FROM germinacion_tala where fecha_germinacion>'0000-00-00'");
                                            while($row= $germinados->fetch_assoc()): ?>
                        <h2><?php echo ($row['germinados'])?></h2>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center card-text">Talas sembrados
                    <i class="fa fa-seedling"></i>
                    <div class="inner">
                        <?php $sembrados = $conn->query("SELECT COUNT(id) as sembrados FROM germinacion_tala");
                                            while($row= $sembrados->fetch_assoc()): ?>
                        <h2><?php echo ($row['sembrados'])?></h2>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center card-text">Talas que te germinaron
                    <i class="fa fa-seedling"></i>
                    <div class="inner">
                        <?php $germinados = $conn->query("SELECT COUNT(id) as germinados FROM germinacion_tala where fecha_germinacion>'0000-00-00' and user_id={$_SESSION['login_id']}");
                                            while($row= $germinados->fetch_assoc()): ?>
                        <h2><?php echo ($row['germinados'])?></h2>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body text-center card-text">Talas sembrados por vos
                    <i class="fa fa-leaf"></i>
                    <div class="inner">
                        <?php $sembrados = $conn->query("SELECT COUNT(id) as sembrados FROM germinacion_tala where user_id={$_SESSION['login_id']}");
                                            while($row= $sembrados->fetch_assoc()): ?>
                        <h2><?php echo ($row['sembrados'])?></h2>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-warning">
                    <h5 class="text-center">¿Cuántos se van sembrando?</h5>
                    <div class="card-body" id="divGraph2">
                        <div class="chart-container tablita">
                            <!-- GRAFICO VA ACA EN ESTE DIV -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-outline card-warning">
                    <h5 class="text-center">¿Cuándo están germinando?</h5>
                    <div class="card-body" id="divGraph">
                        <div class="chart-container tablita">
                            <!-- GRAFICO VA ACA EN ESTE DIV -->
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card card-outline card-warning">
                <h5 class="text-center">¿Cuántos van germinando?</h5>
                <div class="card-body" id="divGraph4">
                    <div class="chart-container tablita">
                        <!-- GRAFICO VA ACA EN ESTE DIV -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
</script>
<script>
//Grafico "¿Cuándo están germinando?" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_germinados_mensual.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph").html(bar);
                $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));
            }
        });
    });


});


//Grafico "¿Cuántos se van sembrando?" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_sembrados_mensual.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph2").html(bar);
                $("#graph2").chart = new Chart($("#graph2"), $("#graph2").data("settings"));
            }
        });
    });

});




//Grafico "Acumulados" 
$(document).ready(function() {
    $.ajax({

    });

    $(function() {
        $.ajax({
            url: "chart_germinados_acumulados.php",
            type: "post",
            //data: {
            //     user_ids: $(this).val()
            // },
            success: function(bar) {
                $("#divGraph4").html(bar);
                $("#graph4").chart = new Chart($("#graph4"), $("#graph4").data("settings"));
            }
        });
    });

});
</script>


<?php endif; ?>