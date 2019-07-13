<?php
include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
$query = mysql_query("select region,count(region) as cantidad from datospescador group by region ASC",$conexion);



$rows = array();
//flag is not needed
//$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'REGION', 'type' => 'string'),
    array('label' => 'POBLACIÓN', 'type' => 'number'),
	//array('label' => 'KG', 'type' => 'string')

);
$cols = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r["region"]); 
	$cols[] = array('c' => $temp);
    // Values of each slice
    $temp[] = array('v' => (int) $r["cantidad"]); 
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
    
      <script type="text/javascript">

    // Load the Visualization API and the piechart package.
      google.load("visualization", "1", {packages:["corechart"]});


    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
	  
	  
      var options = {
           title: "POBLACIÓN POR REGIÓN",
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
	  <h2 align="center" id="borderegistro">:: POBLACIÓN POR REGIÓN :: </h2>
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
		<th id='th'><h5>REGIÓN</h5></th>
		<th id='th'><h5>POBLACIÓN</h5></th>
	</tr>";

		while($row = mysql_fetch_array($query))
		{
			echo "<tr bgcolor='#ffffff' >";
			echo "<td id='textoblue'><h5><center>" . $row['region'] . "</center></h5></td>";
			echo "<td  id='textoblue'><h5><center>" . $row['cantidad'] . "</center></h5></td>";  
			echo "</tr>";
		}
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