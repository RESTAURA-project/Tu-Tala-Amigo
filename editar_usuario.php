<?php
// Conexión a la base de datos
include 'db_connect.php';

// Obtener el ID del usuario de la URL o de algún request
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Consulta para obtener los datos del usuario
    $qry = $conn->query("SELECT users.*, provincias.*, localidades.* 
    FROM users
    LEFT OUTER JOIN provincias ON users.id_provincia=provincias.id_provincia
    LEFT OUTER JOIN localidades ON users.id_localidad=localidades.id_localidad    
     WHERE id = $id");
    if ($qry->num_rows > 0) {
        $row = $qry->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $edad = $row['edad'];
        $Calle = $row['Calle'];
        $Altura = $row['Altura'];
        $exp_identificacion = $row['exp_identificacion'];
        $exp_cultivo = $row['exp_cultivo'];        
        $Telefono = $row['Telefono'];
        $type = $row['type'];
        $email = $row['email'];
        $password = $row['password'];
        $Sugerencias = $row['Sugerencias'];
        $Tipo_vivero = $row['Tipo_vivero'];
        $Objetivo_vivero = $row['Objetivo_vivero'];
        $Vivero = $row['Vivero'];
        $Contacto = $row['Contacto'];
        $Provincia = $row['Provincia'];
        $id_provincia = $row['id_provincia'];
        $id_localidad = $row['id_localidad'];
        $Localidad = $row['Localidad'];  
        $provincia_vivero = $row['provincia_vivero'];     
        $localidad_vivero = $row['localidad_vivero'];          
       
    }
}
echo  $Localidad;
// Incluir el formulario desde nuevo_usuario.php
include 'nuevo_usuario.php';
?>

<script>
// Modificamos el script de guardar usuarios para que también sirva para edición
$('#manage_user').submit(function(e) {
    e.preventDefault();
    start_load();
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