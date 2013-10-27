<?php
require_once("../update/lib.php");
$brigada = $_POST['brigada'];
seleccionar_brigadaP($brigada);
$brigadaModif = array();
        $datosBrigada= array("NAlumnos", "disp");//se obtiene de los names del formulario
        foreach($datosBrigada as $key => $datoBrigada){
        $brigadaModif[]= $_POST[$datoBrigada];
        }
update_brigadaP($brigada, $brigadaModif);
?>