<!-- Formulario para crear los usuarios -->
<?php
?>
<form action="" id="manage_user">
    <div class="container">
        <div class="card text-center card-outline card-warning caja-mes">
            <h3><b>USUARIO</b></h3>
        </div>
        <div class="card card-outline card-warning">
            <div class="card-body">

                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">

                <label>
                    <h4>Datos personales</h4>
                </label>
                <div class="row">

                    <div class="col-md-6 border-right">

                        <div class="form-group">
                            <label for="" class="control-label required ">Nombre <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <input type="text" name="firstname" class="form-control form-control-sm" required
                                value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
                        </div>
                        <div class="form-group required ">
                            <label for="" class="control-label">Apellido <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <input type="text" name="lastname" class="form-control form-control-sm" required
                                value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
                        </div>
                        <div class="form-group ">
                            <label for="" class="control-label">Edad</label>
                            <input type="edad" name="edad" class="form-control form-control-sm"
                                value="<?php echo isset($edad) ? $edad : '' ?>">
                        </div>


                        <div class="form-group">
                            <label for="" class="control-label">¿Tenés experiencia en la identificación de
                                plantas?</label>
                            <select name="exp_identificacion" id="exp_identificacion"
                                class="custom-select custom-select-sm">
                                <option selected disabled hidden>Seleccionar</option>
                                <option value="3"
                                    <?php echo isset($exp_identificacion) && $exp_identificacion == 3 ? 'selected' : '' ?>>
                                    Nada</option>
                                <option value="2"
                                    <?php echo isset($exp_identificacion) && $exp_identificacion == 2 ? 'selected' : '' ?>>
                                    Poca</option>
                                <option value="1"
                                    <?php echo isset($exp_identificacion) && $exp_identificacion == 1 ? 'selected' : '' ?>>
                                    Mucha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">¿Tenés experiencia en el cultivo de plantas?</label>
                            <select name="exp_cultivo" id="exp_cultivo" class="custom-select custom-select-sm">
                                <option selected disabled hidden>Seleccionar</option>
                                <option value="3"
                                    <?php echo isset($exp_cultivo) && $exp_cultivo == 3 ? 'selected' : '' ?>>Nada
                                </option>
                                <option value="2"
                                    <?php echo isset($exp_cultivo) && $exp_cultivo == 2 ? 'selected' : '' ?>>Poca
                                </option>
                                <option value="1"
                                    <?php echo isset($exp_cultivo) && $exp_cultivo == 1 ? 'selected' : '' ?>>Mucha
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_provincia" class="control-label">Indicá la provincia en la que se encuentra
                                tu tala<span style="color: #dc3545"><b>*</b></span></label>
                            <select name="id_provincia" id="id_provincia" class="form-control form-control-sm select2"
                                required>
                                <option value="" disabled <?php echo isset($id_provincia) ? '' : 'selected'; ?>>
                                    <?php echo isset($id_provincia) ? $row_request['Provincia'] : 'Seleccionar Provincia'; ?>
                                </option>
                                <?php
								$provincias = $bdd->query("SELECT * FROM provincias");
								while ($row_provincia = $provincias->fetch(PDO::FETCH_ASSOC)) :
									$selected = (isset($id_provincia) && $id_provincia == $row_provincia['id_provincia']) ? 'selected' : '';
								?>
                                <option value="<?php echo $row_provincia['id_provincia']; ?>" <?php echo $selected; ?>>
                                    <?php echo $row_provincia['Provincia']; ?>
                                </option>
                                <?php
								endwhile;
								?>
                            </select>
                        </div>



                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" class="control-label">Indicá la localidad</label>
                            <div id="id_localidad" name="id_localidad">

                                <?php if (isset($id_localidad)) : ?>
                                <select class="form-control form-control-sm">
                                    <option value="<?php echo $Localidad; ?>" selected><?php echo $row['Localidad']; ?>
                                    </option>
                                </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Teléfono</label>
                            <input type="text" name="Telefono" class="form-control form-control-sm"
                                value="<?php echo isset($Telefono) ? $Telefono : '' ?>">
                        </div>
                        <?php if ($_SESSION['login_type'] == 1) : ?>
                        <div class="form-group">
                            <!-- En Rol se define que podrá ver el usuario. En Fenología tendrá la posibilidad de crear Talas amigos y cargar los eventos
                        En Germinación podrá hacer los experimentos de germinación. Si tiene rol Fenología+Germinación va a poder hacer ambas cosas
                         El Admin es el unico que ve todo incluída las secciones de exportar datos y crear usuarios -->
                            <label for="" class="control-label">Rol</label>
                            <select name="type" id="type" class="custom-select custom-select-sm" required
                                value="<?php echo isset($type) ? $type : '' ?>">
                                <option selected disabled hidden>Seleccionar rol</option>
                                <option value="4" <?php echo isset($type) && $type == 4 ? 'selected' : '' ?>>
                                    Fenología+Germinación</option>
                                <option value="2" <?php echo isset($type) && $type == 2 ? 'selected' : '' ?>>Fenología
                                </option>
                                <option value="3" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>Germinación
                                </option>

                            </select>
                        </div>
                        <?php else : ?>
                        <input type="hidden" name="type" value="<?php echo isset($type) ? $type : '' ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="control-label">Email <span style="color: #dc3545"><b>*</b></span></label>
                            <input type="email" class="form-control form-control-sm" name="email" required
                                value="<?php echo isset($email) ? $email : '' ?>">
                            <small id="#msg"></small>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contraseña <span style="color: #dc3545"><b>*</b></span></label>
                            <input type="password" class="form-control form-control-sm" name="password"
                                <?php echo !isset($id) ? "required" : '' ?>>
                            <small><i><?php echo isset($id) ? "Leave this blank if you dont want to change you password" : '' ?></i></small>
                        </div>
                        <div class="form-group">
                            <label class="label control-label">Confirmar Contraseña <span
                                    style="color: #dc3545"><b>*</b></span></label>
                            <input type="password" class="form-control form-control-sm" name="cpass"
                                <?php echo !isset($id) ? 'required' : '' ?>>
                            <small id="pass_match" data-status=''></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Comienza el formulario del vivero -->
        <div class="col-lg-12">
            <div class="card card-outline card-warning">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                    <label>
                        <h4>Si tenés un vivero podés completar el siguiente formulario</h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <div class="form-group">
                                <label for="" class="control-label">Nombre del vivero</label>
                                <input type="text" name="Vivero" class="form-control form-control-sm"
                                    value="<?php echo isset($Vivero) ? $Vivero : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Provincia</label>
                                <input type="text" name="provincia_vivero" class="form-control form-control-sm"
                                    value="<?php echo isset($provincia_vivero) ? $provincia_vivero : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Localidad</label>
                                <input type="text" name="localidad_vivero" class="form-control form-control-sm"
                                    value="<?php echo isset($localidad_vivero) ? $localidad_vivero : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Tipo de vivero</label>
                                <select class="form-control form-control-sm select2" multiple="multiple"
                                    name="Tipo_vivero[]">
                                    <option></option>
                                    <?php
									$tipo_viv = $bdd->query("SELECT * FROM tipo_vivero");
									while ($row = $tipo_viv->fetch(PDO::FETCH_ASSOC)) :
									?>
                                    <option value="<?php echo $row['Tipo'] ?>"
                                        <?php echo isset($Tipo_vivero) && in_array($row['Tipo'], explode(',', $Tipo_vivero)) ? "selected" : '' ?>>
                                        <?php echo ucwords($row['Tipo']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Objetivos del vivero</label>
                                <select class="form-control form-control-sm select2" multiple="multiple"
                                    name="Objetivo_vivero[]">
                                    <option></option>
                                    <?php
									$employees = $bdd->query("SELECT * FROM objetivos_vivero");
									while ($row = $employees->fetch(PDO::FETCH_ASSOC)) :
									?>
                                    <option value="<?php echo $row['Objetivo'] ?>"
                                        <?php echo isset($Objetivo_vivero) && in_array($row['Objetivo'], explode(',', $Objetivo_vivero)) ? "selected" : '' ?>>
                                        <?php echo ucwords($row['Objetivo']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Contacto (teléfono, redes sociales, mail)</label>
                                <input name="Contacto" class="form-control form-control-sm"
                                    value="<?php echo isset($Contacto) ? $Contacto : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label for="">¿Nos querés contar algo más del tala? Si tenés dudas comunicate a
                            info@restaura.com.ar
                        </label>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <!-- <label for="" class="control-label">Espacio libre para comentarios</label> -->
                                    <textarea name="Sugerencias" id="" cols="30" rows="10" class="form-control">
                            <?php echo isset($Sugerencias) ? '' . $Sugerencias . '' : '' ?>
                            </textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12 text-right justify-content-center d-flex">
                            <button class="btn btn-primary mr-2">Guardar</button>
                            <button class="btn btn-secondary" type="button"
                                onclick="location.href = 'index.php?page=mis_talas'">Cancelar</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- Hasta acá el formulario del vivero -->
    </div>
</form>


<style>
img#cimg {
    height: 15vh;
    width: 15vh;
    object-fit: cover;
    border-radius: 100% 100%;
}
</style>
<script>
$('[name="password"],[name="cpass"]').keyup(function() {
    var pass = $('[name="password"]').val()
    var cpass = $('[name="cpass"]').val()
    if (cpass == '' || pass == '') {
        $('#pass_match').attr('data-status', '')
    } else {
        if (cpass == pass) {
            $('#pass_match').attr('data-status', '1').html('<i class="text-success">Password Matched.</i>')
        } else {
            $('#pass_match').attr('data-status', '2').html(
                '<i class="text-danger">Password does not match.</i>')
        }
    }
})

function displayImg(input, _this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#manage_user').submit(function(e) {
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $('#msg').html('')
    if ($('[name="password"]').val() != '' && $('[name="cpass"]').val() != '') {
        if ($('#pass_match').attr('data-status') != 1) {
            if ($("[name='password']").val() != '') {
                $('[name="password"],[name="cpass"]').addClass("border-danger")
                end_load()
                return false;
            }
        }
    }
    $.ajax({
        url: 'ajax.php?action=save_user',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast('Guardado exitosamente.', "success");
                setTimeout(function() {
                    location.replace('index.php?page=home')
                }, 750)
            } else if (resp == 2) {
                $('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
                $('[name="email"]').addClass("border-danger")
                end_load()
            }
        }
    })
})
</script>

<!-- SCRIPT PARA SELECCIONAR LA LOCALIDAD SEGUN LA PROVINCIA ELEGIDA -->
<script>
$(document).ready(function() {
    recargarLista();

    $('#id_provincia').change(function() {
        recargarLista();
    });

})

function recargarLista() {
    $.ajax({
        type: "POST",
        url: 'ajax.php?action=cargar_localidad',
        data: {
            id_provincia: $('#id_provincia').val(),
            id_localidad: '<?php echo isset($id_localidad) ? $id_localidad : ''; ?>' // Enviar la localidad seleccionada
        },
        success: function(r) {
            $('#id_localidad').html(r);
        }
    });
}
</script>