<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset = "utf-8" />
  <link rel = "stylesheet" href = "../CSS/index.css"/>
  <link rel = "shortcut icon" href = "resources/images/favicon.jpg"/>
  <title>Laboratorio de fisica moderna</title>
</head>

<body>
  <div id = "container">
    <div id = "top_bar">Laboratorio de Fisica Moderna - Login Page (Administrador - Docente)</div>
    <div id = "content">
      <div id = "logindiv">
        <h1>Sistema Flexible de Inscripciones al Laboratorio de Fisica Moderna.</h1>
        <h3 align="justify">   El nuevo sistema de inscripciones del laboratorio de fisica moderna
                te ayudará a organizar mejor tu tiempo, evitar sobre cupo en el laboratorio,
                además podras checar tus calificaciones asi como avisos de ultima hora 
                que puedan surgir.</h3></br></br>
      <table id = "logintable">
            <form name="login" action="loginvalidate.php" method="POST">
            <tr><td>Entrar como: </td><td><select name='niv' id='niv'><option value='1'>Administrador</option><option value='2'>Docente</option></select></td></tr>
            <tr><td>Usuario:</td><td><input type="text" name="user"/></td></tr>
            <tr><td>Contraseña:</td><td><input type="password" name="pass"/></td></tr>
            <tr><td colspan="2"><br /><center><input class="botonlog" type="submit" value="Entrar"/></center></td></tr>
            </form> 
            </table>
       </div>     
    </div>


  </div>
</body>

</html>
