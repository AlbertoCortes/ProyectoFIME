<?php
require_once("../lib/lib.php");
require_once("../view/view.php");
function docentes(){
    $docentes = listar_docentes();
    lista_docentes($docentes);
}
function alumnos(){
	$alumnos = listar_alumnos();
	lista_alumnos($alumnos);
}
function brigadas(){
	$brigadas = listar_brigadas();
	lista_brigadas($brigadas);
}
function brigadas_reales(){
	$brigadas = listar_brigadas_oficiales();
	lista_brigadas_reales($brigadas);
}
function filtro_docentes(){
		$arg = $_POST['info'];
		$docente = buscar_docentes($arg);
		lista_docentes($docente);
}
function filtro_alumnos(){
	$arg = $_POST['info'];
	$alumno = buscar_alumnos($arg);
	lista_alumnos($alumno);
}

function filtro_brigadas(){
	$arg = $_POST['info'];
	$brigada = buscar_brigadas($arg);
	lista_brigadas($brigada);
}
function filtro_brigada_real(){
	$arg = $_POST['info'];
	$brigada = buscar_brigadas_reales($arg);
	lista_brigadas_reales($brigada);
}
function listar_practicas(){
	$practicas = listar_practicasL();
	practicas($practicas);
}
function historial(){
	$fecha = $_POST['fecha'];
	$practica = $_POST['practica'];
//	echo $fecha;
	//echo $practica;
	echo "<h2>Brigadas que se realizaron el dia ".$fecha." y en la practica #".$practica.":</h2><br /><br />";
	$brigada =  buscar_brigadas_historial($fecha, $practica);
	lista_historial($brigada, $practica);
}
function historial_asistencia(){
	$fecha = $_POST['fecha'];
	$practica = $_POST['practica'];
	$brigada = $_POST['brigada'];
	//echo "<h2>Brigadas que se realizaron el dia ".$fecha." y en la practica #".$practica.":</h2><br /><br />";
	$alumnos = listar_brigadas_historial($fecha, $practica, $brigada);
	//print_r($alumnos);
	lista_asistencia_historial($alumnos , $practica);
}
//docentes();
//alumnos();
//brigadas();
//brigadas_reales();
?>
