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
	  <h2 align="center" id="borderegistro">:: CONSULTA DE PESCADORES AFILIADOS A SEDAFPA :: </h2>
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
		
				//conexion a la base de datos
		include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
		$Consulta=$_GET['opc'];
		
		if(isset($_REQUEST['opcion'])){
		/* Realizamos la consulta SQL */
			if($Consulta!=null){
				$sql="select idpescadores,razonsocial,rfc,nombre,curp,localidad,municipio,region,distrito,tpescador from datospescador where nombre LIKE '%".$Consulta."%' or curp LIKE'%".$Consulta."%' or rfc LIKE'%".$Consulta."%' or razonsocial LIKE'%".$Consulta."%'";
				$result= mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($result)==0) die("No hay registros de la consulta ingresada");

				/* Desplegamos cada uno de los registros dentro de una tabla */  
		
				echo "<table align=center>";

				/*Primero los encabezados*/
				echo "
				<tr id=tablecon>
					<td> RAZONSOCIAL </td><td> RFC </td><td> NOMBRE </td><td> CURP </td><td> LOCALIDAD </td><td> MUNICIPIO </td><td> DISTRITO </td><td> REGION </td><td> TIPO DE PESCADOR </td><td>DATOS COMPLETOS</td>
				
				</tr>";

				/*Y ahora todos los registros */
		
			while($row=mysql_fetch_array($result))
			{
				echo "<tr id=tablecon2>
					<td> $row[razonsocial] </td>
					<td> $row[rfc] </td>
					<td> $row[nombre] </td>
					<td> $row[curp] </td>
					<td> $row[localidad] </td>
					<td> $row[municipio] </td>
					<td> $row[distrito] </td>
					<td> $row[region] </td>
					<td> $row[tpescador] </td>";
				echo '<td ><a href="../reportepescador/reportepescador.php?id='.$row['idpescadores'].'"><input name=datospescador type=Submit value=VER DATOS> </a></td>';
				echo "</tr>";
			}
		echo "</table>";
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