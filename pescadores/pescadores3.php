<?php
	session_start();
	if (isset($_SESSION['idlast'])) {
	
	}
	else{
		echo "<script>alert('No has registrado un pescador .. redirigiendote');</script>";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;url=http://localhost/sedafpa/pescadores/pescadores.php'>";
}
?>
<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">
<link href="../styles/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css"  >
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#fechade").datepicker();
        });
		$(document).ready(function() {
           $("#fechahasta").datepicker();
        });
    </script>
	


	
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>
<form action="pescadores3.php">
<table class="punteado" width="820" border="0px" align="center">
    
	 <tr>
		<td colspan=2>
			<b><big>VII. FUENTES DE APOYO</big></b>
			<p>
			<p>
		</td>
	</tr>
	<tr>
	 <td width="40%">
		<div align="left" ><strong>54.- NUMERO DE APOYOS RECIBIDOS:</strong></div>
		</td>
		
	</tr>
	<tr>
	 <td>
	  <div align="left">
        <input name="" title="" type="text"   size="5" maxlength="2" required/>
      </div>
	  </td>
	</tr>
	
	 <tr>  
	 <td width="50%">
		<div align="left" ><strong>53.- FUENTE  DE APOYO</strong></div>
		<?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE fuentesapoyo fuente"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Region = mysql_query($sql, $conexion) or die(mysql_error()); 

		
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
			 echo "<select name=txt_tarte>\n"; 
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
  mysql_close($conexion);
 ?>
        </td>
	<tr>
		<td width="50%">
		<div align="left" ><strong>55.- PROGRAMA:</strong></div>
        </td>
	</tr>
    <tr>
	 
	  <td>
	  <div align="left">
        <input name="" title="" type="text"   size="40" maxlength="60" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>56.- VIGENCIA DEL APOYO:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>57.- IMPORTE TOTAL DE APOYO:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_vigenciade" type="text"  id="fechade" size="10" readonly="readonly" maxlength="10" required/> hasta <input name="txt_vigenciahasta" type="text"  size="10" id="fechahasta" maxlength="10" required/>
		 
      </div>
	  </td>
	  <td>
	  <div align="left">
        $<input name="" title="" type="text"   size="15" maxlength="12" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>58.- SUBCIDIOS (!):</strong></div>
		<div align="left">Si<input type="radio" value="1" name="sub">No<input type="radio" value="0" name="sub"></div>
		</td>

	
	<tr>
	  <td colspan=5 >
			<div align="center">
			<input name="pag3" type="Submit" value="REGISTRAR PESCADOR" />
			</div>
	  </td>
    </tr>
  </table>
  </form>
</body>
</html>