<?php
require_once("../lib/lib.php");
$alumno = $_POST['alumno'];
select_calif($alumno);
$califModif = array();
        $datosCalif = array("c1", "c2","c3", "c4","c5", "c6","c7", "c8","c9", "c10");//se obtiene de los names del formulario
        foreach($datosCalif as $key => $datoCalif){
        $califModif[]= $_POST[$datoCalif];
        }
update_calif($alumno, $califModif);
?>