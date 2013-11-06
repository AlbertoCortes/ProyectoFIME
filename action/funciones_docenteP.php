<?php
require_once("../lib/lib.php");
require_once("../view/view.php");
function mis_brigadasRP($docente){
	//echo $docente;
	$brigadas = mis_brigadas($docente);
	mis_brigadasVP($brigadas);
}
function lista_brigadaR(){
	$brigada = $_POST['id'];
	$alumnos = lista_brigada($brigada);
	lista($alumnos);
}
function mis_brigadas_oficialesRP($docente){
	$brigadas = mis_brigadas_oficiales($docente);
	mis_brigadas_oficialesVP($brigadas);
}
function lista_brigada_oficialRP(){
	$brigada = $_POST['id'];
	$alumno = lista_brigada_oficial($brigada);
	lista_brigada_oficialVP($alumno);
}
function mis_alumnosP($docente){
	$alumnos = lista_alumnosD($docente);
	lista_brigada_oficialVP($alumnos);
}
function filtro_alumnos_docP($docente){
	$arg = $_POST['info'];
	$alumnos = buscar_alumnos_docente($arg, $docente);
	//lista_alumnos($alumnos);
	lista_brigada_oficialVP($alumnos);
}

?>