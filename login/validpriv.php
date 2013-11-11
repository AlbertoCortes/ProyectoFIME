<?php
function validAdmin(){
	$user=$_SESSION['usuario'];
	$privilegios = $user->privilegios;
	//echo $privilegios;
	if($privilegios != 2){
		header('Location: ../login/blockpage.php');
	}
}
function validDocente(){
	$user=$_SESSION['usuario'];
	$privilegios = $user->privilegios;
	//echo $privilegios;
	if($privilegios != 1){
		header('Location: ../login/blockpage.php');
	}
}
function validDocenteP(){
	$user=$_SESSION['usuario'];
	$privilegios = $user->privilegios;
	//echo $privilegios;
	if($privilegios != 3){
		header('Location: ../login/blockpage.php');
	}
	
}
function validAlumno(){
	$user=$_SESSION['usuario'];
	$privilegios = $user->privilegios;
	//echo $privilegios;
	if($privilegios != 0){
		header('Location: ../login/blockpage.php');
	}
}
?>