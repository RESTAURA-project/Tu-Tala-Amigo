<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_evento'){
	$save = $crud->save_evento();
	if($save)
		echo $save;
}
if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'delete_evento'){
	$save = $crud->delete_evento();
	if($save)
		echo $save;
}
if($action == 'cargar_localidad'){
	$save = $crud->cargar_localidad();
	if($save)
		echo $save;
}
if($action == 'delete_tala'){
	$save = $crud->delete_tala();
	if($save)
		echo $save;
}
if($action == 'save_project'){
	$save = $crud->save_project();
	if($save)
		echo $save;
}
if($action == 'delete_project'){
	$save = $crud->delete_project();
	if($save)
		echo $save;
}
if($action == 'borrar_objetivo'){
	$save = $crud->borrar_objetivo();
	if($save)
		echo $save;
}
if($action == 'borrar_tipo_vivero'){
	$save = $crud->borrar_tipo_vivero();
	if($save)
		echo $save;
}
 if($action == 'save_fenologia'){
	$save = $crud->save_fenologia();
	if($save)
		echo $save;
} 
if($action == 'deshacer_germinacion'){
	$save = $crud->deshacer_germinacion();
	if($save)
		echo $save;
}



ob_end_flush();
?>
