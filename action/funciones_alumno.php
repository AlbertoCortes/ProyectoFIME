<?php
require_once("../lib/lib.php");
require_once("../view/view.php");
function lista_brigadasA(){
	$brigadas = listar_brigadas_disponibles();
	brigadas_disponibles_alumno($brigadas);
}
function listar_practicas($usuario){
	$practicas = listar_practicasL();
	mis_practicas($practicas, $usuario);
}
function proxbrig($alumno){
	$al = select_alumnoB($alumno);
	$brigada = select_brigada($al);
prox($brigada);
}

?>