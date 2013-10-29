<?php
session_start();
require_once("../login/valid.php");
require_once("../login/validpriv.php");
require_once('../config.php');
require_once('../lib/lib.php');
validAlumno();
$usuario =  $_SESSION['usuario'];
$brigada = $_POST['brig'];
//$alumno = $_POST['alumno'];
	if(empty($brigada))
	{
		echo'<script type="text/javascript">alert("ERROR: Seleccione una birgada");window.location.href="javascript:window.history.back()";</script>'; 
		die();  
	}
	echo $usuario->matricula;
	echo "<br>".$brigada;
//	echo $brigada;
//valid_alumno($matricula);
//insert_alumno($matricula, $nombre, $plan, $pass, $Email, $brigada);
?>