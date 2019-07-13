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
<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
<tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: CONSULTAS PESCADORES :: </h2>
	</td>
  </tr>
</table>
<div align="center">
<div id='cssmenu' >
<ul>
   <li class='has-sub'><a href=''><span>PRODUCCION</span></a>
      <ul>
        <li><a href='../pescadores/consultas/produccion/producmun.php'><span>MUNICIPIO</span></a></li>
         <li><a href='../pescadores/consultas/produccion/producdist.php'><span>DISTRITO</span></a></li>
         <li><a href='../pescadores/consultas/produccion/producreg.php'><span>REGION</span></a></li>
         <li><a href='../pescadores/consultas/produccion/producest.php'><span>ESTADO</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>POBLACION PESQUERA</span></a>
      <ul>
		 <li><a href='../pescadores/consultas/poblacionpesquera/problapmun.php'><span>MUNICIPIO</span></a></li>
         <li><a href='../pescadores/consultas/poblacionpesquera/problapdist.php'><span>DISTRITO</span></a></li>
         <li><a href='../pescadores/consultas/poblacionpesquera/problapreg.php'><span>REGION</span></a></li>
         <li><a href='../pescadores/consultas/poblacionpesquera/problapest'><span>ESTADO</span></a></li>
         
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>COSTOS DE PRODUCCIÓN</span></a>
      <ul>
         <li><a href='../pescadores/consultas/costos/costosmun.php'><span>MUNICIPIO</span></a></li>
         <li><a href='../pescadores/consultas/costos/costosdist.php'><span>DISTRITO</span></a></li>
         <li><a href='../pescadores/consultas/costos/costosreg.php'><span>REGION</span></a></li>
         <li><a href='../pescadores/consultas/costos/costosest.php'><span>ESTADO</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>PESQUERIA</span></a>
      <ul>
         <li><a href='../pescadores/consultas/pesqueria/pmun.php'><span>MUNICIPIO</span></a></li>
         <li><a href='../pescadores/consultas/pesqueria/pdist.php'><span>DISTRITO</span></a></li>
         <li><a href='../pescadores/consultas/pesqueria/preg.php'><span>REGION</span></a></li>
         <li><a href='../pescadores/consultas/pesqueria/pest.php'><span>ESTADO</span></a></li>
      </ul>
   </li>
  
</ul>
</div></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div align="center">
	<a href="opcion.php"><button name="regresar" type="Submit">REGRESAR AL MENU OPCIONES PESCADORES</button></a>
</div>

	  
	  
</body>
</html>