<?php
require_once("../update/lib.php");
$docente = $_POST['docente'];
seleccionar_docente($docente);
$docenteModif = array();
        $datosDocente= array("nombre", "telefono", "email");//se obtiene de los names del formulario
        foreach($datosDocente as $key => $datoDocente){
        $docenteModif[]= $_POST[$datoDocente];
        }
update_docente($docente, $docenteModif);
?>