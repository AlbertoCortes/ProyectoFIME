<?php
require_once('../config.php');
require_once('../lib/lib.php');
$brigada = $_POST['Nobrigada'];
$maestro = $_POST['Maestro'];
	if(empty($brigada) || empty($maestro))
	{
		echo'<script type="text/javascript">alert("ERROR: No deje campos vacios");window.location.href="javascript:window.history.back()";</script>'; 
		die();  
	}
valid_brigada_real($brigada); //Esta funcion valida que la brigada introducida no exista para evitar redundancia
inser_bigada_real($brigada, $maestro);
?>