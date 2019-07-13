<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="/sedafpa/styles/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: POBLACIÓN ESTATAL :: </h2>
	</td>
  </tr>
</table>
<br>
<div align="center">
<?php
	include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
	$query = mysql_query("select region,count(region) as cantidad from datospescador group by region ASC",$conexion);
    
	echo "<table width='780' border='0' align='center'>
	<tr>
		<th id='th'><h5>ESTADO</h5></th>
		<th id='th'><h5>POBLACIÓN PESQUERA</h5></th>
	</tr>";

		while($row = mysql_fetch_array($query))
		{
			$suma;
			$suma=$suma+$row['cantidad'];
			
		}
			echo "<tr bgcolor='#ffffff' >";
			echo "<td id='textoblue'><h5><center> OAXACA </center></h5></td>";
			echo "<td  id='textoblue'><h5><center>" . $suma . "</center></h5></td>";  
			echo "</tr>";
		echo "</table>";

	
mysql_close($conexion);

?>
</div>
<br>
<div id="chart_div" align="center"></div>
<br><br><br>
<div align="center">
	<a href="/sedafpa/pescadores/consultas.php"><button name="regresar" type="Submit">REGRESAR A CONSULTAS</button></a>
</div>
</div>
</body>
</html>