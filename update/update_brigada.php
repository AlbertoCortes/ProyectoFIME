<?php
require_once("../update/lib.php");
$brigada = $_POST['brigada'];
seleccionar_brigadaP($brigada);
$brigadaModif = array();
        $datosBrigada= array("brigada", "Maestro");//se obtiene de los names del formulario
        foreach($datosBrigada as $key => $datoBrigada){
        $brigadaModif[]= $_POST[$datoBrigada];
        }
update_brigada($brigada, $brigadaModif);
?>