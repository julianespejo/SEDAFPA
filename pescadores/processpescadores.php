<?php
session_start();
?>
<html>
<head>
<title>
:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA ::
</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>

<table class="punteado" width="820" border="0px" align="center">
    <tr>
		<td colspan=2>
		
		
		<?php
		include 'conexpescadores.php';
		 //PAGINA QUE INGRESA LOS DATOS DE LA PRIMERA PAGINA
		 if(isset($_REQUEST['pag1']))
		 {
			
		$Razon=$_POST['txt_razon'];
		$Rfc=$_POST['txt_rfc'];
		$Nombre=$_POST['txt_nombre'];
		$Curp=$_POST['txt_curp'];
		$Tel=$_POST['txt_tel'];
		$Email=$_POST['txt_correo'];
		$Dom=$_POST['txt_domicilio'];
		$Loc=$_POST['txt_localidad'];
		$Mun=$_POST['txt_municipio'];
		$Dis=$_POST['txt_distrito'];
		$Reg=$_POST['txt_region'];
		$Gsanguineo=$_POST['txt_gsanguineo'];
		$Tpescador=$_POST['txt_tpescador'];
		$Npermiso=$_POST['txt_npermiso'];
		$Rnpue=$_POST['txt_rnpue'];
		$Vigenciade=$_POST['txt_vigenciade'];
		$Vigenciahasta=$_POST['txt_vigenciahasta'];
		$Pesc=$_POST['txt_pesqueria'];
		
		
		 
	
		$query = mysql_query("INSERT INTO datospescador (razonsocial,rfc,nombre,curp,telefono,correo,domicilio,
							localidad,municipio,distrito,region,gsanguineo,tpescador,npermiso,rnpue,vigenciade,vigenciahasta,pesqueria)
							VALUES ('$Razon','$Rfc','$Nombre','$Curp','$Tel','$Email','$Dom','$Loc','$Mun','$Dis','$Reg',
							'$Gsanguineo','$Tpescador','$Npermiso','$Rnpue','$Vigenciade','$Vigenciahasta','$Pesc')
							",$conexion);

							
		
		$last = "SELECT LAST_INSERT_ID() FROM datospescador";
		$last_id = mysql_result( mysql_query( $last ), 0, 0 );
		$_SESSION['idlast']=$last_id;
		
		echo "Los datos fueron agregados exitosamente </br>";
		echo "Espere por favor  ....";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='2;url=http://localhost/sedafpa/pescadores/cantidademb.php'>";
		
		
		}
		
		//PAGINA QUE SE INGRESA LA CANTIDAD DE LA EMBARCACION
		 if(isset($_REQUEST['cantidademb']))
		 {
			//SI ESTA ACTIVA LA SESION DEL ULTIMO ID DEL PESCADOR SE EJECUTA EL CODIGO
			if (isset($_SESSION['idlast'])) {
			$id_last=$_SESSION['idlast'];
			
			$Cantemb=$_POST['txt_cantidad'];
			
			
			$_SESSION['embarcacion']=$Cantemb;
			
						
			$contador=1;
			$_SESSION['contador']=$contador;
			
			//CONSULTA DE LA CANTIDAD DE EMBARCACION
			$query = mysql_query("INSERT INTO cantidadembarcacion(cantidad,id_datospescador) 
								VALUES ('$Cantemb','$id_last')",$conexion);
			
			//OBTENIENDO EL ULTIMO ID GENERADO POR LA CANTIDAD DE EMBARCACION
			$last = "SELECT LAST_INSERT_ID() FROM cantidadembarcacion";
			$last_id = mysql_result( mysql_query( $last ), 0, 0 );
			$_SESSION['idlastcantidad']=$last_id;
			
			
			//REDIRIGIEDO A LA SIGUIENTE PÁG
			echo "Espere por favor redirigiendo a la pagina 2 ....";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='3;url=http://localhost/sedafpa/pescadores/pescadores2.php'>";
			
			}

		 }
		 //SEGUNDA PAGINA DE EMBARCACION
		 
		 if(isset($_REQUEST['pag2']))
		 {		
				// SI LA SESION DEL ULTIMO ID GENERADO DEL PESCADOR SE EJECUTA EL CODIGO
				if (isset($_SESSION['idlast'])) 
				{
				
						
						$Recall=$_SESSION['embarcacion']; //ASIGNANDO LA SESSION EMBARCACION
						$Contador=$_SESSION['contador']; //ASIGNANDO LA SESSION DE CONTADOR
						
					
						if($Contador<=$Recall) //SI EL CONTADOR ES MENOR O IGUAL SE EJECUTA EL BLOQUE DE CODIGO
						{
						$Contador++; //INCREMENTO DEL CONTADOR
						$_SESSION['contador']=$Contador; //
						$id_last=$_SESSION['idlastcantidad']; //ASIGNANDO VALOR DEL ULTIMO ID DE LA TABLA CANTIDADMOTORES
						
						
						//DATOS DE EMBARCACION
						$Nombemb=$_POST['txt_nombreemb'];
						$Matricula=$_POST['txt_matricula'];
						$Rnp=$_POST['txt_rnp'];
						$Certificado=$_POST['txt_certificadoseg'];
						$Capacidad=$_POST['txt_capacidademb'];
						$Modelo=$_POST['txt_modeloemb'];
						$Marca=$_POST['txt_marcaemb'];
						$Vida=$_POST['txt_vidautilemb'];
						$Estado=$_POST['txt_estado'];
						$Npescadores=$_POST['txt_npescadoresemb'];
						$Eslora=$_POST['txt_eslora'];
						$Manga=$_POST['txt_manga'];
						$Puntal=$_POST['txt_puntal'];
						$Dim=$_POST['txt_dimension'];
						$Mob=$_POST['txt_mobilidad'];
						
						//CONSULTA DE EMBARCACION
						$query = mysql_query("INSERT INTO embarcacion (nombre,matricula,rnp,certificadoseguridad,capacidad,modelo,
								marca,vidautil,estado,npescadores,eslora,manga,puntal,dimension,mobilidad,id_cantidademb)
								VALUES ('$Nombemb','$Matricula','$Rnp','$Certificado','$Capacidad','$Modelo','$Marca','$Vida','$Estado',
								'$Npescadores','$Eslora','$Manga','$Puntal','$Dim','$Mob','$id_last')",$conexion);
						
						
						
						
						//OBTENIENDO EL ULTIMO ID DE EMBARCACION
						$last = "SELECT LAST_INSERT_ID() FROM embarcacion";
						$last_id = mysql_result( mysql_query( $last ), 0, 0 );
						$idembarcacion=$last_id;
					
						//DATOS DE MOTOR
						
						$Mmoto=$_POST['txt_marcamotor'];
						$Cmoto=$_POST['txt_cantidadmotor'];
						$Pmoto=$_POST['txt_potenciamotor'];
						$Modmoto=$_POST['txt_modelomotor'];
						$Tmoto=$_POST['txt_tiempomotor'];
						$Smoto=$_POST['txt_seriemotor'];
						$Bmoto=$_POST['txt_bordamotor'];
						$Combmoto=$_POST['txt_combustiblemotor'];
						$Vmoto=$_POST['txt_vidautilmotor'];
						$Docmoto=$_POST['txt_docmotor'];
						
					
						//CONSULTA DE MOTOR
						$query2 = mysql_query("INSERT INTO motor (marca,cantidad,potencia,modelo,tiempo,serie,
											  borda,tcombustible,vidautil,documento,id_embarcacion)
											  VALUES ('$Mmoto','$Cmoto','$Pmoto','$Modmoto','$Tmoto','$Smoto','$Bmoto','$Combmoto','$Vmoto',
											  '$Docmoto','$idembarcacion')",$conexion);
											  
							  
											  
						
						//OBTENIENDO EL ULTIMO ID DE EMBARCACION
						$last = "SELECT LAST_INSERT_ID() FROM embarcacion";
						$last_id = mysql_result( mysql_query( $last ), 0, 0 );
						$idemb=$last_id;
					
						
						//DATOS DE ARTES DE PESCA
						$TAarte=$_POST['txt_tarte'];
						$Material=$_POST['txt_material'];
						$Along=$_POST['txt_longitud'];
						$Aluz=$_POST['txt_luzmalla'];
						$Aalt=$_POST['txt_altura'];
						
						//CONSULTA DE ARTE DE PESCA
						$query3 = mysql_query("INSERT INTO artepesca (tarte,material,longitud,luzmalla,altura,id_embarcacion)
											  VALUES ('$TAarte','$Material','$Along','$Aluz','$Aalt','$idemb')",$conexion);
					
						
						//OBTENIENDO EL ULTIMO ID DE EMBARCACION
						$last = "SELECT LAST_INSERT_ID() FROM embarcacion";
						$last_id = mysql_result( mysql_query( $last ), 0, 0 );
						$idemb2=$last_id;
				
						
						//DATOS DE EQUIPOS DE OPERACIONES
						$Conserva=$_POST['txt_conserva'];
						$Scapacidad=$_POST['txt_sistemacapacidad'];
						$Eradio=$_POST['txt_equiporadio'];
						$Eseguridad=$_POST['txt_equiposeg'];
						$Emanejo=$_POST['txt_equipomanejo'];
						
						//CONSULTA DE EQUIPO DE OPERACIONES
						$query4 = mysql_query("INSERT INTO equipo(sisconserva,capacidad,radiocom,equiposeguridad,equipomanejo,id_embarcacion) 
											   VALUES('$Conserva','$Scapacidad','$Eradio','$Eseguridad','$Emanejo','$idemb2')",$conexion);
						
						
						
						//OBTENIENDO EL ULTIMO ID DE EMBARCACION
						$last = "SELECT LAST_INSERT_ID() FROM embarcacion";
						$last_id = mysql_result( mysql_query( $last ), 0, 0 );
						$idemb3=$last_id;
					
						
						
						//DATOS DE DATOS PRODUCTIVOS
						
						$Hpesca=$_POST['txt_horaspesca'];
						$Dpesca=$_POST['txt_diaspesca'];
						$Vpesca=$_POST['txt_volumenpesca'];
						$Mproduc=$_POST['txt_mesproductivo'];
						$Aproduc=$_POST['txt_anioproductivo'];
						$Eproduc=$_POST['txt_tespecie'];
						$Esproduc=$_POST['txt_especiep'];
						
						
						
						//CONSULTA DE DATOS PRODUCTIVOS
						
						$query5 = mysql_query("INSERT INTO datosproductivos(horas,dias,volumen,mes,anio,tespecie,especie,id_embarcacion)
											  VALUES('$Hpesca','$Dpesca','$Vpesca','$Mproduc','$Aproduc','$Eproduc','$Esproduc','$idemb3')",$conexion);
						
				
						
			
						
						
						
						
						//DATOS DE COSTOS DE OPERACION
						
						$Meso=$_POST['txt_meso'];
						$Ao=$_POST['txt_anioo'];
						$Oc=$_POST['txt_oc'];
						$Ol=$_POST['txt_ol'];
						$Om=$_POST['txt_om'];
						$Os=$_POST['txt_os'];
						$Opi=$_POST['txt_opi'];
						$Oa=$_POST['txt_oa'];
						$Ogp=$_POST['txt_ogp'];
						$Oat=$_POST['txt_oat'];
						$Oga=$_POST['txt_oga'];
						$Totalopera=$Oc+$Ol+$Om+$Os+$Opi+$Oa+$Ogp+$Oat+$Oga;
						
															
						//CONSULTA DE COSTOS DE OPERACION
						
							$query6 = mysql_query("INSERT INTO costosdeoperacion(mes,anio,combustible,lubricantes,mantenimiento,salarios,pereimp,
												  avi,gaspre,asistec,gastadm,costototal,id_embarcacion)
											      VALUES('$Meso','$Ao','$Oc','$Ol','$Om','$Os','$Opi','$Oa','$Ogp','$Oat','$Oga','$Totalopera','$idemb3')",$conexion);
						
					
						

						//SI EL CONTADOR ES MAYOR QUE LA CANTIDAD DE EMBARCACIONES INGRESADAS ESTE SE PASA A LA SIGUIENTE PÁG
							if($Contador>$Recall)
							{
							
							echo "Espere por favor redirigiendo a la pág. 3 .....";
							echo "<META HTTP-EQUIV='Refresh' CONTENT='1;url=http://localhost/sedafpa/pescadores/pescadores3.php'>";
							unset($_SESSION['contador']);
							unset($_SESSION['embarcacion']);
							unset($_SESSION['idlastcantidad']);
							
							}
							//SI NO PASA A LA SIGUIENTE EMBARCACION HACIENDO UN REFRESH A LA PAGINA
							else{
								echo "Pasando a la embarcacion No. ".($_SESSION['contador']);
								echo "<META HTTP-EQUIV='Refresh' CONTENT='1;url=http://localhost/sedafpa/pescadores/pescadores2.php'>";	
							}
							
					    }
				}
		}
	mysql_close($conexion); 
?>		
		</td>
	</tr>
  </table>
</body>
</html>