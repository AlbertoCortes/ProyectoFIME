<?php
require_once('../config.php');
require_once('../lib/lib.php');
$Noempleado = $_POST['Noempleado'];
$Nombre     = $_POST['Nombre'];
$Telefono   = $_POST['Telefono'];
$Email      = $_POST['Email'];
	if(empty($Noempleado) || empty($Nombre) || empty($Telefono) || empty($Email))
	{
		echo'<script type="text/javascript">alert("ERROR: No deje campos vacios");window.location.href="javascript:window.history.back()";</script>';  
		die();  
	}
$user = $Noempleado;
$pass = $Noempleado;
valid_docente($Noempleado);
insert_docente($Noempleado, $Nombre, $user, $pass, $Telefono, $Email); 
?>