<?php
	session_start();
	if(isset($_SESSION['contador']) && isset($_SESSION['embarcacion'])){
	}
	else{
		echo "<script>alert('No has registrado la cantidad de la embarcacion .. redirigiendote');</script>";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;url=http://localhost/sedafpa/pescadores/cantidademb.php'>";
	}
?>
<html>
<head>
<title >
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("sistemaconservacion");
        check = document.getElementById("sistemaconserva");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
	  function showContent2() {
        element = document.getElementById("sistemaequipo");
        check = document.getElementById("sistemacomunicacion");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script>
function validarNro(e) {
var key;
if(window.event) // IE
	{
	key = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	key = e.which;
	}

if (key >31 && key < 48 || key > 57)
    {
	
	return false;/*
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else 
        { return false; }*/
    }
return true;
}
</script>
<script>

function mostrarespecie(){

	var tespecie = document.pescadores2.tespecie.selectedIndex;
	
	
	if(tespecie==0){	
		var opciones = "<option value='GUACHINANGO'>GUACHINANGO</option><option value='COCINERO'>COCINERO</option><option value='CABRILLA'>CABRILLA</option><option value='CORVINA'>CORVINA</option><option value='ESMEDREGAL'>ESMEDREGAL</option><option value='JUREL'>JUREL</option><option value='LENGUADO'>LENGUADO</option><option value='LISA'>LISA</option><option value='MERO'>MERO</option><option value='MOJARRA'>MOJARRA</option><option value='PAMPANO'>PAMPANO</option><option value='PARGO'>PARGO</option><option value='PETO'>PETO</option><option value='ROBALO'>ROBALO</option><option value='RONCO'>RONCO</option><option value='RUBIA'>RUBIA</option><option value='RUBIO'>RUBIO</option><option value='SIERRA'>SIERRA</option><option value='OTROS'>OTROS</option>";
		document.getElementById("especie").innerHTML = opciones;

	}
	if(tespecie==1)
	{
		document.getElementById("especie").innerHTML="";
		var opciones1 ="<option value='MOJARRA'>MOJARRA</option><option value='BAGRE'>BAGRE</option><option value='LOBINA'>LOBINA</option><option value='TRUCHA'>TRUCHA</option><option value='CARPA'>CARPA</option><option value='CHARAL'>CHARAL</option><option value='OTROS'>OTROS</option>";
		document.getElementById("especie").innerHTML = opciones1;
	}
	if(tespecie==2)
	{
		document.getElementById("especie").innerHTML="";
		var opciones2 ="<option value='CAZÓN'>CAZÓN</option><option value='RAYAS'>RAYAS</option><option value='TIBURONES'>TIBURONES</option>";
		document.getElementById("especie").innerHTML = opciones2;
	}
	if(tespecie==3)
	{
		document.getElementById("especie").innerHTML="";
	}
	if(tespecie==4)
	{
		document.getElementById("especie").innerHTML="";
		var opciones3 = "<option value='ATÚN'>ATÚN</option><option value='BARRILETE'>BARRILETE</option><option value='BONITO'>BONITO</option><option value='OTROS'>OTROS</option>";
		document.getElementById("especie").innerHTML = opciones3;
	}
	if(tespecie==5){
		document.getElementById("especie").innerHTML="";
	}
	if(tespecie==6){
		document.getElementById("especie").innerHTML="";
		
	}
	if(tespecie==7){
		document.getElementById("especie").innerHTML="";
	
	}
	if(tespecie==8){
		document.getElementById("especie").innerHTML="";
	
	}
	if(tespecie==8){
		document.getElementById("especie").innerHTML="";
	
	}
		
}
</script>
<script>
	function sumar(){
	
	var total = 0.00;
	
	
		
	var v1 = document.getElementById("comb").value;
	var v2 = document.getElementById("lub").value;
	var v3 = document.getElementById("mant").value;
	var v4 = document.getElementById("sal").value;
	var v5 = document.getElementById("pi").value;
	var v6 = document.getElementById("avi").value;
	var v7 = document.getElementById("ogp").value;
	var v8 = document.getElementById("at").value;
	var v9 = document.getElementById("ga").value;
	if(v1==''){
		v1=0.00;
	}
	if(v2==''){
		v2=0.00;
	}
	if(v3==''){
		v3=0.00;
	}
	if(v4==''){
		v4=0.00;
	}
	if(v5==''){
		v5=0.00;
	}
	if(v6==''){
		v6=0.00;
	}
	if(v7==''){
		v7=0.00;
	}
	if(v8==''){
		v8=0.00;
	}
	if(v9==''){
		v9=0.00;
	}
	total = (parseFloat(v1) + parseFloat(v2) + parseFloat(v3) + parseFloat(v4) + parseFloat(v5) + parseFloat(v6) + parseFloat(v7) + parseFloat(v8) + parseFloat(v9)).toFixed(2) ;
	var display = document.getElementById("totalcostos");
	display.innerHTML = total;
	
	}
</script>

</head>
<body onLoad="mostrarespecie()" ><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>

<form name="pescadores2" action="processpescadores.php" method=post>
<table width="820" border="0px" align="center" >
    
	 <tr>
		<td colspan=2>
			<b><big>II. EMBARCACIÓN <?php 
			if(isset($_SESSION['contador'])){
				echo "No. ".($_SESSION['contador']);
				echo " ";
				echo "De: ".($_SESSION['embarcacion']);
			
			}
			?>
			</big></b>
			<p>
			<p>
		</td>
	</tr>
	
	
    	<td width="40%">
		<div align="left" ><strong>16.- NOMBRE DE LA EMBARCACION:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>16.- MATRICULA:</strong></div>
        </td>
	</tr>
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_nombreemb" title="" type="text"  size="50" maxlength="50" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_matricula" title="" type="text"  size="12" maxlength="12" required/>
      </div>
	  </td>
	</tr>
   <tr>
    	<td width="40%">
		<div align="left" ><strong>17.- RNP:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>18.- CERTIFICADO DE SEGURIDAD MARÍTIMA:</strong></div>
        </td>
	</tr>
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_rnp" title="" type="text"  size="8" maxlength="8" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_certificadoseg" title="" type="text"  size="9" maxlength="9" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>19.-CAPACIDAD DE LA EMBARCACIÓN:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>20.-MODELO DE LA EMBARCACIÓN:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_capacidademb" title="" type="text" placeholder="Tonelaje Neto" size="50" maxlength="50" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_modeloemb" title="" type="text"  size="50" maxlength="50" required/>
      </div>
	  </td>
	</tr>
	<td width="40%">
		<div align="left" ><strong>21.- MARCA DE LA EMBARCACIÓN:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>22.- VIDA ÚTIL DE LA EMBARCACIÓN:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_marcaemb" title="" type="text"  size="50" maxlength="50" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_vidautilemb" title="" type="text" placeholder="Años" size="4" maxlength="2" onkeypress="javascript:return validarNro(event)"required/>
      </div>
	  </td>
	</tr>
	<td width="40%">
		<div align="left" ><strong>23.- ESTADO EN QUE SE ENCUENTRA:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>24.- NÚMERO DE PESCADORES DE LA EMBARCACIÓN:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
 <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE embarcacion estado"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Dim = mysql_query($sql, $conexion) or die(mysql_error()); 

		
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Dim)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select name=txt_estado  >\n"; 
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
	  <td>
	  <div align="left">
        <input name="txt_npescadoresemb" title="" type="text"  size="5" maxlength="2" onkeypress="javascript:return validarNro(event)"required/>
      </div>
	  </td>
	</tr>
	<td width="40%">
		<div align="left" ><strong>21.-ESLORA (metros):</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>22.-MANGA (metros):</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_eslora" title="" type="text"  size="5" maxlength="5" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_manga" title="" type="text"  size="5" maxlength="5" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>23.-PUNTAL (metros):</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>24.- DIMENCIÓN DE LA EMBARCACIÓN</strong></div>
		
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_puntal" title="" type="text"  size="5" maxlength="5" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
       <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE embarcacion dimension"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Dim = mysql_query($sql, $conexion) or die(mysql_error()); 

		
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Dim)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select name=txt_dimension  >\n"; 
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
	 
	</tr>
	<tr>
	<td colspan=2>
	    <div align="left" ><strong>25.-MOBILIDAD DE LA EMBARCACIÓN:</strong></div>
    </td>
	</tr>
    <tr>
	  <td colspan=2>
	  <div align="left">
        <input name="txt_mobilidad" title="" type="text"  size="100" maxlength="100"  required/>
	   </div>
	  </td>
	</tr>

	<tr>
		<td colspan=2>
			<b><big>III. MOTOR</big></b>
			<p>
			<p>
		</td>
	</tr>
	<tr>
		<td width="50%">
		<div align="left" ><strong>27.- MARCA DEL MOTOR: </strong></div>
        </td>
	</tr>
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_marcamotor" title="" type="text"  size="40" maxlength="60" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>28.- CANTIDAD DE MOTORES:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>29.- POTENCIA:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_cantidadmotor" title="" type="text"  size="5" maxlength="2" onkeypress="javascript:return validarNro(event)"required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_potenciamotor" title="" type="text"  size="40" maxlength="60" required/>
      </div>
	  </td>
	</tr>
	<td width="40%">
		<div align="left" ><strong>30.- MODELO:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>31.- TIEMPO:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_modelomotor" title="" type="text"  size="30" maxlength="30" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
         <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE motor tiempo"; 
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
			 echo "<select name=txt_tiempomotor  >\n"; 
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
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>32.- NÚMERO DE SERIE:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>33.- FUERA DE BORDA:</strong></div>
	
        </td>

    <tr>
	  <td>
	  <div align="left">
        <input name="txt_seriemotor" title="" type="text"  size="30" maxlength="30" required/>
      </div>
	  </td>
	   <td>
	  <div align="left">
