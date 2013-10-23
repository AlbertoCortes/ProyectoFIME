<?php
require_once("../update/lib.php");
//require_once("../../lib/lib.php");
function modificar_docente(){
	$num_docente = seleccionar_docente($_POST['id']);
	echo"<table>";
	echo"<form name ='new_docente' action='../update/update_docente.php' method='POST' >";
	//echo"<tr><th>Numero de empleado:</th><td><input type='text' name='Noempleado' value='".$num_docente->num_empleado."' maxlength='7' onkeypress='javascript:return validarNro(event)'/></td></tr>"; 
	echo"<tr><th>Nombre:</th><td><input type='text' name='nombre' value='".$num_docente->nombre."' onkeypress='return soloLetras(event)'/></td></tr>";
	echo"<tr><th>Telefono:</th><td><input type='text' name='telefono' value='".$num_docente->telefono."' maxlength='10' onkeypress='javascript:return validarNro(event)'/></td></tr>";
	echo"<tr><th>Email:</th><td><input type='text' name='email' value='".$num_docente->email."'></td></tr>";
	echo "<input type='hidden' name ='docente' value='".$num_docente->num_empleado."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar Datos'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function modificar_alumno(){
	$matricula = seleccionar_alumno($_POST['id']);
	echo"<table>";
	echo"<form name ='new_alumno' action='../update/update_alumno.php' method='POST' >";
	echo"<tr><th>Nombre:</th><td><input type='text' name='nombre' value='".$matricula->nombre."' onkeypress='return soloLetras(event)'/></td></tr>";
	echo "<tr><th>Brigada:</th><td>";
	echo "<select name='brigada'>";
	echo "<option value = '".$matricula->brigada_real_idbrigada_real."'>".$matricula->brigada_real_idbrigada_real."</option>";
		$pro = drop_brigada_real();
			foreach($pro as $key =>$prv){
				echo "<option value ='{$prv->idbrigada_real}'>{$prv->idbrigada_real}</option>";
					}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr><th>Email:</th><td><input type='text' name='email' value='".$matricula->email."'></td></tr>";
	echo "<input type='hidden' name ='alumno' value='".$matricula->matricula."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar Datos'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function modificar_brigada_real(){
	$brigada = seleccionar_brigada($_POST['id']);
	$docente = select_docente($brigada->docente_num_empleado);
	echo "<table>";
	echo "<form name = 'new_brigada_real' action = '../action/update_brigada.php' method = 'POST'>";
	echo"<tr><th>Brigada Oficial:</th><td><input type='text' readonly='readonly' name='Nobrigada' maxlength='3' value='".$brigada->idbrigada_real."'/></td></tr>"; 
	echo "<tr><th>Maestro:</th><td>";
	echo "<select name='Maestro'>";
	echo "<option value = '".$docente->num_empleado."'>".$docente->nombre."</option>";
		$pro = drop_docentes();
			foreach($pro as $key =>$prv){
						echo "<option value ='{$prv->num_empleado}'>{$prv->nombre}</option>";}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo "<input type='hidden' name ='brigada' value='".$brigada->idbrigada_real."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}

//modificar_docente();
//modificar_alumno();
//modificar_brigada_real();
//modificar_docente();				
?>