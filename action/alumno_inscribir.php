<?php
session_start();
require_once("../login/valid.php");
require_once("../login/validpriv.php");
require_once('../config.php');
require_once('../lib/lib.php');
validAlumno();
$usuario =  $_SESSION['usuario'];
$brigada = $_POST['brig'];
//$alumno = $_POST['alumno'];
	if(empty($brigada))
	{
		echo'<script type="text/javascript">alert("ERROR: Seleccione una birgada");window.location.href="javascript:window.history.back()";</script>'; 
		die();  
	}
	echo $usuario->matricula;
	echo "<br>".$brigada;
function inscribir($alumno, $brigada){
	 $sql = "UPDATE sflbf4.alumno SET brigadaP='$brigada' WHERE matricula = '$alumno'";
	 //echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
                //echo "<script type='text/javascript'>alert('Se ha actualizado la informacion');</script>";  
				echo'<script type="text/javascript">alert("Usted ha quedad inscrito en la brigada '.$brigada.'");window.location.href="javascript:window.history.back()";</script>';
				//header('Location: ../admin/admin_docentes.php');
        }
        else {
        		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        }  
}
inscribir($usuario->matricula, $brigada)
//	echo $brigada;
//valid_alumno($matricula);
//insert_alumno($matricula, $nombre, $plan, $pass, $Email, $brigada);
?>