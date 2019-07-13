<?php

	include 'conexacuicultor.php';
	$error="Datos incorrectos ingrese nuevamente";
	$indice=1;
	$pass=md5($_POST['password']);
	$consulta = mysql_query("SELECT * FROM usuarios WHERE 
				(usuario = '" . mysql_real_escape_string($_POST['usuario']) . "') 
				and (contrasenia = '" . mysql_real_escape_string($pass) . "')");
	
		if (mysql_num_rows($consulta) != 0) {
			session_start();
			$_SESSION['username'] = $_POST['usuario'];
			while ($row=mysql_fetch_array($consulta))
			{
				$_SESSION['tuser']= $row['tipousuario'];
			}
			$_SESSION['idsesion']=$indice;
			header('Location: accion.php');
		}
		else {
			session_start();
			header('Location: logindeacuacultores.php');
			$_SESSION['error']=$error;
		}
		
?>