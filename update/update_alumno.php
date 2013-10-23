<?php
require_once("../update/lib.php");
$alumno = $_POST['alumno'];
seleccionar_alumno($alumno);
$alumnoModif = array();
        $datosAlumno= array("nombre", "email", "brigada");//se obtiene de los names del formulario
        foreach($datosAlumno as $key => $datoAlumno){
        $alumnoModif[]= $_POST[$datoAlumno];
        }
update_alumno($alumno, $alumnoModif);
?>