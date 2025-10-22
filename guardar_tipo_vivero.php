<?php
	require ('db_connect.php');
	
	$nuevo_tipo = $_POST['Tipo'];
	$nuevo_tipo = "'".$nuevo_tipo."'";
	
	$sql = "INSERT INTO tipo_vivero (Tipo) VALUES ($nuevo_tipo)";
	//echo $sql;
	$resultado = $bdd->query($sql);

   
	
	if($resultado){
		echo "Registro Guardado";
        header("Location: index.php?page=tipo_de_vivero");
		} else {
		echo "Error al Registrar";
        
	}
?>