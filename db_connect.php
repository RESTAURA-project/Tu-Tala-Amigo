<?php
// Conexión a la base de datos
$servername = "localhost"; //Colocar aquí el nombre del servidor donde se aloja la base de datos
$username = "root"; //Colocar aquí el nombre de usuario
$password = ""; //Colocar aquí la contraseña para acceder a la base de datos
$dbname = "dbname"; //Colocar aquí el nombre de la base de datos

$conn= new mysqli($servername, $username, $password, $dbname) or die("Could not connect to mysql".mysqli_error($conn));
$conn->query("SET NAMES 'utf8'");

try
{
	$bdd = new PDO("mysql: host=$servername; dbname=$dbname",$username,$password);
        $bdd->query("SET NAMES 'utf8'");
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}