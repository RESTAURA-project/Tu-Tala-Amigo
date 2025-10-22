<style>
.boton_volver {
    margin-right: 4px;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-left: -6px;
    width: 5rem;
    font-size: 14px;
}

/* line 6, source/sass/image-picker.scss */
ul.thumbnails.image_picker_selector {
    overflow: auto;
    list-style-image: none;
    list-style-position: outside;
    list-style-type: none;
    padding: 0px;
    margin: 0px;
}

/* line 15, source/sass/image-picker.scss */
ul.thumbnails.image_picker_selector ul {
    overflow: auto;
    list-style-image: none;
    list-style-position: outside;
    list-style-type: none;
    padding: 0px;
    margin: 0px;
}

/* line 25, source/sass/image-picker.scss */
ul.thumbnails.image_picker_selector li.group_title {
    float: none;
}

/* line 30, source/sass/image-picker.scss */
ul.thumbnails.image_picker_selector li {
    margin: 0px 12px 12px 0px;
    float: left;
}

/* line 35, source/sass/image-picker.scss */
ul.thumbnails.image_picker_selector li .thumbnail {
    padding: 6px;
    border: 1px solid #DDD;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

/* line 42, source/sass/image-picker.scss */
ul.thumbnails.image_picker_selector li .thumbnail img {
    -webkit-user-drag: none;
}

/* line 48, source/sass/image-picker.scss */
ul.thumbnails.image_picker_selector li .thumbnail.selected {
    background: #ff9632;
}

.card {
    min-height: 1px;
    /*     margin-left: 5rem;
	margin-right: 5rem; */
    margin-top: 0rem;
}

@media (orientation: landscape) {
    .col_picker {
        max-width: 80%;
        text-align: center;

    }
}

@media (orientation: landscape) {
    .row_picker {
        margin-left: 150px;

    }
}
</style>

<script src="assets/plugins/image-picker/image-picker.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="assets/plugins/image-picker/image-picker.css"> -->


<div class="container">
    <a href="./index.php?page=eventos_tala&id_tala=<?php echo $_REQUEST['id_fenologia']; ?>">
        <div class="btn btn-warning boton_volver"><b>VOLVER</b></div>
    </a>


    <div class="card">
        <div class="card-body card-outline card-warning">
            <form action="" id="manage_eventos">
                <input type="hidden" name="id_eventostala"
                    value="<?php echo isset($id_eventostala) ? $id_eventostala : '' ?>">
                <!--Aca cambie id_fenologia por id_eventostala en name-->
                <input type="hidden" name="id_tala" value="<?php echo $_REQUEST['id_fenologia']; ?>">
                <?php //echo $_REQUEST['id_fenologia']; ?>

                <div class="row">
                    <div class="col">
                        <div class="row  row_picker">
                            <div class="col col_picker">
                                <div class="form-group">
                                    <label for="" class="control-label">¿Qué etapa querés cargar?</label>
                                    <select class="image-picker" name="id_evento" id="id_evento" required>
                                        <option data-img-src="assets/uploads/eventos_form/1_300.jpg" value="1"></option>
                                        <option data-img-src="assets/uploads/eventos_form/2_300.jpg" value="2"></option>
                                        <option data-img-src="assets/uploads/eventos_form/3_300.jpg" value="3"></option>
                                        <option data-img-src="assets/uploads/eventos_form/4_300.jpg" value="4"></option>
                                        <option data-img-src="assets/uploads/eventos_form/5_300.jpg" value="5"></option>
                                        <option data-img-src="assets/uploads/eventos_form/6_300.jpg" value="6"></option>
                                        <option data-img-src="assets/uploads/eventos_form/7_300.jpg" value="7"></option>
                                        <option data-img-src="assets/uploads/eventos_form/8_300.jpg" value="8"></option>
                                        <option data-img-src="assets/uploads/eventos_form/9_300.jpg" value="9"></option>
                                        <option data-img-src="assets/uploads/eventos_form/10_300.jpg" value="10">
                                        </option>
                                        <option data-img-src="assets/uploads/eventos_form/11_300.jpg" value="11">
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Fecha <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <input type="date" name="fecha_evento" required id="fecha_evento"
                                class="form-control form-control-sm" max="<?= date('Y-m-d'); ?>"
                                value="<?php echo isset($fecha_evento) ? $fecha_evento : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Subí una foto descriptiva</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input rounded-circle"
                                    name="foto_evento" id="foto_evento"
                                    value="<?php echo isset($foto_evento) ? $foto_evento : '' ?>" />
                                <label class="custom-file-label"
                                    for="customFile"><?php echo isset($foto_evento) ? $foto_evento : '' ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">Espacio libre para comentarios</label>
                                    <textarea name="Sugerencias" id="Sugerencias" cols="30" rows="5"
                                        class="summernote form-control">
                                    <?php echo isset($Sugerencias) ? '' . $Sugerencias . '' : '' ?>
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <!--                         <div class="form-group d-flex justify-content-center">
                            <img src="<?php // echo isset($meta['foto_evento']) ? 'assets/uploads/'.$meta['foto_evento'] :'' ?>" alt="" id="foto_evento" class="img-fluid img-thumbnail">
                        </div>  -->
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2">Guardar</button>
                    <button class="btn btn-secondary" type="button"
                        onclick="location.href = 'index.php?page=mis_talas'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#manage_eventos').submit(function(e) {
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $.ajax({
        url: 'ajax.php?action=save_evento',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast('Data successfully saved.', "success");
                setTimeout(function() {
                    location.replace(
                        'index.php?page=eventos_tala&id_tala=<?php echo $_REQUEST['id_fenologia']; ?>'
                        )
                }, 750)
            }
        }
    })
})

var uploadField = document.getElementById("foto_evento");

uploadField.onchange = function() {
    if (this.files[0].size > 20097152) {
        alert("¡La imágen que elegiste es demasiado grande! Máximo permitido 20 MB");
        this.value = "";
    };
};


$("select").imagepicker()

// somehow change the selected items directly on your select html element
$("select").val('<?php echo $row_evento_request['id_evento'];?>');

// re-sync the plugin
$("select").data('picker').sync_picker_with_select();
</script>