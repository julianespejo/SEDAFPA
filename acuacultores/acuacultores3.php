<?php session_start();

	if (isset($_SESSION['idacui'])) {}
	else{
		echo "<script>alert('No has registrado los datos tecnico-productivo .. redirigiendote');</script>";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;url=http://localhost/sedafpa/acuacultores/acuacultores2.php'>";
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
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz,";
       especiales = [8,37,39,46];

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
	function mostrarf() {
	 var checado =  document.getElementById("fec");
	 var contenedor = document.getElementById("fe");
		if(checado.checked){
	    contenedor.style.display = "block";
        return true;
		}
		else{
		contenedor.style.display = "none";
		return true;
		
		}
	}
	function mostrare() {
	 var checado2 =  document.getElementById("ev");
	 var contenedor2 = document.getElementById("evi");
		if(checado2.checked){
	    contenedor2.style.display = "block";
        return true;
		}
		else{
		contenedor2.style.display = "none";
		return true;
		
		}
	}
	function mostraren() {
	 var checado3 =  document.getElementById("en");
	 var contenedor3 = document.getElementById("enh");
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
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>
<form method="post" action="process.php">
<table class="punteado" width="820" border=0 align="center">
  	
	<tr>
		<td colspan=2>
			<b><big>IV. DATOS TECNICO-ECONÓMICOS</big></b>
			<p>
			<p>
		</td>
	</tr>
	
	
	<tr>
	<td >
		<div align="left" ><strong>34.- PRODUCCIÓN POR MES</strong> 
		<input name="produmes" type="text" size="20" maxlength="6" placeholder="TONELADAS" onkeypress="javascript:return validarNro(event)" required/> 
		 </div>
	
	</td>
	<td>
		<div align="left" ><strong>34.1- PESO </strong>
		<input name="talla" style="text-transform: uppercase;" type="text" size="20" maxlength="20" required/>	
		</div>
	</td>
	</tr>
	
	
	<tr>
	<td >
		<div align="left" ><strong>35.- CICLOS DE CULTIVO EN EL ULTIMO AÑO </strong> 
		<input name="ciclos" type="text" size="20" maxlength="2" onkeypress="javascript:return validarNro(event)" required/>	
		</div>
	
	</td>
	<td>
		<div align="left" ><strong>35.1- MESES </strong> 
		<input name="meses" type="text" size="15" maxlength="2" onkeypress="javascript:return validarNro(event)" required/>
		</div>
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" ><strong>36.- COSECHA AL AÑO </strong>
		<input name="captura" type="text" size="20" maxlength="6" placeholder="TONELADAS" onkeypress="javascript:return validarNro(event)" required/>
		 </div>
	
	</td>
	<td>
		<div align="left" ><strong> 36.1- MORTALIDAD </strong> 
		<input name="mortalidad" type="text"  size="5	" maxlength="2" onkeypress="javascript:return validarNro(event)" required/>%	
		</div>	
	</td>
	</tr>
	
	
	
	<tr>
	<td >
		<div align="left" ><strong>37.- DESTINO DE LA PRODUCCIÓN</strong> </div>	
	</td>
	</tr>
	<tr>
	<td >
		<div align="left" >37.1- AUTOCONSUMO 
			<input name="autoconsumo" type="text"  size="10" maxlength="2" onkeypress="javascript:return validarNro(event)"  />%
		</div>	
		<div align="left" >37.2- COMERCIALIZACIÓN 
			<input name="comer" type="text"  size="10" maxlength="2" onkeypress="javascript:return validarNro(event)"  />%
		</div>
		<div align="left" >37.3- OTRO	 
			<input name="otraproduccion" type="text"  size="10" maxlength="2"  onkeypress="javascript:return validarNro(event)" />% 
		</div>
	</td>
	</tr>
	
	<tr>
	<td colspan=2>
		<div align="left" ><strong>38.- TIPO DE MERCADO. </strong>(Puede haber más de una opción) 
		</div>	
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >38.1- LOCAL 
			<input type="checkbox" name="mercadolocal" value="1" >
		</div>	
	</td>
	<td >
		<div align="left" >38.3- ESTATAL <input type="checkbox" name="mercadoestatal" value="1"></div>	
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >38.2- REGIONAL <input type="checkbox" name="mercadoregional" value="1"></div>	
	</td>
	<td>
		<div align="left" >38.4- OTRO 
			<input  type="checkbox" name="mercadotro" value="1">
		</div>	
		<div align="left" >
			<input name="otromercado" style="text-transform: uppercase;" type="text" size="20" maxlength="20" onkeypress="return soloLetras(event)">
		</div>
	</td>
	</tr>
	
	
	<tr>
	<td colspan=2>
		<div align="left" ><strong>39.- PRESENTACION Y COSTO: </strong> </div>	<br>
	
	
	<tr>
	<td width="60%">
	</td>
	<td width="40%">
		<div align="left" > PRECIO / KILOGRAMO </div>	
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >39.1 FRESCO ENTERO &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input id="fec" type="checkbox" name="frescoentero" value="1" onclick="mostrarf()">
		</div>
		
	</td>
	<td><div id="fe" style="display: none;">
		$<input name="frescoprecio" type="text"  size="20" maxlength="3" onkeypress="javascript:return validarNro(event)" />
		</div>
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >39.2 EVISCERADO &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
			<input id="ev" type="checkbox" name="eviscerado" value="1" onclick="mostrare()">
		</div>
		
	</td>
	<td><div id="evi" style="display: none;">
		$<input name="evisceradoprecio" type="text" size="20" maxlength="3" onkeypress="javascript:return validarNro(event)" />
		</div>
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >39.3 ENHIELADO &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
			<input id="en"type="checkbox" name="enhielado" value="1" onclick="mostraren()">
		</div>
		
	</td>
	<td><div id="enh" style="display: none;">
		$<input name="enhieladoprecio" type="text" size="20" maxlength="3" onkeypress="javascript:return validarNro(event)" />
	</td>
	</tr>
	
	<tr>
	<td >
		<div align="left" >39.4 OTRO &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<input name="otrocosto" style="text-transform: uppercase;" type="text"  size="20" maxlength="20" onkeypress="return soloLetras(event)" >
		</div>
		
	</td>
	<td>
		$<input name="otroprecio" type="text"  size="20" maxlength="3" onkeypress="javascript:return validarNro(event)" >
		
	</td>
	</tr>
	
	
	<tr>
	<td colspan=2>
		<div align="left" ><strong>40.- FUENTES DE FINANCIAMIENTO O APOYO ECONÓMICO </strong> </div>
		<br>
	</td>
	</tr>
	
	<tr>
	<td colspan=2>
		<div align="left" >40.1- PROGRAMA 
			<input  name="apoyoprograma" style="text-transform: uppercase;" type="text"  size="20" maxlength="20" required/>
		</div> 
		<div align="left" >40.2- AÑO 
			<input name="anioprograma" type="text"  size="20" maxlength="4" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
		<div align="left" >40.3- IMPORTE $
			<input name="importeprograma" type="text"  size="20" maxlength="7" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
	</tr>
	<tr>
		<td>
			</br>
		</td>
	</tr>
	<tr>
	<td colspan=2>
		<div align="left" ><strong>41.- ¿ETAPA DEL PROYECTO EN QUE RECIBIÓ APOYO ECONÓMICO O FINANCIAMIENTO?</strong> 
		</div>
		<div align="left" >
			<input name="etapaapoyo" type="text" style="text-transform: uppercase;"  size="100" maxlength="30" required/>
		</div><br>
	</td>
	</tr>
	
	<tr>
	<td colspan=2>
	    <div align="left" ><strong>42.- IMPORTE DE LOS GASTOS DE OPERACIÓN PARA LA ACTIVIDAD ACUÍCOLA DEL ÚLTIMO CICLO</strong>
		</div><br>
	</td>
    </tr>
	
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.1- COMPRA DE HUEVO, ALEVÍN, CRÍA O POSTLARVA
		</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastohuevo" type="text" size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.2- MEDICAMENTOS Y/O PROFILÁCTIVOS</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastoamedicamento" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.3- ALIMENTO BALANCEADO</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastoalimento" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.4- SERVICIOS PROFESIONALES O ASISTENCIA TECNICA</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastoservicios" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.5- GASTOS DE COMBUSTIBLE</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastocombustible" type="text" size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.6- MANO DE OBRA</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastomano" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.7- RENTA DE MAQUINARIA Ó TIERRAS</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastomaquinaria" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.8- ENERGÍA ELÉCTRICA</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastoelectrico" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.9- RENTA DE EQUIPOS E INSTALACIONES</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastoinstalacion" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.10- MANTENIMIENTO DE MAQUINARIA, VEHICULOS O INSTALACIONES</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastomantenimiento" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.11- FLETES O TRANSPORTES</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastoflete" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.12- PERMISOS, IMPUESTOS E INTERESES</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastopermisos" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	<tr>
	<td width="70%">
	    <div align="left" >42.13- GASTOS ADMINISTRATIVOS Y PREOPERATIVOS</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="gastopre" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
	</td>
    </tr>
	
	 <tr>
	<td width="70%">
	    <div align="left" >42.14- OTRO
			<input name="otrogasto" style="text-transform: uppercase;" type="text"  size="50" maxlength="20" onkeypress="return soloLetras(event)" />
		</div>
		
	</td>
	<td width="30%">
		<div align="right" >$
			<input name="otrogastoprecio" type="text"  size="10" maxlength="6" onkeypress="javascript:return validarNro(event)" required/>
		</div> 
		
	</td>
    </tr>
	
	
	<tr>
	<td colspan=2>
	<br>
	    <div align="left" ><strong>43.- UBICACION DE LA UNIDAD PRODUCTIVA</strong>
		</div><br>
	</td>
    </tr>
	
	
	<tr>
	  <td colspan=5 >
			<div align="center">
			<input name="pag3" type="submit" value="REGISTRAR ACUACULTOR" />
			</div>
	  </td>
    </tr>
  
  </table>
  
  
  </form>
</body>
</html>