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
    /* justify-content: space-between; */
    justify-content: space-evenly;
    align-items: center;
}

.texto-nombre {
    line-height: 20px;
    text-align: center;
}
</style>
<div class="container">

    <div class="card text-center card-outline card-warning caja-mes">
        <h3><b>MIS TALAS</b></h3>
    </div>
    <div class="accordion md-accordion card-outline card-warning caja-mes" id="accordionEx" role="tablist"
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
            <div class="container">
                <div id="collapseThree1" class="collapse" role="tabpanel" aria-labelledby="headingThree1"
                    data-parent="#accordionEx">
                    <ul>
                        <li><b>NUEVO TALA:</b> Podrás cargar tus talas amigos. Se abrirá un formulario para que puedas
                            completar y subir fotos!</li>
                        <li><b>VER:</b> Si ya tenés Talas amigos podrás ingresar a cada uno y cargar etapas (por ej.
                            floración), editar su información o eliminarlo si es que hace falta </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-header">
        <div class="card-tools">
            <a class="btn btn-block btn-sm btn-default btn-flat border-primary"
                href="./index.php?page=fenologia_tala"><i class="fa fa-plus"></i>Nuevo Tala</a>

        </div>
    </div>

    <div class="row-macetas">
        <?php            
             $ejemplares = $bdd->query("SELECT * FROM fenologia_tala WHERE id_user = {$_SESSION['login_id']}");   


            while($row_mis_talas= $ejemplares->fetch(PDO::FETCH_ASSOC)):  
           ?>

        <?php  if ($row_mis_talas['foto_completo']==''){?>

        <div class='card caja-maceta'>
            <div class="row"> <img class="mx-auto d-block" src="assets\uploads\imagen_no_disponible2.jpg" width="130"
                    height="195"></img></div>
            <span class="texto-nombre"><b><?php  echo ucwords($row_mis_talas['Nombre_individuo']) ;?></b></span>
            <div>
                <a class="btn btn-warning w-100"
                    href="./index.php?page=eventos_tala&id_tala=<?php echo $row_mis_talas['id_fenologia'] ?>"><b>VER</b></a>
            </div>
        </div>

        <?php  }else{ ?>
        <div class='card caja-maceta'>
            <div class="row"> <img class="mx-auto d-block"
                    src="assets\uploads\Talas\<?php echo $row_mis_talas['foto_completo'];?>" width="130"
                    height="195"></img></div>
            <span class="texto-nombre"><b><?php  echo ucwords($row_mis_talas['Nombre_individuo']) ;?></b></span>

            <div>
                <a class="btn btn-warning w-100"
                    href="./index.php?page=eventos_tala&id_tala=<?php echo $row_mis_talas['id_fenologia'] ?>"><b>VER</b></a>
            </div>
        </div>
        <?php  } ?>

        <?php endwhile; ?>
    </div>



</div>