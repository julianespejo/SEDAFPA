<?php
include $_SERVER['DOCUMENT_ROOT']."/sedafpa/acuacultores/conexacuicultor.php";
$query = mysql_query("SELECT d.distrito,d.idacuicultor,COUNT(*) as contador
					  FROM datosacuicultor d GROUP BY d.distrito",$conexion);

$rows = array();
//flag is not needed
//$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'Distrito', 'type' => 'string'),
    array('label' => 'No Acuicultores', 'type' => 'number')
	

);
$cols = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r["distrito"]); 
	$cols[] = array('c' => $temp);
    // Values of each slice
    $temp[] = array('v' => (int) $r["contador"]); 
    $rows[] = array('c' => $temp);
	
	
}

$table['rows'] = $rows;


$jsonTable = json_encode($table);
//$jsonTable2 = json_encode()

//echo $jsonTable;
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
           title: "PRODUCTORES POR DISTRITO",
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
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<br>
<br>
 <div align="center"><h2 >PRODUCTORES POR DISTRITO<h5></div>
<br>
<br>



<?php
			//conexion a la base de datos
		
$query = mysql_query("SELECT d.distrito,d.idacuicultor,COUNT(*) FROM datosacuicultor d GROUP BY d.distrito",$conexion);

echo "<table width='780' border='0' align='center'>
<tr>
	<th id='th' ><h5>DISTRITO</h5></th>
	<th id='th'><h5>N� ACUACULTORES</h5></th>

</tr>";

while($row = mysql_fetch_array($query))
{
echo "<tr bgcolor='#ffffff' >";
  echo "<td id='textoblue'><h5><center>" . $row['distrito'] . "</center></h5></td>";
  echo "<td  id='textoblue'><h5><center>" . $row['COUNT(*)'] . "</center></h5></td>";
  
  
  echo "</tr>";
  }
echo "</table>";

mysql_close($conexion);

?>
<div  align="center">
	<a href="../reportes/pdf/reporte_productoresdistrito.php"><img src="/sedafpa/img/50pdf.png" width="50" height="50" border="0"></a>
	<a href="../reportes/excel/reporte_productoresdistritoexcel.php"><img src="/sedafpa/img/50excel.png" width="50" height="50" border="0"></a>
</div><br>
<div id="chart_div" align="center"></div>
<div align="center">
	<a href="/sedafpa/acuacultores/accion.php"><button name="regresar" type="Submit">REGRESAR A CONSULTAS</button></a>
</div>
</body>
</html>