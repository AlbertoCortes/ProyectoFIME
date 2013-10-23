<?php
require_once("../config.php");
$docente = $_POST['id'];
function del_empleado($num_empleado){
	$sql = "DELETE FROM sflbf4.docente WHERE num_empleado = '$num_empleado'";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("El docente ha sido dado de baja del sistema");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en el sistema, por favor contacte a su administrador");window.location.href="javascript:window.history.back()";</script>';
	}
}
del_empleado($docente);
?>