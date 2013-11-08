<?php
session_start();
require_once('../config.php');
echo "<meta charset = 'utf-8' />";
$user = $_POST['usuario'];
$pass = $_POST['pass'];
$priv = $_POST['niv'];
function validAdmin($user, $pass){
	$sql= "SELECT idadministrador, nombre, user, pass, telefono, email, privilegios  
	FROM sflbf4.administrador WHERE user ='$user' AND pass = '$pass' LIMIT 1";
	$result=mysql_query($sql);
	$usuario = null;
	while($row=mysql_fetch_object($result)) {
		$usuario = $row;
	}
	return $usuario;
}
function validDocente($user, $pass){
	$sql= "SELECT num_empleado, nombre, pass, telefono, email, privilegios 
	FROM sflbf4.docente WHERE num_empleado ='$user' AND pass = '$pass' LIMIT 1";
	$result=mysql_query($sql);
	$usuario = null;
	while($row=mysql_fetch_object($result)){
		$usuario = $row;
	}
	return $usuario;
}
function validAlumno($user, $pass){
	$sql= "SELECT matricula, nombre, pass, email, brigada,plan,  privilegios, brigadaP 
	FROM sflbf4.alumno WHERE matricula ='$user' AND pass = '$pass' LIMIT 1";
	$result=mysql_query($sql);
	$usuario = null;
	while($row=mysql_fetch_object($result)){
		$usuario = $row;
	}
	return $usuario;
}
if ( empty($user) || empty($pass) || ($priv==NULL)){
	echo'<script type="text/javascript">alert("ERROR: No deje campos vacios");window.location.href="javascript:window.history.back()";</script>'; 
	die();
}
if($priv == 2){
	$usuario=validAdmin($user, $pass);
		if(!empty($usuario)){
			$_SESSION['usuario'] = $usuario;
			header('Location: ../admin/admin.php');	
		}else{
			echo'<script type="text/javascript">alert("ERROR: Usuario o contraseña incorrectos");window.location.href="javascript:window.history.back()";</script>'; 
			die();

			}
}
if($priv == 1){
	$usuario=validDocente($user, $pass);
		if(!empty($usuario)){
			$_SESSION['usuario'] = $usuario;
			switch ($usuario->privilegios) {
				case '1':
					header('Location: ../docente/docente.php');
					break;
				case '3':
					header('Location: ../docenteP/docenteP.php');
					break;
			}
			
		}else{
			echo'<script type="text/javascript">alert("ERROR: Usuario o contraseña incorrectos");window.location.href="javascript:window.history.back()";</script>'; 
			die();

			}
}
if($priv == 0){
	$usuario=validAlumno($user, $pass);
		if(!empty($usuario)){
			$_SESSION['usuario'] = $usuario;
			header('Location: ../alumno/alumno.php');	
		}else{
			echo'<script type="text/javascript">alert("ERROR: Usuario o contraseña incorrectos");window.location.href="javascript:window.history.back()";</script>'; 
			die();

			}
}
?>