<?php
require_once("../config.php");
$dir = "archivos/";
opendir($dir);
if ( empty($_FILES['import']['name'])){
	echo'<script type="text/javascript">alert("ERROR: No selecciono archivo");window.location.href="javascript:window.history.back()";</script>'; 
	die();
}

$nombre = $_FILES['import']['name'];
$archivo = $dir.$nombre;
$dest = $dir.$_FILES['import']['name'];
copy($_FILES['import'] ['tmp_name'], $dest);
//echo $archivo;
function get_pass(){
	
}
function import_mysql($archivo){
	global $archivo;
	$dir = "c:wamp/www/proyectoFIME/import/".$archivo;
	$sql = "SET FOREIGN_KEY_CHECKS=0; LOAD DATA LOCAL INFILE '$dir' INTO TABLE alumno (matricula, nombre, brigada_real_idbrigada_real,plan) SET pass = matricula";
	echo $sql;/*
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La operacion se ha llevado a cabo con exito");window.location.href="javascript:window.history.back()";</script>';
	}
	else {
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia con el archivo seleccionado");window.location.href="javascript:window.history.back()";</script>';
	}*/
}
function import_plan($archivo){
	global $archivo;
	$dir = "c:wamp/www/proyectoFIME/import/".$archivo;
	$sql = "SET FOREIGN_KEY_CHECKS=0; LOAD DATA LOCAL INFILE '$dir' INTO TABLE alumno (plan) LINES STARTING BY ";" ";
	echo $sql;/*
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La operacion se ha llevado a cabo con exito");window.location.href="javascript:window.history.back()";</script>';
	}
	else {
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia con el archivo seleccionado");window.location.href="javascript:window.history.back()";</script>';
	}*/
}
import_mysql($archivo);
//import_plan($archivo);
?>