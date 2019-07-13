<?php session_start();?>
<html>
<head>
<title>Galeria</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
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
		<a href="conocenos.php">CONOCENOS</a> 
	</div>
</td>
<td>
	<div id="c3">
		<a href="#" >GALERIA</a> 
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
	echo  $_SESSION[username] ;
	echo "<p/></a>
		</li>
	</ul>
</div>";
}
?>
  <table align="center" width="780" border="0">
	 
	  <div id="gallery">
  <div id="imagearea" align="center">
    <div id="image">
      <a href="javascript:slideShow.nav(-1)" class="imgnav " id="previmg"></a>
      <a href="javascript:slideShow.nav(1)" class="imgnav " id="nextimg"></a>
    </div>
  </div>
  <div id="thumbwrapper">
    <div id="thumbarea">
      <ul id="thumbs">
        <li value="1"><img src="img/1.jpg" width="179" height="100" alt="" /></li>
        <li value="2"><img src="img/2.jpg" width="179" height="100" alt="" /></li>
        <li value="3"><img src="img/3.jpg" width="179" height="100" alt="" /></li>
        <li value="4"><img src="img/4.jpg" width="179" height="100" alt="" /></li>
        <li value="5"><img src="img/5.jpg" width="179" height="100" alt="" /></li>
		<li value="6"><img src="img/6.jpg" width="179" height="100" alt="" /></li>
		<li value="7"><img src="img/7.jpg" width="179" height="100" alt="" /></li>
		<li value="8"><img src="img/8.jpg" width="179" height="100" alt="" /></li>
      </ul>
    </div>
  </div>
</div>
<div>
<script type="text/javascript">
var imgid = 'image';
var imgdir = 'img';
var imgext = '.jpg';
var thumbid = 'thumbs';
var auto = true;
var autodelay = 7;
</script>
<script type="text/javascript" src="slide.js"></script>
</div>
</table>

<!--<table  align="center">
    
	<div id="footer" align="center">
		
			<tr><td><div align="center"><br><a href="http://sedafpaoaxaca.zapto.org">"SEDAFPAOAXACA"</a> 
			<br>GOBIERNO DEL ESTADO DE OAXACA 2010-2016
			<br>Ciudad Administrativa Benemérito de las Américas
			<br>Carretera Oaxaca-Istmo Km. 11.5, Tlalixtac de Cabrera, Oaxaca C.P. 68270
			<br>Conmutador (951) 50 1 50 00</td></tr>
			</div>
		
	</div>
</table>
-->
</body>

</html>