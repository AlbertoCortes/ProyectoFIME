<?php
require_once("../lib/lib.php");
require_once("../view/view.php");
function mis_brigadasR($docente){
	//echo $docente;
	$brigadas = mis_brigadas($docente);
	mis_brigadasV($brigadas);
}
function lista_brigadaR(){
	$brigada = $_POST['id'];
	$brigadas = seleccionar_brigadaP($brigada);
	$alumnos = lista_brigada($brigada);
	lista($alumnos, $brigadas);
}
function mis_brigadas_oficialesR($docente){
	$brigadas = mis_brigadas_oficiales($docente);
	mis_brigadas_oficialesV($brigadas);
}
function lista_brigada_oficialR(){
	$brigada = $_POST['id'];
	$alumno = lista_brigada_oficial($brigada);
	lista_brigada_oficialV($alumno);
}
function mis_alumnos($docente){
	$alumnos = lista_alumnosD($docente);
	lista_brigada_oficialV($alumnos);
}
function filtro_alumnos_doc($docente){
	$arg = $_POST['info'];
	$alumnos = buscar_alumnos_docente($arg, $docente);
	//lista_alumnos($alumnos);
	lista_brigada_oficialV($alumnos);
}

?>