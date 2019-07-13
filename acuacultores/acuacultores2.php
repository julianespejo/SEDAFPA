<?php session_start();

	if (isset($_SESSION['idacui'])) {}
	else{
		echo "<script>alert('No has registrado un acuicultor .. redirigiendote');</script>";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;url=http://localhost/sedafpa/acuacultores/acuacultores.php'>";
	} 	
?>
<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">

	<script type="text/javascript">
	function mostrardensidad() {
	 var checado1 =  document.getElementById("centrosi");
	 var contenedor1 = document.getElementById("densidad");
		if(checado1.checked){
	    contenedor1.style.display = "block";
        return true;
		}
		else{
		contenedor1.style.display = "none";
		return true;
		
		}
		
		
	}
	function mostrarmedicamentos(){
	  var checado2 =  document.getElementById("medicamentosi");
  	  var contenedor2 = document.getElementById("medicamentos");
	  if(checado2.checked){
	    contenedor2.style.display = "block";
        return true;
		}
		else{
		contenedor2.style.display = "none";
		return true;
		
		}
	 
	  
	}
	
	function mostraralimentos(){
	  var checado3 =  document.getElementById("alimentosbalsi");
  	  var contenedor3 = document.getElementById("alimentos");
	  if(checado3.checked){
	    contenedor3.style.display = "block";
        return true;
		}
		else{
		contenedor3.style.display = "none";
		return true;
		
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

</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>

<form id="form2" name="form2" method="post" action="process.php" >
<table  width="820" border=0 align="center">
    <tr>
		<td colspan=2>
			<b><big>III. DATOS TECNICO-PRODUCTIVOS</big></b>
			<p>
			<p>
		</td>
	</tr>
	<tr>
	<td>
		<p>
	</td>
	</tr>
	
	
	<tr>
	<td>
		 <div align="left" ><strong>ACUACULTURA:</strong></div>
		 <p>
	</td>
	</tr>
	
	
	<tr>
    <td >
	    <div align="left" ><strong>23.- øQU… ¡ÅREA TIENE EN TOTAL?</strong></div>
    </td>
	<td>
		   <input name="areatotal" type="text" size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>m2
	</td>
	</tr>
	
	
	
	<tr>
    <td >
	    <div align="left" ><strong>24.- øQU… ¡ÅREA DESTINA A LA ACTIVIDAD ACUÕçCOLA?</strong></div>
    </td>
	<td>
		   <input name="areaactividad" type="text"   size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>m2
	</td>
	</tr>
	
	
	<tr>
    <td >
	    <div align="left" ><strong>25.- EL ¡ÅREA RESTANTE</strong> </div>
    </td>
	<td>
		   <input name="arearestante" type="text"  size="50" style="text-transform: uppercase;" maxlength="100" placeholder="øA que lo dedica?" onkeypress="return soloLetras(event)" required/>
	</td>
	</tr>
	
	
	<tr>
    <td >
	    <br>
    </td>
	</tr>
	
	<tr>
    <td >
	    <div align="left" ><strong>26.- SISTEMA DE PRODUCCION</strong></div>
    </td>
	</tr>
	
	
	<tr>
	<td width="195">
		  <div align="left" >26.1- EXTENSIVO<input type="checkbox" name="extensivo" value="int"></div>
	</td>
	<td width="195">
		<div align="left" >26.2- INTENSIVO  <input type="checkbox" name="intensivo" value="int"></div>
	</td>
	</tr>
	<tr>
	<td width="195">
	<div align="left" >26.3- SEMI-INTENSIVO<input type="checkbox" name="semi" value="int"></div>
	</td>
	<td width="195">
	<div align="left" >26.4- OTRO<input type="checkbox" name="otro" value="int"><input type="text" name="otromodelo" size="30" onkeypress="return soloLetras(event)" maxlength="20"></div>
	</td>
	</tr>
	
	
	<tr>
    <td >
	    <br>
    </td>
	</tr>
		
	<tr>
    <td >
	      <div align="left" ><strong>27.- ESPECIE ACUÕçCOLA</strong><p></div>
    </td>
	</tr>
	
	<tr>
    <td>
	      <div align="left" >27.1 MOJARRA TILAPIA Oreochromis spp <input type="checkbox" name="mojarra" value="int">	 </div>
    </td>
    <td>
	      <div align="left" >27.5 LANGOSTINO Macrobrachium rosenbergii<input type="checkbox" name="langostino" value="int">	 </div>
    </td>
	</tr>	
	
	<tr>
    <td>
	      <div align="left" >27.2 TRUCHA Orcorhynchus mykiss<input type="checkbox" name="trucha" value="int">	 </div>
    </td>
    <td>
	      <div align="left" >27.6 HUACHINANGO ” PARGO Lutjanus spp<input type="checkbox" name="huachinango" value="int">	 </div>
    </td>
	</tr>
	
	<tr>
    <td>
	      <div align="left" >27.3 CAMAR”N BCO. Litopenaus vannamei<input type="checkbox" name="camaron" value="int">	 </div>
    </td>
    <td>
	      <div align="left" >27.7 PECES DE ORNATO<input type="checkbox" name="pecesornato" value="int">	 </div>
    </td>
	</tr>
	
	<tr>
    <td>
	      <div align="left" >27.4 CARPA COM⁄N Cyprinus carpio<input type="checkbox" name="carpa" value="int">	 </div>
    </td>
    <td>
	      <div align="left" >27.7 OTRA<input style="text-transform: uppercase;" type="text" name="otraespecie" size="30" onkeypress="return soloLetras(event)">	 </div>
    </td>
	</tr>
	<tr>
  <td >
	 <p>
  </td>
  </tr>
	
  </table >
   
  <table class="punteado" width="840" border=0 align="center">
  <tr >
  <td colspan="2">
	 <div align="left" ><strong>28.- TIPO DE INFRAESTRUCTURA CON LA QUE CUENTA</strong></div>
  </td>
  </tr>
  
  <tr>
  
  <td width="45%">
  </td>
  
  <td width="20%">
  <br><br>
	 <div align="left" >Dimensiones</div>
  </td>
  
  <td width="20%">
  <br><br>
	<div align="left" >Cantidad</div>
  </td>
  
  <td width="15%">
  <br><br>
	<div align="center" >Total</div>
  </td>
  
  </tr>
  
  <tr>
  <td>
	 <div align="left" >28.1- ESTANQUES</div>
  </td>
  </tr>
  <tr>
  <td width="45%">
	 <div align="right" > R˙sticos</div>
  </td>
  
  <td width="20%">
	 <input name="rusdim" type="text"  id="rdim" size="20" maxlength="6" placeholder="metros cuadrados" onkeyup="multiplicarusticos()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="20%">
  <input name="ruscant" type="text" id="rcant" size="20" maxlength="6" placeholder="cantidad de estanques" onkeyup="multiplicarusticos()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%">
  <div align="center" >
		<span id="rtotal"></span>	
  </div>
  
  <script>
  function multiplicarusticos(){
	
	var total = 0;
	var valor1 = document.getElementById("rdim").value;
	var valor2 = document.getElementById("rcant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("rtotal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  
  </tr>
  
  <tr>
  <td width="45%">
	<div align="right" > Recubiertos con membrana</div>
  </td>
  
   <td width="20%">
	 <input name="memdim" id="mdim" type="text"  size="20" maxlength="6" placeholder="metros cuadrados" onkeyup="multiplicarmemb()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="20%">
  <input name="memcant" id="mcant" type="text"  size="20" maxlength="6" placeholder="cantidad de estanques" onkeyup="multiplicarmemb()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%">
	 <div align="center" >
		<span id="mtotal"></span>	
	</div>
  <!--<input name="memtotal" type="text"  size="15" maxlength="6" > -->
  
    <script>
  function multiplicarmemb(){
	
	var total = 0;
	var valor1 = document.getElementById("mdim").value;
	var valor2 = document.getElementById("mcant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("mtotal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  </tr>
  
  <tr>
  <td>
	 <div align="left" >28.2- TANQUES PREFABRICADOS</div>
  </td>
  </tr>
  
  
  <tr>
  <td width="45%">
	<div align="right" > Geomembrana con malla galv. Û l·mina</div>
  </td>
  
   <td width="20%">
	 <input name="geodim" type="text" id="gdim" size="20" maxlength="6" placeholder="metros del diametro" onkeyup="multiplicargeo()"  onkeypress="javascript:return validarNro(event)">
  </td>
  
  <td width="20%">
  <input name="geocant" type="text"  id="gcant" size="15" maxlength="6" placeholder="cantidan de tanques" onkeyup="multiplicargeo()"  onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%">
   <div align="center" >
		<span id="gtotal"></span>	
	</div>
  
  <!-- <input name="geototal" type="text"  size="15" maxlength="6" placeholder="metros cuadrados" onkeypress="javascript:return validarNro(event)" disabled> -->
     <script>
  function multiplicargeo(){
	
	var total = 0;
	var valor1 = document.getElementById("gdim").value;
	var valor2 = document.getElementById("gcant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("gtotal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  </tr>
  
  
  <tr>
  <td>
	 <div align="left" >28.3- TANQUES DE CONCRETO/TABIC”N</div>
  </td>
  </tr>
  
  
  <tr>
  <td width="45%">
	<div align="center" > Tipo circular</div>
  </td>
  
   <td width="20%">
	 <input name="cirdim" type="text"  id="cdim" size="20" maxlength="6" placeholder="metros del diametro" onkeyup="multiplicarcir()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="20%">
  <input name="circant" type="text" id="ccant" size="15" maxlength="6" placeholder="cantidad de tanques" onkeyup="multiplicarcir()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%">
	<div align="center" >
		<span id="ctotal"></span>	
	</div>
  <!-- <input name="cirtotal" type="text"  size="15" maxlength="6" placeholder="metros cuadrados" onkeypress="javascript:return validarNro(event)" disabled> -->
    <script>
  function multiplicarcir(){
	
	var total = 0;
	var valor1 = document.getElementById("cdim").value;
	var valor2 = document.getElementById("ccant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("ctotal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  </tr>
  
  <tr>
  <td width="45%">
	<div align="center" > Tipo rectangular</div>
  </td>
  
   <td width="20%">
	 <input name="recdim" type="text"  id="rectandim" size="20" maxlength="6" placeholder="metros cuadrados" onkeyup="multiplicarrect()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="20%">
  <input name="reccant" type="text"  id="rectancant" size="20" maxlength="6" placeholder="cantidad de estanques" onkeyup="multiplicarrect()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%">
  <div align="center" >
		<span id="rectantotal"></span>	
	</div>
 <!-- <input name="rectotal" type="text"  size="15" maxlength="6" placeholder="metros cuadrados" onkeypress="javascript:return validarNro(event)" disabled> -->
    <script>
  function multiplicarrect(){
	
	var total = 0;
	var valor1 = document.getElementById("rectandim").value;
	var valor2 = document.getElementById("rectancant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("rectantotal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  </tr>
  
  
  <tr>
  <td width="45%">
	 <div align="left" >28.4- JAULAS FLOTANTES</div>
  </td>
  
  <td width="20%">
	 <input name="jaulasdim" type="text"  id="jdim" size="20" maxlength="6" placeholder="metros cubicos" onkeyup="multiplicarjaula()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="20%">
  <input name="jaulascant" type="text"  id="jcant" size="20" maxlength="6" placeholder="cantidad de jaulas" onkeyup="multiplicarjaula()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%"> 
  <div align="center" >
		<span id="jtotal"></span>	
	</div>
  <!-- <input name="jaulastotal" type="text"  size="15" maxlength="6" placeholder="metros cubicos" onkeypress="javascript:return validarNro(event)" disabled> -->
   <script>
  function multiplicarjaula(){
	
	var total = 0;
	var valor1 = document.getElementById("jdim").value;
	var valor2 = document.getElementById("jcant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("jtotal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  
  </tr>
  
  
  <tr>
  <td width="45%">
	 <div align="left" >28.5- CERCOS Y ENCIERROS</div>
  </td>
  
  <td width="20%">
	 <input name="cercosdim" id="endim" type="text" size="20" maxlength="6" placeholder="metros cuadrados" onkeyup="multiplicarenc()"onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="20%">
  <input name="cercoscant" id="encant" type="text"  size="20" maxlength="6" placeholder="cantidad de cercos" onkeyup="multiplicarenc()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%">
   <div align="center" >
		<span id="entotal"></span>	
	</div>
  <!-- <input name="cercostotal" type="text"  size="15" maxlength="6" placeholder="metros cuadrados" onkeypress="javascript:return validarNro(event)" disabled> -->
   
	  <script>
  function multiplicarenc(){
	
	var total = 0;
	var valor1 = document.getElementById("endim").value;
	var valor2 = document.getElementById("encant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("entotal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  
  </tr>
  
  
  
  <tr>
  <td width="45%">
	 <div align="left" >28.6- OTRO</div>
  </td>
  
  <td width="20%">
	 <input name="otrodim" type="text" id="odim" size="20" maxlength="6" placeholder="metros cuadrados" onkeyup="multiplicarotro()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="20%">
  <input name="otrocant" type="text" id="ocant" size="20" maxlength="6" placeholder="cantidad"  onkeyup="multiplicarotro()" onkeypress="javascript:return validarNro(event)" >
  </td>
  
  <td width="15%">
	 <div align="center" >
		<span id="ototal"></span>	
	</div>
  <!-- <input name="otrototal" type="text"  size="15" maxlength="6" placeholder="metros cuadrados" onkeypress="javascript:return validarNro(event)" disabled> -->
  	  <script>
  function multiplicarotro(){
	
	var total = 0;
	var valor1 = document.getElementById("odim").value;
	var valor2 = document.getElementById("ocant").value;
	
	total = (valor1 * valor2);
	
	var display = document.getElementById("ototal");
	display.innerHTML = total;
	
	}
	</script>
  </td>
  
  </tr>

   <tr>
	<td >
	 <p>
  </td>
  </tr>
  
  
  <tr>
  <td width="45%">
	 <div align="left" ><strong>29.- FUENTES DE CAPTACI”N DE AGUA</strong></div>
  </td>
  
  <tr>
	<td width="195">
		
	<div align="left" >29.1- POZO PROFUNDO<input type="checkbox" name="pozo" value="int"></div>
	</td>
	<td width="195">
		<div align="left" >29.5- PRESA  <input type="checkbox" name="presa" value="int"></div>
	</td>
	</tr>
	
	<tr>
	<td width="195">
	<div align="left" >29.2- POZO A CIELO ABIERTO<input type="checkbox" name="pozocielo" value="int"></div>
	</td>
	<td width="195">
	<div align="left" >29.6- LAGUNA<input type="checkbox" name="laguna" value="int"></div>
	</td>
	</tr>
  
  <tr>
	<td width="195">
		  <div align="left" >29.3- RIO ” CUENCA<input type="checkbox" name="riocuenca" value="int"></div>
	</td>
	<td width="195">
		<div align="left" >29.7- MAR  <input type="checkbox" name="mar" value="int"></div>
	</td>
	</tr>
	
	<tr>
	<td width="195">
	<div align="left" >29.4- ARROYO O MANANTIAL<input type="checkbox" name="arrolloman" value="int"></div>
	</td>
	<td colspan=2>
	<div align="left" >29.8- OTRO 
	<input name="otrafuente" style="text-transform: uppercase;" type="text"  size="15" maxlength="20" onkeypress="return soloLetras(event)"></div>
	</td>
	</tr>
  
  
   <tr>
  <td >
	 <p>
  </td>
  </tr>
  
  
  <tr>
  <td width="45%">
	 <div align="left" ><strong>30.- ALIMENTACI”N DE AGUA</strong></div>
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
		$sql = "DESCRIBE captacionagua alimentacionagua"; 
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
			 echo "<select name=alimentagua >\n"; 
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
	<div align="left" >FLUJO
		<input name="flujo" type="text"  size="10" maxlength="4" placeholder="litros/segundo" onkeypress="javascript:return validarNro(event)" required/></div>
	</td>
	 
	</tr>
		<tr>
    <td >
	    <br>
    </td>
	</tr>
		
	<tr>
	<td colspan=2>
	    <div align="left" ><strong>31.- DESCRIBA QUE EQUIPOS E INSTRUMENTOS ACUÕCOLAS UTILIZA</strong></div>
		<div align="left" >(Aireadores, oxÌmetros, medidor de PH, termÛmetros, recirculadores, etc)</div>
		<input name="nombequipos" style="text-transform: uppercase;" type="text"  size="100" maxlength="100"  required/>	
    <p>
	</td>
    </tr>
	
	<tr>
	<td colspan=2>
	    <div align="left" ><strong>32.- INDIQUE EL TIPO DE ASISTENCIA T…CNICA CON QUE CUENTA:</strong><p></div>
		<div align="left" >32.1 ASESOR PAGADO POR USTED MISMO <input type="checkbox" name="asesorpagado" value="int"></div>
	</td>
	</tr>
	<tr>
	<td >
		<div align="left" >32.2 ASESOR DE ALGUNA INSTITUCI”N <input type="checkbox" name="asesorinst" value="int"></div>
	</td>
    </tr>
	<tr>
	<td >
		<div align="left" >32.3 NINGUNA <input type="checkbox" name="ningunasesor" value="int"></div>
    <p>
	</td>
    </tr>
    

	<tr>
	<td colspan=2>
	    <div align="left" ><strong>33.- PROCEDENCIA DE LA ESPECIE</strong><p></div>
		<div align="left" >33.1 ORGANISMOS CERTIFICADOS DE LABORATORIOS ” CENTROS ACUÕCOLAS</div>
		
	</td>
	</tr>
	
	<tr>
	<td colspan=2>
		<div align="left"><input onclick="mostrardensidad()" type="checkbox" name="centrosi" id="centrosi" value="1" ></div>
		<div align="left" id="densidad" style="display:none;">33.2.- NUMERO DE ORGANISMOS
		<input name="densidadorg"  placeholder="miles" type="text"  size="15" maxlength="11" onkeypress="javascript:return validarNro(event)" ></div>
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >33.3 HORMONADOS ” GENETICAMENTE TRATADOS </div>
		<div align="left"><input type="checkbox" name="hormonadosi" value="int"></div>
	</td>
	</tr>
	
	
	<tr>
	<td >
		<div align="left" >33.4 NOMBRE DEL MEDICAMENTO </div>
		<div align="left"><input onclick="mostrarmedicamentos()" type="checkbox" name="medicamentosi" id="medicamentosi" value="1"></div>
		<div id="medicamentos" style="display:none;"> DOSIS: 
			<input style="text-transform: uppercase;" name="medicamento" type="text" size="20" maxlength="30" >
		</div>
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >33.5 ALIMENTOS BALANCEADOS </div>
		<div align="left"><input onclick="mostraralimentos()" type="checkbox" name="alimentosbalsi" id="alimentosbalsi" value="1"></div>
		<div id="alimentos" style="display:none;"> CANT/A—O :
			<input name="alimentosbal" type="text"  size="20" maxlength="30" ></div>
		</div>
		<br>
		
	</td>
	</tr>
	
	<tr>
	  <td colspan=5 >
			<div align="center">
			<input name="pag2" type="Submit" value="P¡G 3" />
			</div>
	  </td>
    </tr>
  </table>
  </form>
  
	</th>
</tr>

</table>
</body>
</html>