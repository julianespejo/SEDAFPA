<?php
include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
$Mes=$_GET['mes'];
$Anio=$_GET['anio'];
if(isset($_REQUEST['productivo'])){
$query = mysql_query("select p.municipio,dp.tespecie,dp.especie,sum(dp.volumen) as ton from datospescador p,cantidadembarcacion c, embarcacion e, datosproductivos dp WHERE idpescadores = id_datospescador and idcantidademb = id_cantidademb and idembarcacion=id_embarcacion and dp.mes='".$Mes."' and dp.anio='".$Anio."' GROUP BY tespecie ASC order by especie;",$conexion);



$rows = array();
//flag is not needed
//$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'MUNICIPIO', 'type' => 'string'),
 	array('label' => 'TONELADA', 'type' => 'number')

);
$cols = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r["municipio"]); 
	$cols[] = array('c' => $temp);
    // Values of each slice
    $temp[] = array('v' => (int) $r["ton"]); 
    $rows[] = array('c' => $temp);

}

$table['rows'] = $rows;


$jsonTable = json_encode($table);
}
?>
<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="/sedafpa/styles/style.css" rel="stylesheet" type="text/css" media="screen">
  
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
      <script type="text/javascript">

    // Load the Visualization API and the piechart package.
      google.load("visualization", "1", {packages:["corechart"]});


    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
	  
	  
      var options = {
           title: "PESQUERIA POR MUNICIPIO (TON.)",
          is3D: true,
		  width: 900,
          height: 700
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById("chart_div"));
      chart.draw(data, options);
    }
    </script>
	

<!-- recepción de datos de produccionzona  -->

<!-- termina la recepción de datos de produccionzona  -->
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: PESQUERIA POR MUNICIPIO :: </h2>
	</td>
  </tr>
</table>
<form method="GET" action="<?=$_SERVER['PHP_SELFT'] ?>">
<table align="center">
	<tr>
	  <td>
	  <div align="left">
        
		MES:   <?php 
		//Datos de conexion 
		$host = "localhost"; 
		$db = "pescadores"; 
		$usuario = "root"; 
		$password = "toor"; 
 
		//Conexion con la base de datos 
		$cn = mysql_pconnect($host, $usuario, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
 
		//Consulta que nos devuelve los valores posibles 
		//para un campo enum del campo Provpro en la tabla productos
		$sql = "DESCRIBE datosproductivos mes"; 
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
			 echo "<select name=mes>\n"; 
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
	$Mes=$_GET['mes'];
	$Anio=$_GET['anio'];
	
	if(isset($_REQUEST['productivo'])){
	$query = mysql_query("select p.municipio,dp.tespecie,dp.especie,sum(dp.volumen) as ton from datospescador p,cantidadembarcacion c, embarcacion e, datosproductivos dp WHERE idpescadores = id_datospescador and idcantidademb = id_cantidademb and idembarcacion=id_embarcacion and dp.mes='".$Mes."' and dp.anio='".$Anio."' GROUP BY tespecie ASC order by especie;",$conexion);
    echo "<h1>MES: ".$Mes." AÑO: ".$Anio."</h1>";
	echo "<table width='780' border='0' align='center'>
	<tr>
		<th id='th'><h5>MUNICIPIO</h5></th>
		<th id='th'><h5>TIPO DE ESPECIE</h5></th>
		<th id='th'><h5>ESPECIE</h5></th>
		<th id='th'><h5>TONELADAS</h5></th>
	</tr>";

		while($row = mysql_fetch_array($query))
		{
			echo "<tr bgcolor='#ffffff' >";
			echo "<td id='textoblue'><h5><center>" . $row['municipio'] . "</center></h5></td>";
			echo "<td id='textoblue'><h5><center>" . $row['tespecie'] . "</center></h5></td>";
			echo "<td id='textoblue'><h5><center>" . $row['especie'] . "</center></h5></td>";
			echo "<td  id='textoblue'><h5><center>" . $row['ton'] . "</center></h5></td>";  
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
	echo "<h2>INGRESE EL MES Y EL AÑO</h2>";
	}
	
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