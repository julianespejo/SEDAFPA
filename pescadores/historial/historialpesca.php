<html>
<head>
<title>
:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA ::
</title>
<link href="/sedafpa/styles/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: HISTORIAL DE PRODUCCIÓN  :: </h2>
	</td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<form method="GET" action="<?=$_SERVER['PHP_SELFT'] ?>">
<table  width="780" border=0 align="center">
<tr>
	<td>
		<div align="center"> 
			<input name="opc" >
			<input name="opcion" type="Submit" value="CONSULTAR">
		</div>
	</td>

<tr>
</table>
</form>
<div align="center">
		<?php
		include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
		$Consulta=$_GET['opc'];
		
		if(isset($_REQUEST['opcion'])){
		/* Realizamos la consulta SQL */
			if($Consulta!=null){
				//$sql="select idpescadores,razonsocial,rfc,nombre,curp,localidad,municipio,region,distrito,tpescador from datospescador where nombre LIKE '%".$Consulta."%' or curp LIKE'%".$Consulta."%' or rfc LIKE'%".$Consulta."%' or razonsocial LIKE'%".$Consulta."%'";
				
				$sql="select p.nombre,p.curp,c.cantidad,e.nombre as nombemb,dp.horas,.dp.dias,dp.volumen,dp.mes,dp.anio,dp.tespecie,dp.especie,dp.id_embarcacion as nuevop from datospescador p,cantidadembarcacion c, embarcacion e, datosproductivos dp WHERE idpescadores = id_datospescador and idcantidademb = id_cantidademb and idembarcacion=id_embarcacion and p.nombre LIKE'%".$Consulta."%'";
				$result= mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($result)==0) die("No hay registros de la consulta ingresada");
				
				
				/* Desplegamos cada uno de los registros dentro de una tabla */  
			echo"<div >";
				echo "<table align=center border=0>";

				/*Primero los encabezados*/
				echo "
				<tr  id=tablecon>
					<td tablecon2>NOMBRE</td><td>CURP</td><td>CANT.EMB.</td><td>NOMB. EMB.</td><td>H. PESCA</td><td>D.PESCA</td><td>TON. AL MES</td><td>MES</td><td>AÑO</td><td>T.ESPECIE</td><td>ESPECIE</td><td>ACTUALIZAR</td>
				</tr>";

				/*Y ahora todos los registros */
		
			while($row=mysql_fetch_array($result))
			{	
				
				
				if($repetido==$row['nombre'] & $repetido2==$row['nuevop']){
					//$row['nombre']=null;
					//$row['curp']=null;
					//$row['cantidad']=null;
					

					echo "<tr id=tablecon2>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> $row[nombemb] </td>
					<td> $row[horas] </td>
					<td> $row[dias] </td>
					<td> $row[volumen] </td>
					<td> $row[mes] </td>
					<td> $row[anio] </td>
					<td> $row[tespecie] </td>
					<td> $row[especie] </td>
					<td></td>";
				
					echo "</tr>";
				}
				else{
				
					echo "<tr id=tablecon2>
					<td> $row[nombre] </td>
					<td> $row[curp] </td>
					<td> $row[cantidad] </td>
					<td> $row[nombemb] </td>
					<td> $row[horas] </td>
					<td> $row[dias] </td>
					<td> $row[volumen] </td>
					<td> $row[mes] </td>
					<td> $row[anio] </td>
					<td> $row[tespecie] </td>
					<td> $row[especie] </td>";
					
					
					echo '<td ><a href="agregardp.php?id='.$row['nuevop'].'"><input name=agregardp type=Submit value=AGREGAR> </a></td>';
					echo "</tr>";
					$repetido = $row['nombre'];
					$repetido2=$row['nuevop'];
					$repetido3=$row['cantidad'];
			
			}
				
			}
		echo "</table>";
		echo "</div>";
		echo "</div>";
		}
		else{
			echo "INGRESE UN VALOR PARA SU BUSQUEDA";
		}
		}
		else{
			echo "INGRESE UNA CONSULTA";
		}
		?>
</table>

<br><br><br><br><br><br>
<div align="center">
	<a href="../registros.php"><button name="regresar" type="Submit">REGRESAR AL MENU</button></a>
</div>

</body>
</html>