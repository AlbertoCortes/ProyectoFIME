<?php
require_once('../config.php');
require_once('../lib/lib.php');
$matricula  = $_POST['Matricula'];
$nombre = $_POST['Nombre'];
$brigada = $_POST['Brigada'];
$Email      = $_POST['Email'];
$plan = $_POST['plan'];
	if(empty($matricula) || empty($nombre) || empty($brigada) || empty($plan))
	{
		echo'<script type="text/javascript">alert("ERROR: No deje campos vacios");window.location.href="javascript:window.history.back()";</script>'; 
		die();  
	}
$user = $matricula;
$pass = $matricula;
valid_alumno($matricula);
insert_alumno($matricula, $nombre, $plan, $pass, $Email, $brigada);
?>