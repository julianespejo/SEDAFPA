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
	  <h2 align="center" id="borderegistro">:: OPCIONES PESCADORES :: </h2>
	</td>
  </tr>
</table>
<table align="center">
 <br><br><br><br>
	 <tr>
		<td align="center" width="50%">
			<div class="img">
				<a href="../pescadores/consultas.php"><h3>CONSULTAR</h3>
				<img src="../img/pesca1.png" width="100" height="75"><span></span></a>
			</div>
		</td>
		<td align="center" width="50%">
			<div class="img">
				<a href="../pescadores/registros.php"><h3>REGISTRAR</h3>
				<img src="../img/agregar.png" width="100" height="75"><span></span></a>
			</div>
		</td>
	</tr>
</table>
	 
	<!--<tr><td>	  
	  <div id="footer" align="center" margentop="100" height="10%">
		<font size="1px" color="#aaaaaa">
			<tr><br><a href="http://sedafpaoaxaca.zapto.org">"SEDAFPAOAXACA"</a> </tr> 
			<tr><br>GOBIERNO DEL ESTADO DE OAXACA 2010-2016</tr>
			<tr><br>Ciudad Administrativa Benemérito de las Américas</tr>
			<tr><br>Carretera Oaxaca-Istmo Km. 11.5, Tlalixtac de Cabrera, Oaxaca C.P. 68270</tr>
			<tr><br>Conmutador (951) 50 1 50 00</tr>

		</font>
		</div>
	</td></tr>-->  

</div>

</body>
</html>