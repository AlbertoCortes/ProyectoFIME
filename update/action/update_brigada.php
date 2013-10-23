<?php
require_once("../lib/lib.php");
$brigada = $_POST['brigada'];
seleccionar_brigada($brigada);
$brigadaModif = array();
        $datosBrigada= array("brigada", "Maestro");//se obtiene de los names del formulario
        foreach($datosBrigada as $key => $datoBrigada){
        $brigadaModif[]= $_POST[$datoBrigada];
        }
update_brigada($brigada, $brigadaModif);
?>