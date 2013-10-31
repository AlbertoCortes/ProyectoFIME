<?php
require_once('../config.php');
require_once('../lib/lib.php');
$Noempleado = $_POST['Noempleado'];
$Nombre     = $_POST['Nombre'];
$Telefono   = $_POST['Telefono'];
$Email      = $_POST['Email'];
$Permisos 	= $_POST['permisos'];
	if(empty($Noempleado) || empty($Nombre) || empty($Telefono) || empty($Email))
	{
		echo'<script type="text/javascript">alert("ERROR: No deje campos vacios");window.location.href="javascript:window.history.back()";</script>';  
		die();  
	}
$pass = $Noempleado;
valid_docente($Noempleado);
insert_docente($Noempleado, $Nombre, $pass, $Telefono, $Email, $Permisos); 
?>