<?php
session_start();
require_once("../login/valid.php");
require_once("../login/validpriv.php");
require_once('../config.php');
require_once('../lib/lib.php');
$usuario =  $_POST['alumno'];
$brigada = $_POST['brig'];
$user = $_SESSION['usuario'];
//echo $usuario."<br />";
//echo $brigada."<br />";
switch ($user->privilegios) {
	case '3':
		$dir = "../docenteP/docenteP.php";
		
		break;
	case '2':
		$dir = "../admin/admin.php";
		
		break;
	default:
		
		break;
}
//$alumno = $_POST['alumno'];
	if(empty($brigada))
	{
		echo'<script type="text/javascript">alert("ERROR: Seleccione una birgada");window.location.href="javascript:window.history.back()";</script>'; 
		die();  
	}
	//echo $usuario->matricula;
	//echo "<br>".$brigada;
function inscribir($alumno, $brigada, $dir){
	 $sql = "UPDATE sflbf4.alumno SET brigadaP='$brigada', status='1' WHERE matricula = '$alumno'";
	 //echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
                //echo "<script type='text/javascript'>alert('Se ha actualizado la informacion');</script>";  
                decre($brigada);
				echo'<script type="text/javascript">alert("Usted ha quedad inscrito en la brigada '.$brigada.'");window.location.href="'.$dir.'";</script>';
				//header('Location: ../admin/admin_docentes.php');
        }
        else {
        		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        }  
}
function decre($brigada){
	$sql = "UPDATE sflbf4.brigadas SET cupo=cupo-1 WHERE idbrigadas='$brigada'";
	 //echo "<br>".$sql;
$result= mysql_query($sql);
}
function validar($brigada, $usuario, $dir){
	$sql = "SELECT cupo FROM sflbf4.brigadas WHERE idbrigadas='$brigada'";
	$result = mysql_query($sql);
	$valor = mysql_fetch_array($result);
	$cupo = $valor['0'];
	echo $cupo;
	if ($cupo == 0){
		echo'<script type="text/javascript">alert("ERROR. La brigada ya esta llena, porfavor elija otra");window.location.href="javascript:window.history.back()";</script>';
	}
	else{
		inscribir($usuario, $brigada, $dir);
	}
}
validar($brigada, $usuario, $dir);
//inscribir($usuario->matricula, $brigada);
//	echo $brigada;
//valid_alumno($matricula);
//insert_alumno($matricula, $nombre, $plan, $pass, $Email, $brigada);
?>