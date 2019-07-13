<?php
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
	header('Location: /sedafpa/ingresa.php');
	}
?>
<html>
<head>
<title>PESCADORES</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">


</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTROS DE PESCADORES :: </h2>
	</td>
  </tr>
</table>

<div align="center">
<div id='cssmenu' >
<ul>
   <li class='has-sub'><a href='pescadores.php'><span>AGREGAR</span></a>
   </li>
   <li class='has-sub'><a href='#'><span>MODIFICAR</span></a>
   </li>
   <li class='has-sub'><a href='consultas/consultapescador.php'><span>CONSULTAR</span></a>
    
   </li>
   <li class='has-sub'><a href='#'><span>ELIMINAR</span></a>
   </li>
    <li class='has-sub'><a href='historial/historialpesca.php'><span>HISTORIAL DE PESCA</span></a>
   </li>
  
</ul>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div align="center">
	<a href="opcion.php"><button name="regresar" type="Submit">REGRESAR AL MENU OPCIONES PESCADORES</button></a>
</div>

	  
	  
</body>
</html>