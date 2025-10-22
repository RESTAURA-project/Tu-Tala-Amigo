<?php include('db_connect.php')
 ?>
<?php
/* ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL); */
// $twhere ="";
// if($_SESSION['login_type'] != 1)
//   $twhere = "  ";
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

<!-- Info boxes -->
<!--  <div class="col-12">
          <div class="card">
            <div class="card-body">
              Bienvenid@ <?php //echo $_SESSION['login_name'] ?>!
            </div>
          </div>
  </div> -->

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


        <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-warning">
                        <h5 class="text-center">Provincias que participan</h5>
                        <div class="card-body" id="divGraph3">
                            <div class="chart-container tablita">
                                <!-- GRAFICO VA ACA EN ESTE DIV -->
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

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 -->

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
</script>