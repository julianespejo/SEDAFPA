<?php

	include 'conexpescadores.php';
	$error="Datos incorrectos ingrese nuevamente";
	$indice=2;
	$pass=md5($_POST['password']);
	$consulta = mysql_query("SELECT * FROM usuarios WHERE 
				(usuario = '" . mysql_real_escape_string($_POST['usuario']) . "') 
				and (contrasenia = '" . mysql_real_escape_string($pass) . "')");
	
		if (mysql_num_rows($consulta) != 0) {
			session_start();
			$_SESSION['username'] = $_POST['usuario'];
			while ($row=mysql_fetch_array($consulta))
			{
				$_SESSION['tuser']= $row['tusuario'];
			}
			$_SESSION['idsesion']=$indice;
			header('Location: opcion.php');
		}
		else {
			session_start();
			header('Location: logindepescadores.php');
			$_SESSION['errorpescador']=$error;
		}
?>