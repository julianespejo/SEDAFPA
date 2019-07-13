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
			<a href= logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESIÓN:<br>";
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
La Secretaría de Desarrollo Agropecuario, Foresta, Pesca y Acuacultura (SEDAFPA), es la encargada de planear, regular, fomentar y promover el desarrollo agrícola, ganadero, forestal y pesquero del Estado, lo cual implica que participe en la formulación y ejecución de convenios con el gobierno federal, entidades federativas y con ayuntamientos. También implica que estimule la formación de asociaciones, comités o patronatos de carácter público, privado o mixto, cuyo propósito sea el desarrollo del ámbito rural, brindando la capacitación, asistencia técnica, y asesoramiento jurídico, teniendo como principios la equidad de género, el impacto ambiental, la eficiencia y la transparencia, además de darse a la tarea de investigar, determinar y aplicar los métodos y procedimientos técnicos que permitan incrementarla productividad de las actividades agrícolas, ganaderas, forestales y pesqueras del Estado sin dejar pasar la tarea de establecer la infraestructura que haga el desarrollo del plan Sectorial de Desarrollo Rural Sustentable.
        </p>
	  
	  <br/>
	  <br/>
	    <h3>MISIÓN</h3>
	    <p>
	  Como instancia de gobierno estatal facilitar el desarrollo rural, integral y sustentable que genere las condiciones para el fortalecimiento y la competitividad en la produccion, industrializacion y comercialización del sector agropecuario, forestal, acuícola y pesquero oaxaquense.
 
	    </p>
	  
	  <br/>
	  <br/>
	    <h3>VISIÓN</h3>
	    <p>
	  Ser la secretaría líder a nivel estatal, por la aplicacion transparente de políticas públicas generadoras de un desarrollo integral sustentable de los sectores agropecuario, forestal, acuícola y pesquero; contribuyendo a mejorar la calidad de vida del sector rural.
	    </p>
	  </div>
	  </td>
	  </tr>
	  
	  </table>
	 <!-- <div id="footer" align="center">
		<font size="1px" color="#aaaaaa">
			<tr><br><a href="http://sedafpaoaxaca.zapto.org">"SEDAFPAOAXACA"</a> </tr> 
			<tr><br>GOBIERNO DEL ESTADO DE OAXACA 2010-2016</tr>
			<tr><br>Ciudad Administrativa Benemérito de las Américas</tr>
			<tr><br>Carretera Oaxaca-Istmo Km. 11.5, Tlalixtac de Cabrera, Oaxaca C.P. 68270</tr>
			<tr><br>Conmutador (951) 50 1 50 00</tr>

		</font>
		</div> -->
</body>

</html>