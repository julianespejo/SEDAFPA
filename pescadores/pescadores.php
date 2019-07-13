<?php
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
	header('Location: /sedafpa/ingresa.php');
	}
?>
<html>
<head>
<title>
:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA ::
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
	
		
	<script>
		function elejirDistrito(){
		
		var im= document.pesca.municipio.selectedIndex
		//var indice = document.pesca.distrito.selectedIndex //seleccionando el indice del distrito
		var indiceregion;
		var indicedistrito;
		var indice;
		
	
		if(im==0 || im==11 || im==34){
		
		indicedistrito = document.pesca.distrito.value="IXTLAN";
		
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=12;
		
		}	
		if(im==1 || im==9 || im==21)
		{
		indicedistrito = document.pesca.distrito.value="TUXTEPEC"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=4;
		}
		if(im==2 || im==23)
		{
		indicedistrito = document.pesca.distrito.value="CENTRO"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=19;
		}
		if(im==3)
		{
		indicedistrito = document.pesca.distrito.value="MIXE"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=30;
		}
		if(im==4 || im==22 || im==31 || im==37)
		{
		indicedistrito = document.pesca.distrito.value="HUAJUAPAN"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=1;
		}
		if(im==5 || im==15 || im==25 || im==29 || im==30 || im==38)
		{
		indicedistrito = document.pesca.distrito.value="JUCHITAN"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=29;
		}
		if(im==6)
		{
		indicedistrito = document.pesca.distrito.value="NOCHIXTLAN"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=10;
		}
		if(im==7)
		{
		indicedistrito = document.pesca.distrito.value="OCOTLAN"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=25;
		}
	
		if(im==10 || im==14)
		{
		indicedistrito = document.pesca.distrito.value="ZIMATLAN"
		//indicedistrito = document.pesca.distrito.disabled=true;
		indice=17;
		}
		if(im==12 || im==33)
		{
			indicedistrito = document.pesca.distrito.value="SILACAYOAPAN"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=0;
		}
		if(im==13){
			indicedistrito = document.pesca.distrito.value="POCHUTLA"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=27;
		
		}
		if(im==16 || im==36){
			indicedistrito = document.pesca.distrito.value="EJUTLA"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=24;
		
		
		}
		if(im==17){
			indicedistrito = document.pesca.distrito.value="JUXTLAHUACA"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=5;
		}
		if(im==18){
			indicedistrito = document.pesca.distrito.value="COIXTLAHUACA"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=2;
		}
		if(im==19 || im==24 || im==27){
			indicedistrito = document.pesca.distrito.value="CUICATLAN"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=7;
		}
		if(im==20){
			indicedistrito = document.pesca.distrito.value="PUTLA"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=8;
		}
		if(im==26 || im==39){
			indicedistrito = document.pesca.distrito.value="TLAXIACO"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=9;
		}
		if(im==28 || im==40 || im==41){
			indicedistrito = document.pesca.distrito.value="TEOTITLAN DEL CAMINO"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=3;
		}
		if(im==32){
			indicedistrito = document.pesca.distrito.value="ETLA"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=11;
		}
		if(im==35){
			indicedistrito = document.pesca.distrito.value="TEHUANTEPEC"
			//indicedistrito = document.pesca.distrito.disabled=true;
			indice=28;
		}
			
				
				
				
			
			
				if(indice==0 || indice ==1 || indice==2 || indice==5 || indice==6 || indice==9 || indice==10)
				{
					indiceregion = document.pesca.region.value="MIXTECA"
					//indiceregion = document.pesca.region.disabled=true;
					
					
				}
				if(indice==3 || indice==7)
				{
					indiceregion = document.pesca.region.value="CAÑADA"
					//indiceregion = document.pesca.region.disabled=true;
				}
				if(indice==4 || indice==14){
					indiceregion = document.pesca.region.value="PAPALOAPAN"
					//indiceregion = document.pesca.region.disabled=true;
				}
				if(indice==8 || indice==16 || indice==23)
				{
					indiceregion = document.pesca.region.value="SIERRA SUR"
					//indiceregion = document.pesca.region.disabled=true;
				}
				if(indice==11 || indice==17 || indice==18 || indice==19 || indice==20 || indice==24 || indice==25)
				{
					indiceregion = document.pesca.region.value="VALLES CENTRALES"
					//indiceregion = document.pesca.region.disabled=true;
				}
				if(indice==12 || indice==13 || indice==30)
				{
					indiceregion = document.pesca.region.value="SIERRA NORTE"
					//indiceregion = document.pesca.region.disabled=true;
				
					
				}
				if(indice==15 || indice==22 || indice==27)
				{
					indiceregion = document.pesca.region.value="COSTA"
					//indiceregion = document.pesca.region.disabled=true;
				}
				if(indice==28 || indice==29)
				{
					indiceregion = document.pesca.region.value="ISTMO"
					//indiceregion = document.pesca.region.disabled=true;
				}
		
		
	}
	</script>
