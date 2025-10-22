<?php
include 'db_connect.php';

$SP ="";
$id_fenologia_request = $_REQUEST['id_fenologia'];


$consulta =  $bdd->query("SELECT fenologia_tala.*, especies.*, provincias.*, localidades.*, tipo.*, origen.*, frutos.*, espinas.*
FROM fenologia_tala
    LEFT OUTER JOIN especies ON fenologia_tala.id_especie=especies.id_especie
    LEFT OUTER JOIN provincias ON fenologia_tala.id_provincia=provincias.id_provincia
    LEFT OUTER JOIN localidades ON fenologia_tala.id_localidad=localidades.id_localidad
    LEFT OUTER JOIN tipo ON fenologia_tala.id_tipo=tipo.id_tipo    
    LEFT OUTER JOIN origen ON fenologia_tala.id_origen=origen.id_origen
    LEFT OUTER JOIN frutos ON fenologia_tala.id_fruto=frutos.id_fruto
    LEFT OUTER JOIN espinas ON espinas.id_espinas=fenologia_tala.id_espinas
    WHERE id_fenologia = $id_fenologia_request");

$row_request = $consulta->fetch(PDO::FETCH_ASSOC);
foreach($row_request as $k => $v){
    $$k = $v;
} 		


include 'fenologia_tala.php';
?>