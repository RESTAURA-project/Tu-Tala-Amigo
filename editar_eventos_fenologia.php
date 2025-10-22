<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM eventos_tala where id_eventostala = ".$_GET['id_eventostala'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}

$evento_request = $_REQUEST['id_eventostala'];
$evento_guardado = $bdd->query("SELECT eventos_tala.*, eventos.* FROM eventos_tala, eventos WHERE id_eventostala = $evento_request and eventos_tala.id_evento=eventos.id_evento");  
$row_evento_request= $evento_guardado->fetch(PDO::FETCH_ASSOC);

foreach($row_evento_request as $k => $v){
	$$k = $v;
}
//echo $row_evento_request['evento'];
	
include 'nuevo_evento_tala.php';
?>