<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel;");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=producciondistrito.xls");
?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
$NombreBD = "acuacultura";
$Servidor = "localhost";
$Usuario = "root";
$Password ="toor";
$IdConexion = mysql_connect($Servidor, $Usuario, $Password);
mysql_select_db($NombreBD, $IdConexion);
$sql = "SELECT d.distrito as DISTRITO,sum(t.capturacosecha) as PRODUCCION
					  FROM datosacuicultor d,tecnicoeconomico t 
					  WHERE d.idacuicultor=t.id_acuicultor GROUP BY distrito ";
$result=mysql_query($sql,$IdConexion);

?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
<TD>DISTRITO</TD>
<TD>PRODUCCION</TD>
<TD>UNIDAD</TD>


</TR>
<?php
while($row = mysql_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["DISTRITO"],$row["PRODUCCION"],"TONELADAS");
}
mysql_free_result($result);
mysql_close($IdConexion); //Cierras la Conexión
?>
</table>
</body>
</html>