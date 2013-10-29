<?php
require_once("../update/lib.php");
$docente = $_POST['docente'];
seleccionar_docente($docente);
$dox = seleccionar_docente($docente);
$contra1 = $_POST['c1'];
$contra2 = $_POST['c2'];
$contra3 = $_POST['c3'];
if($contra1 != $dox->pass){
	echo'<script type="text/javascript">alert("ERROR. Su password actual es incorrecto");window.location.href="javascript:window.history.back()";</script>';
}
if($contra2 != $contra3){
	echo'<script type="text/javascript">alert("ERROR. Las nuevas contrasenas no coinciden");window.location.href="javascript:window.history.back()";</script>';
}
$docenteModif = array();
        $datosDocente= array("c2");//se obtiene de los names del formulario
        foreach($datosDocente as $key => $datoDocente){
        $docenteModif[]= $_POST[$datoDocente];
        }
update_D($docente, $docenteModif);
?>