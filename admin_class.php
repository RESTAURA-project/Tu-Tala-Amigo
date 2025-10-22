<?php
session_start();
//ini_set('display_errors', 1);
date_default_timezone_set('America/Argentina/Tucuman');


class Action
{
	private $db;
	private $db2; // Segunda conexión
	
	public function __construct()
	{
		ob_start();
		include 'db_connect.php';
		$this->db = $conn;
		$this->db2 = $bdd;
	}
	function __destruct()
	{
		$this->db->close();

		ob_end_flush();
	}


	function login()
	{
		extract($_POST);
		$email = trim($email ?? '');

		// Obtener usuario por correo electrónico
		$stmt =  $this->db2->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->execute([$email]);

		if ($stmt->rowCount() > 0) {
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			// print_r($user);              

			if (md5($password) == $user['password']) {
				// Autenticación exitosa
				session_start();
				foreach ($user as $key => $value) {
					if ($key !== 'password' && !is_numeric($key)) {
						$_SESSION['login_' . $key] = $value;
					}
				}

				// Insertar registro de sesión en la base de datos
				$qry2 = "INSERT INTO sesiones (user_id) VALUES (:user_id)";
				$sesion =  $this->db2->prepare($qry2);
				$sesion->execute([':user_id' => $_SESSION['login_id']]);

				return 1; // Autenticación exitosa
			} else {

				return 2;
			}
		}
	}

	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}

	function save_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass', 'password', 'Objetivo_vivero', 'Tipo_vivero')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		if (!empty($password)) {
			$data .= ", password=md5('$password') ";
		}

		$check = $this->db->query("SELECT * FROM users where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
			$data .= ", avatar = '$fname' ";
		}
		if (isset($Objetivo_vivero)) {
			$data .= ", Objetivo_vivero='" . implode(',', $Objetivo_vivero) . "' ";
		}
		if (isset($Tipo_vivero)) {
			$data .= ", Tipo_vivero='" . implode(',', $Tipo_vivero) . "' ";
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save) {
			return 1;
		}
	}

	function signup()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass')) && !is_numeric($k)) {
				if ($k == 'password') {
					if (empty($v))
						continue;
					$v = md5($v);
				}
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}

		$check = $this->db->query("SELECT * FROM users where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
			$data .= ", avatar = '$fname' ";
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save) {
			if (empty($id))
				$id = $this->db->insert_id;
			foreach ($_POST as $key => $value) {
				if (!in_array($key, array('id', 'cpass', 'password')) && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			$_SESSION['login_id'] = $id;
			if (isset($_FILES['img']) && !empty($_FILES['img']['tmp_name']))
				$_SESSION['login_avatar'] = $fname;
			return 1;
		}
	}

	function update_user()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'cpass', 'table', 'password', 'Objetivo_vivero', 'Vivero', 'Provincia')) && !is_numeric($k)) {

				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		$check = $this->db->query("SELECT * FROM users where email ='$email' " . (!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if ($check > 0) {
			return 2;
			exit;
		}
		if (isset($_FILES['img']) && $_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
			$data .= ", avatar = '$fname' ";
		}

		if (isset($Objetivo_vivero)) {
			$data .= ", Objetivo_vivero='" . implode(',', $Objetivo_vivero) . "' ";
		}


		if (!empty($password))
			$data .= " ,password=md5('$password') ";
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set $data");
		} else {
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if ($save) {
			foreach ($_POST as $key => $value) {
				if ($key != 'password' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			if (isset($_FILES['img']) && !empty($_FILES['img']['tmp_name']))
				$_SESSION['login_avatar'] = $fname;
			return 1;
		}
	}
	function delete_user()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = $id");
		if ($delete)
			return 1;
	}

	
	
	function delete_project()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM project_list where id = $id");
		if ($delete) {
			return 1;
		}
	}



	///// ESPECIFICOS DE EXPERIMENTOS COLABORATIVOS /////////

	function borrar_objetivo()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM objetivos_vivero where id = $id");
		if ($delete) {
			return 1;
		}
	}
	function borrar_tipo_vivero()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM tipo_vivero where id = $id");
		if ($delete) {
			return 1;
		}
	}

	function deshacer_germinacion()
	{
		extract($_POST);
		$delete = $this->db->query("UPDATE germinacion_tala set fecha_germinacion = null where id = $id");
		if ($delete) {
			return 1;
		}
	}
	function save_evento()
	{
		extract($_POST);
		$data = "";

		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id_eventostala')) && !is_numeric($k)) {

				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}

		if (isset($_FILES['foto_evento']) && $_FILES['foto_evento']['tmp_name'] != '') {
			$fileName = $_FILES['foto_evento']['name'];
			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$fname1 = $_SESSION['login_id'] . '_' . $_SESSION['login_lastname'] . '_foto_evento_' . (date('y-m-d H:s')) . '.' . $fileActualExt;
			$move = move_uploaded_file($_FILES['foto_evento']['tmp_name'], 'assets/uploads/Eventos/' . $fname1);
			$data .= ", foto_evento = '$fname1' ";
		}
		if (empty($id_eventostala)) {
			$save = $this->db->query("INSERT INTO eventos_tala set $data");
		} else {
			$save = $this->db->query("UPDATE eventos_tala set $data where id_eventostala = $id_eventostala");
		}
		if ($save) {
			return 1;
		}
	}
	function delete_evento()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM eventos_tala where id_eventostala = $id");
		if ($delete)
			return 1;
	}
	function delete_tala()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM fenologia_tala where id_fenologia = $id");
		if ($delete)
			return 1;
	}
	function cargar_localidad()
	{		
		extract($_POST);
		$id_provincia = $_POST['id_provincia'];
		
		$sql = "SELECT * FROM localidades where id_provincia = $id_provincia";
		$result = mysqli_query($this->db, $sql);
		$cadena = "<select name='id_localidad' id='id_localidad' class='form-control form-control-sm select2'  value=";

		while ($row_loc = mysqli_fetch_row($result)) {
			$cadena = $cadena . '<option  value=' . $row_loc[0] . '>' . ($row_loc[2]) . '</option>';
		}
		echo $cadena . "</select>";
	}

	function save_fenologia()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id_fenologia')) && !is_numeric($k)) {

				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}


		if (isset($_FILES['foto_completo']) && $_FILES['foto_completo']['tmp_name'] != '') {
			$fileName = $_FILES['foto_completo']['name'];
			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$fname1 = $_SESSION['login_id'] . '_' . $_SESSION['login_lastname'] . '_foto_completo_' . (date('y-m-d H:i')) . '.' . $fileActualExt;
			$move = move_uploaded_file($_FILES['foto_completo']['tmp_name'], 'assets/uploads/Talas/' . $fname1);
			$data .= ", foto_completo = '$fname1' ";
		}
		if (isset($_FILES['foto_pireno']) && $_FILES['foto_pireno']['tmp_name'] != '') {
			$fileName2 = $_FILES['foto_pireno']['name'];
			$fileExt2 = explode('.', $fileName2);
			$fileActualExt2 = strtolower(end($fileExt2));
			$fname2 = $_SESSION['login_id'] . '_' . $_SESSION['login_lastname'] . '_foto_pireno_' . (date('y-m-d H:i')) . '.' . $fileActualExt2;
			$move = move_uploaded_file($_FILES['foto_pireno']['tmp_name'], 'assets/uploads/Talas/' . $fname2);
			$data .= ", foto_pireno = '$fname2' ";
		}
		if (isset($_FILES['foto_fruto']) && $_FILES['foto_fruto']['tmp_name'] != '') {
			$fileName3 = $_FILES['foto_fruto']['name'];
			$fileExt3 = explode('.', $fileName3);
			$fileActualExt3 = strtolower(end($fileExt3));
			$fname3 = $_SESSION['login_id'] . '_' . $_SESSION['login_lastname'] . '_foto_fruto_' . (date('y-m-d H:i')) . '.' . $fileActualExt3;
			$move = move_uploaded_file($_FILES['foto_fruto']['tmp_name'], 'assets/uploads/Talas/' . $fname3);
			$data .= ", foto_fruto = '$fname3' ";
		}
		if (isset($_FILES['foto_espinas']) && $_FILES['foto_espinas']['tmp_name'] != '') {
			$fileName4 = $_FILES['foto_espinas']['name'];
			$fileExt4 = explode('.', $fileName4);
			$fileActualExt4 = strtolower(end($fileExt4));
			$fname4 = $_SESSION['login_id'] . '_' . $_SESSION['login_lastname'] . '_foto_espinas_' . (date('y-m-d H:i')) . '.' . $fileActualExt4;
			$move = move_uploaded_file($_FILES['foto_espinas']['tmp_name'], 'assets/uploads/Talas/' . $fname4);
			$data .= ", foto_espinas = '$fname4' ";
		}
		if (empty($id_fenologia)) {
			$save = $this->db->query("INSERT INTO fenologia_tala set $data");
		} else {
			$save = $this->db->query("UPDATE fenologia_tala set $data where id_fenologia = $id_fenologia");
		}

		if ($save) {
			return 1;
		}
	}
}