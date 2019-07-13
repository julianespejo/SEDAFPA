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
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">
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

if (key < 48 || key > 57)
    {
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else 
        { return false; }
    }
return true;
}
</script>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " √°√©√≠√≥√∫abcdefghijklmn√±opqrstuvwxyz";
       especiales = [8,9,37,39,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<script>
function mostrarcontra() {
	 var checado1 =  document.getElementById("ctt");
	 var contenedor1 = document.getElementById("ctt2");
	 var contenedor2 = document.getElementById("ctt3");
	
		if(checado1="SI"){
	    contenedor1.style.display = "block";
		contenedor2.style.display= "block";
        return true;
		}
		if(checado1="NO"){
		contenedor1.style.display = "none";
		contenedor2.style.display= "none";
		return true;
		}
		
	}
</script>
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border="0" align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>
<form method="post" action="process.php" >
<table  width="820" border="0px" align="center">
    <tr>
		<td colspan=2>
			<b><big>I. UBICACI”N FÕçSICA</big></b>
			<p>
			<p>
		</td>
	</tr>
	<td colspan=1>
	    <div align="left" ><strong>1.-NOMBRE Y/O RAZ”N SOCIAL:</strong></div>
    </td>
	<td>
	<div>
	<strong>RNPA </strong>
	</div>
	</td>
    <tr>
	  <td colspan=1><div align="left">
        <input name="txt_nombre" style="text-transform: uppercase;" title="POR FAVOR INGRESA UN NOMBRE O RAZ”N SOCIAL" type="text"  size="75" maxlength="100"  required/>
		</div>
	  </td>
	
	
	  <td colspan=1><div align="left">
        <input name="txt_rnpa" style="text-transform: uppercase;" type="text"  size="20" maxlength="20"  >
		</div>
	  </td>
	</tr>
	<td colspan=1>
	    <div align="left" ><strong>1.1-NOMBRE DE LA UNIDAD ACUICOLA:</strong></div>
    </td>
	<td>
	<div>
	<strong>CURP </strong>
	</div>
	</td>
    <tr>
	  <td colspan=1><div align="left">
        <input name="txt_unidada" style="text-transform: uppercase;"  type="text"  size="75" maxlength="100">
		</div>
	  </td>
	
	
	  <td colspan=1><div align="left">
        <input name="txt_curp" style="text-transform: uppercase;" type="text"  size="20" maxlength="18"  >
		</div>
	  </td>
	</tr>
	<tr>
    <td colspan=1>
	    <div align="left" ><strong>2.- DOMICILIO: (Calle, Numero, colonia).</strong></div>
    </td>
	<td>
	<div>
	<strong>RFC </strong>
	</div>
	</td>
	</tr>
	<tr>
	  <td colspan=1><div align="left">
        <input name="txt_domicilio" style="text-transform: uppercase;" title="POR FAVOR INGRESA UN DOMICILIO" type="text" size="75" maxlength="100"  required/>
      </div>
	  </td>
	<td colspan=1><div align="left">
        <input name="txt_rfc" style="text-transform: uppercase;" type="text"  size="20" maxlength="13"  >
		</div>
	  </td>
	</tr>
	<tr>
    	<td >
		<div align="left" ><strong>3.- PARAJE:</strong></div>
		</td>
		<td >
		<div align="left" ><strong>4.- LOCALIDAD:</strong></div>
        </td>
	</tr>
    <tr>
	  <td>
	  <div align="left">
        <input name="txt_paraje" style="text-transform: uppercase;" title="SE NECESITA UN PARAJE" type="text"  size="50" maxlength="30" onkeypress="return soloLetras(event)" required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_localidad" style="text-transform: uppercase;" title="SE NECESITA UNA LOCALIDAD" type="text"  size="40" maxlength="50" onkeypress="return soloLetras(event)" required/>
      </div>
	  </td>
	</tr>
	<tr>
    	<td width="60%">
		<div align="left" ><strong>5.- MUNICIPIO:</strong></div>
		</td>
		<td width="20%">
		<div align="left" ><strong>6.-REGI”N:</strong></div>
        </td>
	</tr>
	<tr>
	  <td>
	  <div align="left">
        <?php 
		//Datos de conexion 
		$host = "localhost"; 
		$db = "acuacultura"; 
		$usuario = "root"; 
		$password = "toor"; 
 
		//Conexion con la base de datos 
		$cn = mysql_pconnect($host, $usuario, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
 
		//Consulta que nos devuelve los valores posibles 
		//para un campo enum del campo Provpro en la tabla productos
		$sql = "DESCRIBE datosacuicultor municipio"; 
		mysql_select_db($db, $cn); 
		$Distrito = mysql_query($sql, $cn) or die(mysql_error()); 

		
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
			 echo "<select name=txt_municipio >\n"; 
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
	<div align="left">
	
	 
	  <?php 
		//Datos de conexion 
		$host = "localhost"; 
		$db = "acuacultura"; 
		$usuario = "root"; 
		$password = "toor"; 
 
		//Conexion con la base de datos 
		$cn = mysql_pconnect($host, $usuario, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
 
		//Consulta que nos devuelve los valores posibles 
		//para un campo enum del campo Provpro en la tabla productos
		$sql = "DESCRIBE datosacuicultor region"; 
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
			 echo "<select name=txt_region  >\n"; 
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
	  
	</tr>
    <tr>
    	<td width="40%">
		<div align="left" ><strong>7.- DISTRITO:</strong></div>
		</td>
		<td width="60%">
		<div align="left" ><strong>8.- CODIGO POSTAL:</strong></div>
        </td>
	</tr>
	<tr>
	  <td>
	  <div align="left">
	  
	  <?php 
		//Datos de conexion 
		$host = "localhost"; 
		$db = "acuacultura"; 
		$usuario = "root"; 
		$password = "toor"; 
 
		//Conexion con la base de datos 
		$cn = mysql_pconnect($host, $usuario, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
 
		//Consulta que nos devuelve los valores posibles 
		//para un campo enum del campo Provpro en la tabla productos
		$sql = "DESCRIBE datosacuicultor distrito"; 
		mysql_select_db($db, $cn); 
		$Distrito = mysql_query($sql, $cn) or die(mysql_error()); 

		
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
			 echo "<select name=txt_distrito >\n"; 
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
	  <div align="left">
        <input name="txt_cp"  type="text"  size="5" maxlength="5" onkeypress="javascript:return validarNro(event)" required/>
      </div>
	  </td>
	</tr>
	<tr>
    	<td width="40%">
		<div align="left" ><strong>9.- TELEFONO:</strong></div>
		</td>
		<td width="60%">
		<div align="left" ><strong>10.- CORREO ELECTR”NICO:</strong></div>
        </td>
	</tr>
	<tr>
	  <td>
	  <div align="left">
        <input name="txt_telefono" type="text" title="SE NECESITA UN TELEFONO" size="15" maxlength="13"  required/>
      </div>
	  </td>
	  <td>
	  <div align="left">
        <input name="txt_correo"  type="email" placeholder="name@example.com" size="40" maxlength="40" />
      </div>
	  </td>
	</tr>
	<tr>
		<td width="40%">
			<div align="left" ><strong>11.- INICIO DE OPERACIONES:</strong></div>
		</td>
	</tr>
	<tr>
	  <td>
	  <div align="left">
        <input name="txt_ioperaciones" type="month"  size="20" maxlength=""  required/>
      </div>
	  <p>
	  <p>
	  </td>
	</tr>
	<tr>
		<td colspan=2>
			<div align="left" ><strong>12.- TIPO DE TENENCIA DE LA TIERRA DE LA UNIDAD ACUICOLA.</strong>(Ejidal, comunal, propiedad privada, otra)
			</div>
			
		</td>
	</tr>
	
	
	<tr>
		<td colspan=2>
			<div>
			<input name="txt_tipoten" style="text-transform: uppercase;" type="text" size="125" maxlength="50" onkeypress="return soloLetras(event)" required/><p></strong>
			</div>
			
			<p>
		</td>
	</tr>

	<tr>
		<td colspan=2>
			<b><big>II. ADMINISTRACI”N PARA LA PRODUCCI”N</big></b>
			<p>
			
		</td>
	</tr>
	<tr>
		<td >
			<div align="left" ><strong>13.- NO. DE FAMILIAS</strong></div>
		</td>
		<td >
			<div align="left" ><strong>13.1.- NO. DE MUJERES</strong>
			</div>
		</td>
	</tr>
	<tr>
	  <td>
	  <div align="left">
        <input name="txt_nfamilias"  size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
      </div>
	  <p>
	  <p>
	  </td>
	  <td>
		<div align="left">
        <input name="txt_nmujeres" size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
		</div>
	  </td>
	</tr>
	<tr>
		<td>
			<div align="left" ><strong>13.2.- NO. DE HOMBRES</strong>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div align="left">
				<input name="txt_nhombres"  size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
			</div>
			<p>
		</td>
	</tr>
	
	<tr>
		<td>	
			<div align="left" ><strong>14.- INTEGRANTES POR RANGO DE EDAD</strong>
			</div>
			<p>
		</td>
	</tr>
	
	<tr>
		<td>	
			<div align="left" >14.1- Hasta 15 aÒos
			</div>
		</td>
		<td>
			<div align="left" >14.4- De 36 a 45 aÒos
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div align="left">
			<input name="txt_int15"  size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
			</div>
		</td>
		<td>
			<div align="left">
			<input name="txt_int36"  size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
			</div>
		</td>
	<tr>
	
	
	<tr>
		<td>	
			<div align="left" >14.2- De 16 a 25 aÒos
			</div>
		</td>
		<td>
			<div align="left" >14.5- De 46 a 60 aÒos
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div align="left">
			<input name="txt_int16"  size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
			</div>
		</td>
		<td>
			<div align="left">
			<input name="txt_int46"   size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
			</div>
		</td>
	<tr>
	
	
		<tr>
		<td>	
			<div align="left" >14.3- De 26 a 35 aÒos
			</div>
		</td>
		<td>
			<div align="left" >14.6- Mayores de 60 aÒos
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div align="left">
			<input name="txt_int26"   size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
			</div>
		</td>
		<td>
			<div align="left">
			<input name="txt_int61"  size="5" maxlength="3" onkeypress="javascript:return validarNro(event)" required/>
			</div>
			<p>
		</td>
	<tr>
	
	<tr>
		<td colspan=2>	
			<div align="left" >14.7.- TOTAL DE INTEGRANTES (incluyendo al representante):</div>
			<p>
		</td>
		
	</tr>
	<tr>
		<td>
			<input name="txt_tolintegrantes" type="text"  size="5" maxlength="5" onkeypress="javascript:return validarNro(event)" required/><p>
		</td>
	</tr>
	
	<tr>
		<td colspan=2>
			<div align="left" ><strong>15.- øREQUIERE DE LA CONTRATACION DE OTRAS PERSONAS?</strong>
			</div>
			<p>
	</td>
	</tr>
	
	<tr>
		<td>
		 <?php 
		//Datos de conexion 
		$host = "localhost"; 
		$db = "acuacultura"; 
		$usuario = "root"; 
		$password = "toor"; 
 
		//Conexion con la base de datos 
		$cn = mysql_pconnect($host, $usuario, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
 
		//Consulta que nos devuelve los valores posibles 
		//para un campo enum del campo Provpro en la tabla productos
		$sql = "DESCRIBE admonproduccion contratacion"; 
		mysql_select_db($db, $cn); 
		$Contratacion = mysql_query($sql, $cn) or die(mysql_error()); 

		
 // Obtenemos todos los valores posibles del campo enum en un campo de tipo select 
 while ($ligne = mysql_fetch_array($Contratacion)) 
 { 
 extract($ligne, EXTR_PREFIX_ALL, "IN"); 
 	if (substr($IN_Type,0,4)=='enum')
		 { 
		 $lista = substr($IN_Type,5,strlen($IN_Type)); 
		 $lista = substr($lista,0,(strlen($lista)-2)); 
		 $enums = explode(',',$lista); 
		 if (sizeof($enums)>0)
		 	{ 
			 echo "<select id=ctt name=txt_contratacion onChange=mostrarcontra() >\n"; 
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
		</td>
	</tr>
	
	<tr>
		<td colspan=2>
		<div id="ctt2" style="display: none;">
			<div align="left" ><strong>16.- øCUANTAS DE FORMA TEMPORAL?
			<input name="txt_contratemp" type="text" size="20" maxlength="3" onkeypress="javascript:return validarNro(event)" ></strong>
			</div>
			<p>
		</div>
		</td>
		
	</tr>
	
		
	<tr>

		<td colspan=2>
			<div id="ctt3" style="display: none;">
			<div align="left" ><strong>17.- øCUANTAS DE FORMA PERMANENTE?
			<input name="txt_contraper" type="text" size="20" maxlength="3" onkeypress="javascript:return validarNro(event)" ><p></strong>
			</div>
			
			<p>
			</div>
		</td>
	
	</tr>

	
	
			
	
	<tr>
	  <td colspan=5>
			<div align="center">
			<input name="pag1" type="Submit" value="P¡G. 2" />
			</div>
	  </td>
    </tr>
  </table>
  </form>
</body>
</html>