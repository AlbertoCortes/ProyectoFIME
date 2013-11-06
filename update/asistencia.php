<?php
session_start();
require_once("../login/valid.php");
//require_once("../login/validpriv.php");
//validDocenteP();
$usuario =  $_SESSION['usuario'];
//require_once("../action/funciones_docente.php");
require_once("../lib/lib.php");
$pr = select_admin();

$pra = $pr->practica; //numero de practica


$alumno=array(); //alumno
if(empty($_POST['id'])){
	echo'<script type="text/javascript">alert("Error. Verifique la informacion");window.location.href="javascript:window.history.back()";</script>';
}
$alumno = $_POST['alumno'];
//print_r($alumno);


$sataus=array(); //status
$status = $_POST['id'];
//print_r($status);

$totalAlumno = count($alumno);
//echo $totalAlumno;
$totalStatus = count($status);
//echo $totalStatus;
if($totalAlumno != $totalStatus){
	echo'<script type="text/javascript">alert("ERROR. Porfavor verifique las asistencias");window.location.href="javascript:window.history.back()";</script>';
}

$docente = $usuario->num_empleado; //docente

$dia = $_POST['dia'];//echo $dia;

$hora = $_POST['hora'];//echo $hora;

$brigada = $_POST['brigada'];//echo $brigada;

function captura($alumno, $status, $docente, $dia, $hora, $brigada, $practica){
	$fecha = date("Y-m-d");
	//echo $fecha;
	$pract = "a".$practica;
	$fechaA = "fecha".$practica;
	$maestro = "maestro".$practica;
	$diaA = "dia".$practica;
	$horaA = "hora".$practica;
	$brigadaA = "brigada".$practica;
	$sql = "UPDATE sflbf4.asistencia SET 	alumno_matricula ='$alumno', 
											".$pract." ='$status',
											".$fechaA." ='$fecha',
											".$maestro."= '$docente',
											".$diaA." = '$dia',
											".$horaA."= '$hora',
											".$brigadaA." = '$brigada' WHERE alumno_matricula = '$alumno';";
										//	echo $sql;
		$result= mysql_query($sql);
}
for ($i = 0 ; $i < count($alumno); $i ++){
	captura($alumno[$i], $status[$i], $docente, $dia, $hora, $brigada,$pra);
}
		echo'<script type="text/javascript">alert("Las asistencias se han subido correctamente");window.location.href="javascript:window.history.back()";</script>';

?>