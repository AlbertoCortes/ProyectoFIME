<?php
require_once("../config.php");
$brigada = $_POST['id'];
function del_oficial($brigada){
	$sql = "DELETE FROM sflbf4.brigada_real WHERE idbrigada_real = '$brigada'";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La brigada ha sido eliminada del sistema");window.location.href="../admin/admin_oficial.php";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en el sistema, por favor contacte a su administrador");window.location.href="../admin/admin_oficial.php";</script>';
	}
}
del_oficial($brigada);
?>