<?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE motor borda"; 
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
			 echo "<select name=txt_bordamotor  >\n"; 
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
      </tr>
  
		<td width="50%">
		<div align="left" ><strong>35.- TIPO DE COMBUSTIBLE:</strong></div>
        </td>
	
    <tr>
	  
	  <td>
	  <div align="left">
        <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE motor tcombustible"; 
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
			 echo "<select name=txt_combustiblemotor  >\n"; 
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
	</tr>
	  
	  <td width="40%">
		<div align="left" ><strong>36.- VIDA ÚTIL (AÑOS):</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>37.- DOCUMENTO QUE ACREDITE LA LEGAL PRODIEDAD DE LA EMBARCACIÓN Y EL MOTOR :</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_vidautilmotor" title="" type="text"  size="5"  maxlength="2" onkeypress="javascript:return validarNro(event)" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_docmotor" title="" type="text"  size="60" maxlength="30" required/>
      </div>
	  </td>
	</tr>
		
		<tr>
		<td colspan=2>
			<b><big>IV. ARTES DE PESCA</big></b>
			<p>
			<p>
		</td>
	</tr>
	   
   <td width="40%">
		<div align="left" ><strong>38.- TIPO DE ARTES DE PESCA:</strong></div>

		</td>
		<td width="50%">
		<div align="left" ><strong>39.- MATERIAL:</strong></div>
        </td>
	
    <tr>
	<td>
  <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE artepesca tarte"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Region = mysql_query($sql, $conexion) or die(mysql_error()); 
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
  mysql_close($conexion);
 ?>
	</td>
		
	  <td>
	  <div align="left">
        <input name="txt_material" title="" type="text"  size="25" maxlength="25" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>40.- LONGITUD:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>41.- LUZ DE MALLA:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_longitud" title="" type="text"  size="5" placeholder="metros" maxlength="5" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_luzmalla" title="" type="text"  size="5" placeholder="mm" maxlength="5" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>42.- ALTURA:</strong></div>
		</td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_altura" title="" type="text"  size="5" placeholder="metros" maxlength="5" required/>
      </div>
	  </td>
	</tr>
		
	<tr>
		<td colspan=2>
			<b><big>V. EQUIPO DE OPERACIONES</big></b>
			<p>
			<p>
		</td>
	</tr>
	<tr>
		<td width="50%">
			<div align="left" ><strong>45.- SISTEMA DE CONSERVACIÓN</strong></div>
        </td>
		<td width="50%">
			<div align="left" ><strong>46.- EQUIPO DE RADIOCOMUNICACIÓN</strong></div>
        </td>
	</tr>
	
	<tr>
		<td>
			<input type="checkbox" value="1" id="sistemaconserva" onclick="showContent()" >
			<div align="left" style="display:none;" id="sistemaconservacion">
				ESPECIFIQUE: <input  name="txt_conserva" placeholder="NOMBRE" type="text"  size="15" maxlength="30" >
				CAPACIDAD: <input  name="txt_sistemacapacidad" placeholder="KG" type="text"  size="5" maxlength="25" >
			</div>
		</td>
		<td>
		<input type="checkbox" value="1" id="sistemacomunicacion" onclick="showContent2()" >
			<div align="left" style="display:none;" id="sistemaequipo">
				ESPECIFIQUE:<input name="txt_equiporadio" placeholder="NOMBRE" type="text"  size="25" maxlength="30" >
			</div>
		</td>
	</tr>
	
	<tr>
		<td width="40%">
		<div align="left" ><strong>47.- EQUIPO DE SEGURIDAD:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>48.- EQUIPO DE MANEJO:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_equiposeg" title="" type="text"   size="50" maxlength="50" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_equipomanejo" title="" type="text"   size="40" maxlength="150" required/>
      </div>
	  </td>
	</tr>
	
	<tr>
		<td colspan=2>
			<b><big>VI. DATOS PRODUCTIVOS</big></b>
			<p>
			<p>
		</td>
	</tr>
	   
	<td width="40%">
		<div align="left" ><strong>49.- HORAS DE PESCA:</strong></div>
		</td>
		<td width="50%">
		<div align="left" ><strong>50.- DIAS DE PESCA:</strong></div>
        </td>
	
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_horaspesca" title="" type="text"   size="5" maxlength="2" onkeypress="javascript:return validarNro(event)" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_diaspesca" title="" type="text"   size="5" maxlength="2" onkeypress="javascript:return validarNro(event)" required/>
      </div>
	  </td>
	</tr>
	
	<td width="40%">
		<div align="left" ><strong>51.- VOLUMEN DE PESCA TOTAL :</strong></div>
		</td>
		
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_volumenpesca" title="" type="text"   size="8" placeholder="toneladas" maxlength="5" required/>
		MES:   <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datosproductivos mes"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Region = mysql_query($sql, $conexion) or die(mysql_error()); 

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
			 echo "<select name=txt_mesproductivo>\n"; 
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
 AÑO:
 <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datosproductivos anio"; 
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
			 echo "<select name=txt_anioproductivo>\n"; 
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

	</tr>

	<tr>
		<td width="50%">
			<div align="left" ><strong>52.-TIPO ESPECIE :</strong></div>
        </td>
		<td>
			<div align="left" ><strong>53.-ESPECIE :</strong></div>
		</td>
	
	</tr>
	<tr>
		<td>
		  <div align="left">
         <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE datosproductivos tespecie"; 
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
							echo "<select id=tespecie name=txt_tespecie onChange=mostrarespecie()>\n"; 
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
	<td>
		 <div align="left">
        <select id="especie" name="txt_especiep">
			<option value=""></option>
		</select>
      </div>
	</td>
