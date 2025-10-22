<?php
	require ('db_connect.php');
	session_start();
	
    //$n_maceta = $_REQUEST['n_maceta']; 
	$mes_siembra_germino = $_REQUEST['mes_siembra'];
    

	//echo $n_maceta;
	//echo $fecha_germinacion;
	//echo $mes_siembra_germino;
	//echo "DELETE FROM germinacion_tala WHERE user_id =".$_SESSION['login_id']." AND mes_siembra = ".$mes_siembra_germino."";



 	 $sql = "DELETE FROM germinacion_tala WHERE user_id =".$_SESSION['login_id']." AND mes_siembra = ".$mes_siembra_germino."";

	$deshacer_siembra= $bdd->query($sql);



	
	if($deshacer_siembra){
		//echo "Registro Guardado";
        header("Location: index.php?page=germinacion_tala");
		} else {
		echo "Error al Registrar";
        
	}     
?>