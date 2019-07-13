<?php
session_start();
if (isset($_SESSION['username'])){
  header('Location: /sedafpa/home.php');
}
?>
<html>
<head>
<title>PESCADORES</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table border="0" width="780px" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>
	<div id="c1">
		<a href="/sedafpa/home.php">INICIO</a> 
	</div>
</td>
<td>
   	<div id="c2">
		<a href="/sedafpa/conocenos.php">CONOCENOS</a> 
	</div>
</td>
<td>
	<div id="c3">
		<a href="/sedafpa/galeria.php" >GALERIA</a> 
	</div>
</td>
<td>
	<div id="c4">
		<a href="#.php">INGRESA</a> 
	</div>
</td>
</tr>
</table>
<br/>
<br/>
<br/>
<h1>PESCADORES</h1>
<?php 

if (isset($_SESSION['errorpescador'])) {
			echo "<div align='center'><a style='color:#ff0000'>".($_SESSION['errorpescador'])."</a></div>"; 
		}
unset($_SESSION['errorpescador']);

?>
<form method="post" action="validarusuario.php">
<table align="center" border="0px" width="780px">
<tr>
    <td><label>
      <div align="right"><b>Nombre de Usuario:</b></div>
    </label></td>
    <td><input type="text" name="usuario" required/></td>
  </tr>
  <tr>
    <td><label>
      <div align="right"><b>Contrase&ntilde;a:</b></div>
    </label></td>
    <td><input type="password" name="password" required/></td>
  </tr>
</table>
 
  <table align="center" width="780px" height="30px" border="0px">
  <tr>
	<td><div align="right"> <input type="submit" name="loginpescador" value="Aceptar" align="middle"/>
	    </div>
	</td>

   
	   <td align="left"><a href="../ingresa.php"> <input type="button" name="submit" value="Regresar" align="middle"/></a>
	   </td>
    </tr>
</table>
</form>

	  
	  
	  
</body>
</html>