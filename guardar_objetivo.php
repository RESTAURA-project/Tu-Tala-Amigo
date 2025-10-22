<?php
	require ('db_connect.php');
	
	$nuevo_obj = $_POST['Objetivo'];
	$nuevo_obj = "'".$nuevo_obj."'";
	
	$sql = "INSERT INTO objetivos_vivero (Objetivo) VALUES ($nuevo_obj)";
	//echo $sql;
	$resultado = $bdd->query($sql);

   
	
	if($resultado){
		echo "Registro Guardado";
        header("Location: index.php?page=nuevo_objetivo");
		} else {
		echo "Error al Registrar";
        
	}
?>