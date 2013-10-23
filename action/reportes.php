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
//docentes();
//alumnos();
//brigadas();
//brigadas_reales();
?>
