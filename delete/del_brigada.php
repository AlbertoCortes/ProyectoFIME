<?php
require_once("../config.php");
$brigada = $_POST['id'];
function del_brigada($brigada){
	$sql = "DELETE FROM sflbf4.brigadas WHERE idbrigadas = '$brigada'";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La brigada ha sido eliminada del sistema");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en el sistema, por favor contacte a su administrador");window.location.href="javascript:window.history.back()";</script>';
	}
}
del_brigada($brigada);
?>