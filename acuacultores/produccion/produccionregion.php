<?php
include $_SERVER['DOCUMENT_ROOT']."/sedafpa/acuacultores/conexacuicultor.php";

$query = mysql_query("SELECT d.region,sum(t.capturacosecha) as capturacosecha 
					  FROM datosacuicultor d,tecnicoeconomico t 
					  WHERE d.idacuicultor=t.id_acuicultor GROUP BY region",$conexion);


$rows = array();
//flag is not needed
//$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'Distrito', 'type' => 'string'),
    array('label' => 'Cosecha', 'type' => 'number'),
	array('label' => 'KG', 'type' => 'string')

);
$cols = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r["region"]); 
	$cols[] = array('c' => $temp);
    // Values of each slice
    $temp[] = array('v' => (int) $r["capturacosecha"]); 
    $rows[] = array('c' => $temp);	
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
?>
<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="/sedafpa/styles/style.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
      <script type="text/javascript">

    // Load the Visualization API and the piechart package.
      google.load("visualization", "1", {packages:["corechart"]});


    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
	  
	  
      var options = {
           title: "PRODUCCION POR REGION (KILOGRAMOS)",
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
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<br>
<br>
 <div align="center"><h2 >PRODUCCIÓN POR REGIÓN</h2></div>
<br>
<br>


<?php
include $_SERVER['DOCUMENT_ROOT']."/sedafpa/acuacultores/conexacuicultor.php";
$query = mysql_query("SELECT d.region,sum(t.capturacosecha) as capturacosecha 
					  FROM datosacuicultor d,tecnicoeconomico t 
					  WHERE d.idacuicultor=t.id_acuicultor GROUP BY region",$conexion);

echo "<table width='780' border='0' align='center'>
<tr>
	<th id='th'><h5>REGIÓN</h5></th>
	<th id='th'><h5>PRODUCCION/AÑO</h5></th>
	<th id='th'><h5>UNIDAD</h5></th>

</tr>";

while($row = mysql_fetch_array($query))
{
echo "<tr bgcolor='#ffffff' >";
  echo "<td id='textoblue'><h5><center>" . $row['region'] . "</center></h5></td>";
  echo "<td  id='textoblue'><h5><center>" . $row['capturacosecha'] . "</center></h5></td>";
  echo "<td id='textoblue'><h5><center> TONELADAS</center></h5></td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($conexion);

?>

<div  align="center">
	<a href="../reportes/pdf/reporte_produccionregion.php"><img src="/sedafpa/img/50pdf.png" width="50" height="50" border="0"></a>
	<a href="../reportes/excel/reporte_produccionregionexcel.php"><img src="/sedafpa/img/50excel.png" width="50" height="50" border="0"></a>
</div><br>
<div id="chart_div" align="center"></div>
<div align="center">
	<a href="/sedafpa/acuacultores/accion.php"><button name="regresar" type="Submit">REGRESAR A CONSULTAS</button></a>
</div>
</body>
</html>