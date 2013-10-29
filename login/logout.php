<?php
session_start();
require_once('valid.php');
$user = $_SESSION['usuario'];
$ref = $user->privilegios;
echo $ref;
  switch($ref){
  	case 0:
		session_destroy();
		header('Location: ../index.php');
		break;
		
	case 1:
		session_destroy();
		header('Location: ../docente/index.php');
		break;
		
	case 2:
		session_destroy();
		header('Location: ../admin/index.php');
		break;
  }
 
 
 
 /*
if($ref == 3){
	session_destroy();
	header('Location: ../index.php');
}
elseif($ref == 1 || $ref == 2){
session_destroy();
header('Location: ../login/Ad_doc_Index.php');}*/
?>