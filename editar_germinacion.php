<?php
	require ('db_connect.php');
	session_start();
	
    $n_maceta = $_REQUEST['n_maceta']; 
	$mes_siembra_germino = $_REQUEST['mes_siembra'];
    $fecha_germinacion = $_REQUEST['fecha_germinacion'];


	//echo $n_maceta;
	//echo $fecha_germinacion;
	echo $mes_siembra_germino;

 	$sql = "UPDATE germinacion_tala set fecha_germinacion=(DATE '".$fecha_germinacion."') where n_maceta = ".$n_maceta." AND user_id =".$_SESSION['login_id']." AND mes_siembra = ".$mes_siembra_germino."";

	$germinacion= $bdd->query($sql);


	
	if($germinacion){
		echo "Registro Guardado";
        header("Location: index.php?page=cargar_germinacion&mes_siembra_germino=".$mes_siembra_germino);
		} else {
		echo "Error al Registrar";
        
	}     
?>