</tr>
	
	
	<tr>
		<td colspan=2>
			<b><big>VIII. COSTOS DE OPERACIÓN</big></b>
			<p>
			<p>
		</td>
	</tr>	
	<tr>
		<td width="20%">
			<div align="left">MES: 
<?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE costosdeoperacion mes"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Region = mysql_query($sql, $conexion) or die(mysql_error()); 
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
			 echo "<select name=txt_meso>\n"; 
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
	
AÑO:   <?php 
		include 'conexpescadores.php';
		$sql = "DESCRIBE costosdeoperacion anio"; 
		mysql_select_db($dbseleccionada, $conexion); 
		$Region = mysql_query($sql, $conexion) or die(mysql_error()); 

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
			 echo "<select name=txt_anioo>\n"; 
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
			</div><br>
		</td>
	</tr>
	
	<tr>
	<td width="40%">
		<div align="left" ><strong>59.- COMBUSTIBLE:</strong></div>
		</td>
		<td>
	  <div align="left">
        $<input id="comb" name="txt_oc" title="" type="text"   size="20" maxlength="20"  onkeyup=" sumar()" required/>
      </div>
	  </td>
		
		</tr>
		<tr>
	  <td width="50%">
		<div align="left" ><strong>60.- LUBRICANTES:</strong></div>
        </td>
	  <td>
	  <div align="left">
        $<input id="lub" name="txt_ol" title="" type="text"   size="20" maxlength="20" onkeyup=" sumar()"required/>
      </div>
	  </td>
	</tr>
	<tr>
	<td width="40%">
		<div align="left" ><strong>61.- MANTENIMIENTO:</strong></div>
		</td>
		 <td>
	  <div align="left">
        $<input id="mant"name="txt_om" title="" type="text"   size="20" maxlength="20"  onkeyup=" sumar()" required/>
      </div>
	  </td>
		
		</tr>
		<tr>
	 <td width="50%">
		<div align="left" ><strong>62.- SALARIOS:</strong></div>
        </td>
	  <td>
	  <div align="left">
        $<input id="sal" name="txt_os" title="" type="text"   size="20" maxlength="20"onkeyup=" sumar()" required/>
      </div>
	  </td>
	</tr>
	<tr>
	<td width="40%">
		<div align="left" ><strong>63.- PERMISOS E IMPUESTOS:</strong></div>
		</td>
		  <td>
	  <div align="left">
        $<input id="pi" name="txt_opi" title="" type="text"   size="20" maxlength="20" onkeyup=" sumar()" required/>
      </div>
	  </td>
		
		</tr>
		<tr>
	<td width="50%">
		<div align="left" ><strong>64.- AVITUALLAMIENTO:</strong></div>
        </td>
	  <td>
	  <div align="left">
        $<input id="avi" name="txt_oa" title="" type="text"   size="20" maxlength="20" onkeyup=" sumar()" required/>
      </div>
	  </td>
	</tr>
	
	<tr>
	<td width="40%">
		<div align="left" ><strong>65.- GASTOS PREOPERATIVOS:</strong></div>
		</td>
		  <td>
	  <div align="left">
        $<input id="ogp" name="txt_ogp" title="" type="text"   size="20" maxlength="20" onkeyup=" sumar()" required/>
      </div>
	  </td>
		
		</tr>
		
		<tr>
	<td width="50%">
		<div align="left" ><strong>66.- ASISTENCIA TÉCNICA:</strong></div>
        </td>
	  <td>
	  <div align="left">
       $<input id="at" name="txt_oat" title="" type="text"   size="20" maxlength="20" onkeyup=" sumar()" required/>
      </div>
	  </td>
	</tr>
	
	<tr>
	<td width="40%">
		<div align="left" ><strong>67.- GASTOS ADMINISTRATIVOS:</strong></div>
		</td>
		 <td>
	  <div align="left">
        $<input id="ga" name="txt_oga" title="" type="text"   size="20" maxlength="20" onkeyup=" sumar()" required/>
      </div>
	  </td>
	</tr>
	<tr>
	</tr>
	<tr>
	<td>
	<div align="right">
        TOTAL: <span id="totalcostos" name="otol"></span>
      </div>
	</td>
	</tr>	
	<tr>
	  <td colspan=5 >
			<div align="center">
			<input name="pag2" type="Submit" value="<?php 
			if(isset($_SESSION['contador'])){
				$Conta=$_SESSION['contador'];
				$Embarcacion=$_SESSION['embarcacion'];
					if($Conta==$Embarcacion){
						echo "PÁG 3";
					}
					else{
						echo "ir a la embarcacion No. ".($Conta+1);
					}
			}
			?> "/>
			</div>
	  </td>
    </tr>
  </table>
  </form>
</body>
</html>