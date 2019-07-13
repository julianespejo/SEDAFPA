<?php session_start();?>
<html>
<head>
<title>Conocenos</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body >
<?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table border="0" width="780px" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>
	<div id="c1">
		<a href="home.php">INICIO</a> 
	</div>
</td>
<td>
   	<div id="c2">
		<a href="#">CONOCENOS</a> 
	</div>
</td>
<td>
	<div id="c3">
		<a href="galeria.php" >GALERIA</a> 
	</div>
</td>
<td>
	<div id="c4">
		<a href="ingresa.php">INGRESA</a> 
	</div>
</td>
</tr>
</table>
<?php
if (isset($_SESSION['username'])){
echo "<div id=menusesion>
	<ul>
		<li>
			<a href=home.php ><img src= ../sedafpa/img/50home.png  border= 0 ><p>INICIO</p></a>
		</li>
		<li>
			<a href='#'><img src= ../sedafpa/img/50graficas.png border= 0 ><p>CONSULTAS</p></a>
		</li>
		<li>
			<a href= logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESI�N:<br>";
	echo  $_SESSION['username'] ;
	echo "<p/></a>
		</li>
	</ul>
</div>";
}
?>
  <table align="center" width="780px" border="0">
	  <tr>
	  <td><div align="center">
	  <br/>
	  <br/>
	    <h3>OBJETIVO</h3>
	    <p>
La Secretar�a de Desarrollo Agropecuario, Foresta, Pesca y Acuacultura (SEDAFPA), es la encargada de planear, regular, fomentar y promover el desarrollo agr�cola, ganadero, forestal y pesquero del Estado, lo cual implica que participe en la formulaci�n y ejecuci�n de convenios con el gobierno federal, entidades federativas y con ayuntamientos. Tambi�n implica que estimule la formaci�n de asociaciones, comit�s o patronatos de car�cter p�blico, privado o mixto, cuyo prop�sito sea el desarrollo del �mbito rural, brindando la capacitaci�n, asistencia t�cnica, y asesoramiento jur�dico, teniendo como principios la equidad de g�nero, el impacto ambiental, la eficiencia y la transparencia, adem�s de darse a la tarea de investigar, determinar y aplicar los m�todos y procedimientos t�cnicos que permitan incrementarla productividad de las actividades agr�colas, ganaderas, forestales y pesqueras del Estado sin dejar pasar la tarea de establecer la infraestructura que haga el desarrollo del plan Sectorial de Desarrollo Rural Sustentable.
        </p>
	  
	  <br/>
	  <br/>
	    <h3>MISI�N</h3>
	    <p>
	  Como instancia de gobierno estatal facilitar el desarrollo rural, integral y sustentable que genere las condiciones para el fortalecimiento y la competitividad en la produccion, industrializacion y comercializaci�n del sector agropecuario, forestal, acu�cola y pesquero oaxaquense.
 
	    </p>
	  
	  <br/>
	  <br/>
	    <h3>VISI�N</h3>
	    <p>
	  Ser la secretar�a l�der a nivel estatal, por la aplicacion transparente de pol�ticas p�blicas generadoras de un desarrollo integral sustentable de los sectores agropecuario, forestal, acu�cola y pesquero; contribuyendo a mejorar la calidad de vida del sector rural.
	    </p>
	  </div>
	  </td>
	  </tr>
	  
	  </table>
	 <!-- <div id="footer" align="center">
		<font size="1px" color="#aaaaaa">
			<tr><br><a href="http://sedafpaoaxaca.zapto.org">"SEDAFPAOAXACA"</a> </tr> 
			<tr><br>GOBIERNO DEL ESTADO DE OAXACA 2010-2016</tr>
			<tr><br>Ciudad Administrativa Benem�rito de las Am�ricas</tr>
			<tr><br>Carretera Oaxaca-Istmo Km. 11.5, Tlalixtac de Cabrera, Oaxaca C.P. 68270</tr>
			<tr><br>Conmutador (951) 50 1 50 00</tr>

		</font>
		</div> -->
</body>

</html>