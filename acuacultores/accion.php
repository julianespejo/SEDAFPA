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
<title>ACUACULTORES</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: OPCIONES ACUACULTORES :: </h2>
	</td>
  </tr>
</table>

<div align="center">
<div id='cssmenu' >
<ul>
   <li class='has-sub'><a href=''><span>PRODUCCION</span></a>
      <ul>
         <li><a href='/sedafpa/acuacultores/produccion/producciondistrito.php'><span>DISTRITO</span></a></li>
         <li><a href='/sedafpa/acuacultores/produccion/produccionregion.php'><span>REGION</span></a></li>
         <li class='last'><a href='#'><span>RENDIMIENTO(!) MANTENIMIENTO</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>PRODUCTORES</span></a>
      <ul>
         <li><a href='/sedafpa/acuacultores/productores/productoresdistrito.php'><span>DISTRITO</span></a></li>
         <li><a href='/sedafpa/acuacultores/productores/productoresregion.php'><span>REGION</span></a></li>
         <li><a href='/sedafpa/acuacultores/productores/productoresestado.php'><span>ESTADO</span></a></li>
         <li class='last'><a href='/sedafpa/acuacultores/productores/productoresrnpa.php'><span>RNPA</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>COSTOS</span></a>
      <ul>
         <li><a href='#'><span>DISTRITO</span></a></li>
         <li class='last'><a href='#'><span>REGION</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>CULTIVOS</span></a>
      <ul>
         <li><a href='#'><span>DISTRITO</span></a></li>
         <li class='last'><a href='#'><span>REGION</span></a></li>
      </ul>
   </li>
   <li class='active has-sub last'><a href='#'><span>ACUACULTORES</span></a>
      <ul>
         <li><a href='acuacultores.php'><span>AGREGAR</span></a></li>
         <li><a href='#'><span>MODIFICAR</span></a></li>
         <li><a href='#'><span>BUSCAR</span></a></li>
         <li class='last'><a href='#'><span>ELIMINAR</span></a></li>
      </ul>
   </li>
</ul>
</div></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div align="center">
	<a href="/sedafpa/home.php"><button name="regresar" type="Submit">REGRESAR A LA PAGINA DE INICIO</button></a>
</div>
</body>
</html>