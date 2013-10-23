<?php
require_once('../config.php');
require_once('../lib/lib.php');
$brigada = $_POST['Nobrigada'];
$maestro = $_POST['Maestro'];
$dia     = $_POST['dia'];
$hora    = $_POST['hora'];
$salon   = $_POST['Salon'];
$cupo    = $_POST['NAlumnos'];
$disp    = $_POST['disp'];
	if(empty($brigada) || empty($maestro) || empty($dia) || empty($hora) || empty($salon) || empty($cupo) || empty($disp))
	{
		echo'<script type="text/javascript">alert("ERROR: No deje campos vacios");window.location.href="javascript:window.history.back()";</script>'; 
		die();  
	}
valid_brigada($brigada); //Esta funcion valida que la brigada introducida no exista para evitar redundancia
valid_hora($dia, $hora); // Funcion que valida que no se empalmen horas
insert_brigada($brigada, $dia, $hora, $salon, $cupo, $disp, $maestro);
?>