</head>
<body onLoad="elejirDistrito()"><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>
<form name="pesca" action="processpescadores.php" method=post onsubmit="return validacion()">
<table class="punteado" width="780" border=0 align="center">
    <tr><td colspan=2>
	<b><big>I. DATOS GENERALES</big></b>
	<p>
	<p>
	</td>
	</tr>
	
	<td colspan=2>
	    <div align="left" ><strong>1.-NOMBRE O RAZÓN SOCIAL:</strong></div>
    </td>
    <tr>
	  <td colspan=2><div align="left">
        <input name="txt_razon" type="text"  size="80" maxlength="150" >
      </div></tr>
    </td>
	<tr>
	<td colspan=2>
	    <div align="left" ><strong>2.-RFC:</strong></div>
    </td>
	</tr>
    <tr>
	  <td colspan=2><div align="left">
        <input name="txt_rfc" type="text"  size="13" maxlength="13" >
      </div></tr>
    </td>
	<tr>
	<td colspan=2>
	    <div align="left" ><strong>3.-NOMBRE:</strong></div>
    </td>
	</tr>
    <tr>
	  <td colspan=2><div align="left">
        <input name="txt_nombre" type="text"  size="50" maxlength="60" required/>
      </div>
	  </td>
	  </tr>
    
	<tr>
    <td colspan=2>
	    <div align="left" ><strong>4.- CURP.</strong></div>
    </td>
	</tr>
	   <tr>
	  <td colspan=2><div align="left">
        <input name="txt_curp" type="text"  size="18" maxlength="18" required/>
      </div></tr>
    </td>
	</tr>
    	<td width="40%">
		<div align="left" ><strong>5.- TELEFONO:</strong></div>
		<td width="50%">
		<div align="left" ><strong>6.- CORREO ELECTRONICO:</strong></div>
        </td>
	</td>
	</tr>
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_tel" type="text"  size="13" maxlength="13" required/>
      </div>
	  <td>
	  <div align="left">
        <input name="txt_correo" type="email"  placeholder="nombre@ejemplo.com" size="40" maxlength="40">
      </div>
	  </td>
    </td>
	</tr>
	<tr>
    	<td width="60%">
		<div align="left" ><strong>7.- DOMICILIO:</strong></div></td>
		<td width="20%">
		<div align="left" ><strong>8.- LOCALIDAD:</strong></div>
        </td>
	
	</tr>
	<tr>
	  <td>
	  <div align="left">
        <input name="txt_domicilio" type="text"  size="50" maxlength="50" required/>
      </div>
	  <td>
	  <div align="left">
        <input name="txt_localidad" type="text"  size="50" maxlength="50" required/>
      </div>
	  </td>
    </td>
	</tr>
  
  <tr>
    	<td width="60%">
		<div align="left" ><strong>7.- MUNICIPIO:</strong></div></td>
		<td width="20%">
		<div align="left" ><strong>8.- DISTRITO:</strong></div>
        </td>
	
	</tr>
	<tr>
	  <td>
	  <div align="left">

