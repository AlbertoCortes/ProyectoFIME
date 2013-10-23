<?php
require_once("../config.php");
$dir = "archivos/";
opendir($dir);
$nombre = $_FILES['import']['name'];
$archivo = $dir.$nombre;
$dest = $dir.$_FILES['import']['name'];
copy($_FILES['import'] ['tmp_name'], $dest);
echo $archivo;
function import_mysql(){
	global $archivo;
	$sql = "LOAD DATA INFILE '$archivo' INTO TABLE alumno (matricula, nombre, brigada_real_idbrigada_real)";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La operacion se ha llevado a cabo con exito");window.location.href="javascript:window.history.back()";</script>';
	}
	else {
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia con el archivo seleccionado");window.location.href="javascript:window.history.back()";</script>';
	}
}
?>