<?php
require_once("../lib/lib.php");
require_once("../view/view.php");
function lista_brigadasA(){
	$brigadas = listar_brigadas_disponibles();
	brigadas_disponibles_alumno($brigadas);
}
?>