<?php session_start();?>
<html>
<head>
<title>Principal</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body >
<?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table border="0" width="780px" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>
	<div >
		<a href="home.php">INICIO</a> 
	</div>
</td>
<td>
   	<div >
		<a href="conocenos.php">CONOCENOS</a> 
	</div>
</td>
<td>
	<div >
		<a href="galeria.php" >GALERIA</a> 
	</div>
</td>
<td>
	<div >
	<?php
	if(isset($_SESSION['username'])){
		echo "<a href=logout.php>C.SESION</a> ";
		}
	else{
		echo "<a href='ingresa.php'>INGRESA</a>";
	}
	?>
	</div>
</td>
</tr>
</table>
<?php

if (isset($_SESSION['username'])){
	if($_SESSION['idsesion']==2){
		if($_SESSION['tuser']=="ADMINISTRADOR"){
		echo "<div id=menusesion>
		<ul>
			<li>
				<a href=/sedafpa/pescadores/opcion.php ><img src= ../sedafpa/img/50home.png  border= 0 ><p>OPCIONES</p></a>
			</li>
			<li>
				<a href=/sedafpa/pescadores/consultas.php><img src= ../sedafpa/img/50graficas.png border= 0 ><p>CONSULTAS</p></a>
			</li>
			<li>
				<a href=/sedafpa/pescadores/registros.php><img src= ../sedafpa/img/50agregar.png border=0><p>REGISTRAR</p></a>
			</li>
			<li>
				<a href=logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESIÓN:<br>";echo  $_SESSION['username'];echo "<p/></a>
			</li>
			<li>
				<a href='#'><img src= ../sedafpa/img/50emblema.png  border= 0 title='$_SESSION[tuser]' ><p></p></a>
			</li>
		</ul>
		</div>";
		}
		else if ($_SESSION['tuser']=="JEFE DEPTO"){
		echo "<div id=menusesion>
		<ul>
			<li>
				<a href=/sedafpa/pescadores/opcion.php ><img src= ../sedafpa/img/50home.png  border= 0 ><p>OPCIONES</p></a>
			</li>
			<li>
				<a href=/sedafpa/pescadores/consultas.php><img src= ../sedafpa/img/50graficas.png border= 0 ><p>CONSULTAS</p></a>
			</li>
			<li>
				<a href=/sedafpa/pescadores/registros.php><img src= ../sedafpa/img/50agregar.png border=0><p>REGISTRAR</p></a>
			</li>
			<li>
				<a href=logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESIÓN:<br>";echo  $_SESSION['username'];echo "<p/></a>
			</li>
			<li>
				<a href='#'><img src= ../sedafpa/img/50jefedepto.png  border=0 title='$_SESSION[tuser]' ><p></p></a>
			</li>
			</ul>
		</div>";
		}
		else{
		echo "<div id=menusesion>
		<ul>
			<li>
				<a href=/sedafpa/pescadores/opcion.php ><img src= ../sedafpa/img/50home.png  border= 0 ><p>OPCIONES</p></a>
			</li>
			<li>
				<a href=/sedafpa/pescadores/consultas.php><img src= ../sedafpa/img/50graficas.png border= 0 ><p>CONSULTAS</p></a>
			</li>
			<li>
				<a href=/sedafpa/pescadores/registros.php><img src= ../sedafpa/img/50agregar.png border=0><p>REGISTRAR</p></a>
			</li>
			<li>
				<a href=logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESIÓN:<br>";echo  $_SESSION['username'];echo "<p/></a>
			</li>
			<li>
				<a href='#'><img src= ../sedafpa/img/50capturista.png  border=0 title='$_SESSION[tuser]' ><p></p></a>
			</li>
		</ul>
		</div>";
	
		}
	
	}
	else if($_SESSION['idsesion']==1){
		if($_SESSION['tuser']=="ADMINISTRADOR"){
			echo "<div id=menusesion>
			<ul>
				<li>
					<a href=/sedafpa/acuacultores/accion.php ><img src= ../sedafpa/img/50home.png  border= 0 ><p>OPCIONES</p></a>
				</li>
				<li>
					<a href=/sedafpa/acuacultores/acuacultores.php><img src= ../sedafpa/img/50agregar.png border=0><p>REGISTRAR</p></a>
				</li>
				<li>
					<a href=logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESIÓN:<br>";echo  $_SESSION['username'];echo "<p/></a>
				</li>
				<li>
					<a href='#'><img src= ../sedafpa/img/50emblema.png  border= 0 title='$_SESSION[tuser]' ><p></p></a>
				</li>
			</ul>
			</div>";
		}
		else if($_SESSION['tuser']=="JEFE DEPTO"){
		
			echo "<div id=menusesion>
			<ul>
				<li>
					<a href=/sedafpa/pescadores/opcion.php ><img src= ../sedafpa/img/50home.png  border= 0 ><p>OPCIONES</p></a>
				</li>
				<li>
					<a href=/sedafpa/pescadores/consultas.php><img src= ../sedafpa/img/50graficas.png border= 0 ><p>CONSULTAS</p></a>
				</li>
				<li>
					<a href=/sedafpa/pescadores/registros.php><img src= ../sedafpa/img/50agregar.png border=0><p>REGISTRAR</p></a>
				</li>
				<li>
					<a href=logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESIÓN:<br>";echo  $_SESSION['username'];echo "<p/></a>
				</li>
				<li>
					<a href='#'><img src= ../sedafpa/img/50jefedepto.png  border=0 title='$_SESSION[tuser]' ><p></p></a>
				</li>
				</ul>
			</div>";
			}
			else{
			echo "<div id=menusesion>
			<ul>
				<li>
					<a href=/sedafpa/pescadores/opcion.php ><img src= ../sedafpa/img/50home.png  border= 0 ><p>OPCIONES</p></a>
				</li>
				<li>
					<a href=/sedafpa/pescadores/consultas.php><img src= ../sedafpa/img/50graficas.png border= 0 ><p>CONSULTAS</p></a>
				</li>
				<li>
					<a href=/sedafpa/pescadores/registros.php><img src= ../sedafpa/img/50agregar.png border=0><p>REGISTRAR</p></a>
				</li>
				<li>
					<a href=logout.php ><img src= ../sedafpa/img/50sesion.png  border= 0 ><p>C.SESIÓN:<br>";echo  $_SESSION['username'];echo "<p/></a>
				</li>
				<li>
					<a href='#'><img src= ../sedafpa/img/50capturista.png  border=0 title='$_SESSION[tuser]' ><p></p></a>
				</li>
			</ul>
			</div>";
		
			}
		
	}
}

?>
<br><br><br><br>
<div align="center"> <iframe width="1024" height="1024" src="http://sedafpaoaxaca.blogspot.com"></iframe> </div> 
</body>	 
</html>