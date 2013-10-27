<?php
require_once("../config.php");
$alumno = $_POST['id'];
function del_alumno($alumno){
	$sql = "DELETE FROM sflbf4.alumno WHERE matricula = '$alumno'";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("El alumno ha sido dado de baja del sistema");window.location.href="../admin/admin_alumnos.php";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en el sistema, por favor contacte a su administrador");window.location.href="../admin/admin_alumnos.php";</script>';
	}
}
del_alumno($alumno);
?>