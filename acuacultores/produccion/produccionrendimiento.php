<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">

</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>



		<?php
			//conexion a la base de datos
		@$conexion=mysql_connect("localhost", "root", "toor") 
		or exit("No se pudo establecer una conexión");
		@$dbseleccionada=mysql_select_db("acuacultura", $conexion)
		or exit("No se pudo seleccionar la base de datos");
	
		$query = mysql_query("",$conexion);

		echo "<table width='780' border='1' align='center'>
		<tr>
			<th ><h5>RENDIMI</h5></th>
	
	

		</tr>";

		while($row = mysql_fetch_array($query))
		{
			echo "<tr bgcolor='#ffffff' >";
			echo "<td ><h5><center>" . $row['region'] . "</center></h5></td>";
			echo "<td  id='textoblue'><h5><center>" . $row['COUNT (*)'] . "</center></h5></td>";
   			echo "</tr>";
		}
		
		echo "</table>";

		mysql_close($conexion);
		?>
</body>
</html>