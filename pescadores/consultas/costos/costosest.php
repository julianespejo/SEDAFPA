<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="/sedafpa/styles/style.css" rel="stylesheet" type="text/css" media="screen">
  

<!-- termina la recepción de datos de produccionzona  -->
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: COSTO DE PRODUCCIÓN ESTATAL :: </h2>
	</td>
  </tr>
</table>
<br>
<form method="GET" action="<?=$_SERVER['PHP_SELFT'] ?>">
<table align="center">
	<tr>
	  <td>
	  <div align="left">
     
 AÑO:
 <?php 
		//Datos de conexion 
		$host = "localhost"; 
		$db = "pescadores"; 
		$usuario = "root"; 
		$password = "toor"; 
 
		//Conexion con la base de datos 
		$cn = mysql_pconnect($host, $usuario, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
 
		//Consulta que nos devuelve los valores posibles 
		//para un campo enum del campo Provpro en la tabla productos
		$sql = "DESCRIBE datosproductivos anio"; 
		mysql_select_db($db, $cn); 
		$Region = mysql_query($sql, $cn) or die(mysql_error()); 

		
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Region)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select name=anio>\n"; 
			 for ($i=0; $i<sizeof($enums);$i++)
			 	{ 
				 $elem = strtr($enums[$i],"'"," "); 
				 echo "<option value='".trim($elem)."'>".$elem."</option>\n"; 
				 } 
				 
				 echo "</select>"; 
	 		} 
 		} 
 } 
 //cerramos la conexion con la base de datos
  mysql_close($cn);
 ?>
      </div>
	  </td>
	
	  <td>
			<div align="center">
			<input name="productivo" type="Submit" value="BUSCAR">
			</div>
	  </td>
	</tr>
	
</table>
<br>
</form>
<div align="center">
<?php
	include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
	$Anio=$_GET['anio'];
	
	if(isset($_REQUEST['productivo'])){

	$query = mysql_query("select p.region,sum(co.costototal) as total from datospescador p,cantidadembarcacion c, embarcacion e,costosdeoperacion co WHERE idpescadores = id_datospescador and idcantidademb = id_cantidademb and idembarcacion=id_embarcacion and co.anio='".$Anio."' group by region",$conexion);
echo "<h1> AÑO: ".$Anio."</h1>";
echo "<br>";
echo "<table width='780' border='0' align='center'>
<tr>
	<th id='th'><h5>ESTADO</h5></th>
	<th id='th'><h5>COSTO ESTATAL</h5></th>
	

</tr>";

while($row = mysql_fetch_array($query))
{
			$suma;
			$suma=$suma+$row['total'];
  }
  echo "<tr bgcolor='#ffffff' >";
  echo "<td id='textoblue'><h5><center>OAXACA</center></h5></td>";
  echo "<td  id='textoblue'><h5><center>$ " . $suma . "</center></h5></td>";
  
  echo "</tr>";
echo "</table>";

}
else{
	echo "<h2>INGRESE EL MES Y EL AÑO</h2>";
	}

mysql_close($conexion);

?>
</div>
<br><br><br>
<div align="center">
	<a href="/sedafpa/pescadores/consultas.php"><button name="regresar" type="Submit">REGRESAR A CONSULTAS</button></a>
</div>
</body>
</html>