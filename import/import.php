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
	$sql = "LOAD DATA LOCAL INFILE '$dir' INTO TABLE alumno (matricula, nombre, brigada, plan) SET pass = matricula, privilegios='0'";
	
	$result = mysql_query($sql);
	if($result > 0){
		import_calif();
		import_asist();
		echo'<script type="text/javascript">alert("La operacion se ha llevado a cabo con exito");window.location.href="javascript:window.history.back()";</script>';
	}
	else {
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia con el archivo seleccionado");window.location.href="javascript:window.history.back()";</script>';
	}
}
function import_calif(){
	$sql = "INSERT INTO sflbf4.calificaciones(matricula) SELECT matricula FROM sflbf4.alumno";
	$result = mysql_query($sql);
}
function import_asist(){
	$sql = "INSERT INTO sflbf4.asistencia(matricula) SELECT matricula FROM sflbf4.alumno";
	$result = mysql_query($sql);
}
import_mysql($archivo);
//import_plan($archivo);
?>