<?php

$mes_siembra_germino = $_REQUEST['mes_siembra_germino'];

?>

<div id="content_1" class="content_dialog">
    <div id="germinacion" title="Germinacion">
        <div class="form-group">
            <span id="error_mes_siembra" class="text-danger"></span>
        </div>
        <div class="form-group">
            <form method="POST" action="guardar_germinacion.php" id="form_germinacion">
                <span id="error_mes_siembra" class="text-danger"></span>
        </div>

        <div class="btn btn-warning"><a href="index.php?page=germinacion_tala"><b>Volver</b></a></div>
        <div class="row"></div>

        <div id="content_1" class="content_dialog">
            <div id="germinacion" title="Germinacion">

                <div class="col-md-4 mx-auto">
                    <div class='card' style="width: 18rem;">
                        <div class="container-sm ">
                            <div class="form-group">
                                <label>¿Qué maceta germinó?</label>
                                <select name="n_maceta" id="n_maceta" class="custom-select custom-select-sm"
                                    required="true">
                                    <option disabled selected value="">Maceta</option>
                                    <?php
                  $maceta = $bdd->query("SELECT * FROM germinacion_tala WHERE user_id = {$_SESSION['login_id']} and mes_siembra=" . $mes_siembra_germino . " and fecha_germinacion is null");
                  while ($row = $maceta->fetch(PDO::FETCH_ASSOC)) :
                  ?>
                                    <option value="<?php echo $row['n_maceta'] ?>"
                                        <?php echo isset($n_maceta) && $n_maceta == $row['n_maceta'] ? "selected" : '' ?>>
                                        <?php echo ucwords($row['n_maceta']) ?> </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>¿Qué día germinó?</label>
                                <script>
                                fecha_germinacion.max = new Date().toISOString().split("T")[0];
                                </script>
                                <input type="date" name="fecha_germinacion" id="fecha_germinacion" class="form-control"
                                    required />
                                <input type="hidden" name="mes_siembra_germino" id="mes_siembra_germino"
                                    value="<?php echo $mes_siembra_germino; ?>" />
                                <div class="form-group" align="center">
                                    <input type="hidden" name="row_id" id="hidden_row_id" />
                                    <button type="submit" name="guardar_siembra" id="guardar_siembra"
                                        class="btn btn-info">Guardar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">                       
                        <?php
            $macetas = $bdd->query("SELECT * FROM germinacion_tala WHERE user_id = {$_SESSION['login_id']} and mes_siembra=" . $mes_siembra_germino . "");                   
            while ($row_maceta = $macetas->fetch(PDO::FETCH_ASSOC)) :                   
            ?>

                        <?php if ($row_maceta['fecha_germinacion'] == '0000-00-00') { ?>
                        <div></div>

                        <div class='card' style="width: 8rem;">
                            <div class="row"> <img class="mx-auto d-block"
                                    src="assets\uploads\Macetas\sin germinar\Maceta_sin_germinar_<?php echo $row_maceta['n_maceta']; ?>.jpg"
                                    width="54" height="95"></img></div>
                            <div class="row-xs-12 center-block text-center">Sin germinar</div>                           
                            <div class="btn btn-warning"><a
                                    href="cargar_germinacion_final.php?n_maceta=<?php echo $row_maceta['n_maceta']; ?>&mes_siembra_germino=<?php echo $mes_siembra_germino; ?>"><b>Germinó</b></a>
                            </div>
                        </div>
                        <?php  } else { ?>
                        <div class='card' style="width: 8rem;">
                            <div class="row"> <img class="mx-auto d-block"
                                    src="assets\uploads\Macetas\germinada\Maceta_germinada_<?php echo $row_maceta['n_maceta']; ?>.jpg"
                                    width="54" height="95"></img></div>
                            <div class="row-xs-12 center-block text-center">
                                <?php echo $row_maceta['fecha_germinacion']; ?> </div>
                            <div class="btn btn-warning"><a
                                    href="eliminar_germinacion.php?n_maceta=<?php echo $row_maceta['n_maceta']; ?>&mes_siembra=<?php echo $mes_siembra_germino; ?>"><b>DESHACER</b></a>
                            </div>
                        </div>
                        <?php  } ?>
                        <div></div>
                        <?php endwhile; ?>
                    </div>
                </div>