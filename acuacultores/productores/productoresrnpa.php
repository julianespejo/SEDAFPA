<?php

include $_SERVER['DOCUMENT_ROOT']."/sedafpa/acuacultores/conexacuicultor.php";

$query = mysql_query("SELECT sum(rnpa),COUNT(*) FROM datosacuicultor where rnpa is not null  ",$conexion);
$query2 = mysql_query("SELECT sum(rnpa),COUNT(*) FROM datosacuicultor where rnpa is null  ",$conexion);

$rows = array();
//flag is not needed
//$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'RNPA', 'type' => 'string'),
    array('label' => 'No Acuicultores', 'type' => 'number'),
	 
	

);
$cols = array();
while($r = mysql_fetch_array($query)) {
   
   $temp = array();
    // the following line will be used to slice the Pie chart
    //$temp[] = array('v' => (string) $r["region"]); 
	$temp[] = array('v' => "CON RNPA"); 
	$cols[] = array('c' => $temp);
    // Values of each slice
    $temp[] = array('v' => (int) $r["COUNT(*)"]); 
    $rows[] = array('c' => $temp);
   
}

while($r = mysql_fetch_array($query2)) {
   
   $temp = array();
    // the following line will be used to slice the Pie chart
    //$temp[] = array('v' => (string) $r["region"]); 
	$temp[] = array('v' => "SIN RNPA"); 
	$cols[] = array('c' => $temp);
    // Values of each slice
    $temp[] = array('v' => (int) $r["COUNT(*)"]); 
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
           title: "PRODUCTORES CON Y SIN RNPA",
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
 <div align="center"><h2 >PRODUCTORES CON RNPA EN EL ESTADO<h5></div>
<br>
<br>



<?php
include $_SERVER['DOCUMENT_ROOT']."/sedafpa/acuacultores/conexacuicultor.php";
$query = mysql_query("SELECT d.rnpa,COUNT(*) FROM datosacuicultor d GROUP BY rnpa",$conexion);
$query2 = mysql_query("SELECT sum(rnpa),COUNT(*) FROM datosacuicultor where rnpa is not null",$conexion);
echo "<table width='780' border='0' align='center'>
<tr>
	<th id='th'><h5>PRODUCTORES</h5></th>
	<th id='th'><h5>N° ACUACULTORES</h5></th>

</tr>";

while($row = mysql_fetch_array($query))
{
  if ($row['rnpa']==NULL){
  
  echo "<tr bgcolor='#ffffff' >";
  echo "<td id='textoblue'><h5><center>SIN RNPA</center></h5></td>";
  echo "<td  id='textoblue'><h5><center>" . $row['COUNT(*)'] . "</center></h5></td>";  
  echo "</tr>";
  }
  
}
while ($row = mysql_fetch_array($query2)){
  echo "<tr bgcolor='#ffffff' >";
  echo "<td id='textoblue'><h5><center>RNPA</center></h5></td>";
  echo "<td  id='textoblue'><h5><center>" . $row['COUNT(*)'] . "</center></h5></td>";  
  echo "</tr>";

}  
  
echo "</table>";

mysql_close($conexion);

?>

<div id="chart_div" align="center"></div>
<div align="center">
	<a href="/sedafpa/acuacultores/accion.php"><button name="regresar" type="Submit">REGRESAR A CONSULTAS</button></a>
</div>
</body>
</html>