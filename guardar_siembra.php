<?php
	require ('db_connect.php');
	session_start();
	
    $mes_siembra = $_POST['mes_siembra']; //Botón que toco me dice el mes que sembró y debería guardar
	$fq_riego = $_POST['fq_riego'];
    $fecha_siembra = $_POST['fecha_siembra'];



 	 $sql = "INSERT INTO u354008086_app.germinacion_tala (user_id,mes_siembra,fecha_siembra, fq_riego,n_maceta)
     VALUES (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",1),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",2),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",3),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",4),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",5),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",6),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",7),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",8),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",9),
     (".$_SESSION['login_id'].",".$mes_siembra.",'".$fecha_siembra."',".$fq_riego.",10)
     ";

	$siembra = $bdd->query($sql);
  
	if($siembra){
		//echo "Registro Guardado";
        header("Location: index.php?page=germinacion_tala");
		} else {
		echo "Error al Registrar";
        
	}  
?>