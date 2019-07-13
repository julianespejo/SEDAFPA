<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="/sedafpa/styles/style.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<br>
<br>
 <div align="center"><h2 >PRODUCTORES EN TOTAL EN EL ESTADO<h5></div>
<br>
<br>



<?php
include $_SERVER['DOCUMENT_ROOT']."/sedafpa/acuacultores/conexacuicultor.php";
$query = mysql_query("SELECT COUNT(*) FROM datosacuicultor ",$conexion);

echo "<table width='780' border='0' align='center'>
<tr>
	<th id='th'><h5>TOTAL EN EL ESTADO DE OAXACA</h5></th>
	<th id='th'><h5>N° ACUACULTORES</h5></th>

</tr>";

while($row = mysql_fetch_array($query))
{
echo "<tr bgcolor='#ffffff' >";
  echo "<td  id='textoblue'><h5><center> OAXACA </center></h5></td>";
  echo "<td  id='textoblue'><h5><center>" . $row['COUNT(*)'] . "</center></h5></td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($conexion);

?>
<div align="center">
	<a href="/sedafpa/acuacultores/accion.php"><button name="regresar" type="Submit">REGRESAR A CONSULTAS</button></a>
</div>
</body>
</html>