<?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datospescador municipio"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Distrito = mysql_query($sql, $conexion) or die(mysql_error()); 
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Distrito)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select id=municipio name=txt_municipio onChange=elejirDistrito()>\n"; 
			 for ($i=0; $i<sizeof($enums);$i++)
			 	{ 
				 $elem = strtr($enums[$i],"'"," "); 
				 echo "<option value='".trim($elem)."'>".$elem."</option>\n"; 
				 } 
				 
				 echo "</select>"; 
	 		} 
 		} 
 } 
mysql_close($conexion);
?>
      </div>
	  <td>
	  <div align="left">
<?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datospescador distrito"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Distrito = mysql_query($sql, $conexion) or die(mysql_error()); 
 while ($ligne = mysql_fetch_array($Distrito)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select id=distrito name=txt_distrito>\n"; 
			 for ($i=0; $i<sizeof($enums);$i++)
			 	{ 
				 $elem = strtr($enums[$i],"'"," "); 
				 echo "<option value='".trim($elem)."'>".$elem."</option>\n"; 
				 } 
				 
				 echo "</select>"; 
	 		} 
 		} 
 } 
 
  mysql_close($conexion);
 ?>
      </div>
	  </td>
    </td>
	</tr>
  
	<tr>
    	<td width="60%">
		<div align="left" ><strong>9.- REGION:</strong></div></td>
		<td width="20%">
		<div align="left" ><strong>10.- GRUPO SANGUÍNEO:</strong></div>
        </td>
	
	</tr>
	<tr>
	  <td>
	  <div align="left">
 <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datospescador region"; 
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
			 echo "<select id=region name=txt_region  >\n"; 
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
      </div>
	  <td>
	  <div align="left">
          <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datospescador gsanguineo"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Gsan = mysql_query($sql, $conexion) or die(mysql_error()); 

		
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Gsan)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select name=txt_gsanguineo  >\n"; 
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
      </div>
	  </td>
    </td>
	</tr>
	
    <tr>
    	
		<td width="60%">
		<div align="left" ><strong>11.- TIPO DE PESCADOR</strong></div>
			 
	  <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datospescador tpescador"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Tpesca = mysql_query($sql, $conexion) or die(mysql_error()); 

		
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Tpesca)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select name=txt_tpescador  >\n"; 
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
	</tr>
	<tr>
    	<td width="60%">
		<div align="left" ><strong>12.- NÚMERO DE PERMISO:</strong></div></td>
		<td width="20%">
		<div align="left" ><strong>13.- RNP U.E:</strong></div>
        </td>
	
	</tr>
	<tr>
	  <td>
	  <div align="left">
        <input name="txt_npermiso" type="text"  size="12" maxlength="12" >
      </div>
	  <td>
	  <div align="left">
        <input name="txt_rnpue" type="text"  size="11" maxlength="11" >
      </div>
	  </td>
    </td>
	</tr>
	
	<tr>
    	<td width="60%">
		<div align="left" ><strong>14.- VIGENCIA DEL PERMISO:</strong></div></td>
		<td width="20%">
		<div align="left" ><strong>15.- PESQUERÍA:</strong></div>
        </td>
	
	</tr>
	<tr>
	  <td>
	  <div align="left">
        <input name="txt_vigenciade" type="text"  id="fechade" size="10"  maxlength="10" required/> hasta <input name="txt_vigenciahasta" type="text"  size="10" id="fechahasta" maxlength="10" required/>
		 
      </div>
	
    
    
	  <td>
	  <div align="left">
        <input name="txt_pesqueria" type="text"  size="50" maxlength="50" required/>
      </div>
	  </td>
    </td>
	</tr>
	<tr>
    	<td width="60%">
		<div align="left" ><strong>16.- TIPO DE PERMISO:</strong></div></td>
		<tr><td>
	  <div align="left">
 <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datospescador tpermiso"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Tper = mysql_query($sql, $conexion) or die(mysql_error()); 

		
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Tper)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select name=txt_tpermiso >\n"; 
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
 <td>
</tr>
<tr>
<tr>
	  <td colspan=5 >
			<div align="center">
			<input name="pag1" type="Submit" value="PÁG 2""/>
			</div>
	  </td>
 </tr>

</table>
</form>
</body>
</html>