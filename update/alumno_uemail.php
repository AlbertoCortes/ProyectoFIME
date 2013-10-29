<?php
require_once("../update/lib.php");
$alumno = $_POST['alumno'];
seleccionar_docente($alumno);
$alumnoModif = array();
        $datosAlumno= array("uemail");//se obtiene de los names del formulario
        foreach($datosAlumno as $key => $datoAlumno){
        $alumnoModif[]= $_POST[$datoAlumno];
        }
//update_D($docente, $docenteModif);
update_alumno_email($alumno, $alumnoModif);
?>