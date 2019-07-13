<?php
session_start();
if (isset($_SESSION['username'])){
  header('Location: home.php');
}
?>
<html>
<head>
<title>Ingresa</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body ><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table border="0" width="780px" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>
	<div id="c1">
		<a href="home.php">INICIO</a> 
	</div>
</td>
<td>
    <div id="c2">
		<a href="conocenos.php">CONOCENOS</a> 
	</div>
</td>
<td>
	<div id="c3">
		<a href="galeria.php">GALERIA</a> 
	</div>
</td>
<td>
	<div id="c4">
		<a href='#'>INGRESA</a>
	</div>
</td>
</tr>
</table>
<table align="center">
<br><br><br><br>
	 <tr>
		<td align="center" width="50%">
		
	 <div class="img">
			<a href="../sedafpa/pescadores/logindepescadores.php"><h3>PESCADORES</h3>
			<img src="../sedafpa/img/pesca1.png" width="100" height="75" border="0"><span></span></a>
	</div>
		</td>
	
		<td align="center" width="50%">
		 <div class="img">
		<a href="../sedafpa/acuacultores/logindeacuacultores.php"><h3>ACUACULTORES</h3>
		<img src="../sedafpa/img/acuacultura.png" width="100" height="75" border="0"><span></span></a>
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
</body>
 
		
</html>