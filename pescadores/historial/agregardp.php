<?php
session_start();
	$id_embarcacion= $_GET['id'];
	$_SESSION['id_emb']=$id_embarcacion;
	include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
	
	@$querytespecie= $sql="select p.nombre,p.curp,c.cantidad,e.nombre as nombemb,dp.horas,.dp.dias,dp.volumen,dp.mes,dp.anio,dp.tespecie as tesp,dp.especie as esp,dp.id_embarcacion as nuevop from datospescador p,cantidadembarcacion c, embarcacion e, datosproductivos dp WHERE idpescadores = id_datospescador and idcantidademb = id_cantidademb and idembarcacion=id_embarcacion and dp.id_embarcacion=".$id_emb;
	@$result= mysql_query($querytespecie);
	while(@$row=mysql_fetch_array($result))
			{	
				$_SESSION['tespecie']=$row['tesp'];
				$_SESSION['especie']=$row['esp'];
			}
?>
<html>
<head>
<title >
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="/sedafpa/styles/style.css" rel="stylesheet" type="text/css" media="screen">

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
<body ><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: PRODUCCION Y COSTO :: </h2>
	</td>
  </tr>
</table>
<form  method="POST" action="<?=$_SERVER['PHP_SELFT'] ?>">
<table align="center">
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
		MES:   
		<?php 
		include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
		$sql = "DESCRIBE datosproductivos mes"; 
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
		include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
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
		<td colspan=2>
			<b><big>VIII. COSTOS DE OPERACIÓN</big></b>
			<p>
			<p>
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
			<input name="pc" type="Submit" value="AGREGAR">
			</div>
	  </td>
	</tr>
</table>
</form>

<?php
	include $_SERVER['DOCUMENT_ROOT']."/sedafpa/pescadores/conexpescadores.php";
	
	if(isset($_REQUEST['pc']))
	{
	
	
	$Hpesca=$_POST['txt_horaspesca'];
	$Dpesca=$_POST['txt_diaspesca'];
	$Vpesca=$_POST['txt_volumenpesca'];
	$Mproduc=$_POST['txt_mesproductivo'];
	$Aproduc=$_POST['txt_anioproductivo'];

	
	$Oc=$_POST['txt_oc'];
	$Ol=$_POST['txt_ol'];
	$Om=$_POST['txt_om'];
	$Os=$_POST['txt_os'];
	$Opi=$_POST['txt_opi'];
	$Oa=$_POST['txt_oa'];
	$Ogp=$_POST['txt_ogp'];
	$Oat=$_POST['txt_oat'];
	$Oga=$_POST['txt_oga'];
	$Totalopera=$Oc+$Ol+$Om+$Os+$Opi+$Oa+$Ogp+$Oat+$Oga;


	echo "<script>alert(soy la sesion: $_SESSION[idemb]);</script>";	
	$id_emb=$_SESSION['id_emb'];

	
	$Ttesp=$_SESSION['tespecie'];
	$Eesp=$_SESSION['especie'];
	
	
	//CONSULTA DE DATOS PRODUCTIVOS
	$query = mysql_query("INSERT INTO datosproductivos(horas,dias,volumen,mes,anio,tespecie,especie,id_embarcacion)
						 VALUES('$Hpesca','$Dpesca','$Vpesca','$Mproduc','$Aproduc','$Ttesp','$Eesp','$id_emb')",$conexion);	
	
	$id_emb2=$_SESSION['id_emb'];
	
	
	
		//CONSULTA DE COSTOS DE OPERACION
	$query2 = mysql_query("INSERT INTO costosdeoperacion(mes,anio,combustible,lubricantes,mantenimiento,salarios,pereimp,
						  avi,gaspre,asistec,gastadm,costototal,id_embarcacion)
					      VALUES('$Mproduc','$Aproduc','$Oc','$Ol','$Om','$Os','$Opi','$Oa','$Ogp','$Oat','$Oga','$Totalopera','$id_emb2')",$conexion);
	
	
		echo "<script>alert('Los datos fueron agregados exitosamente'\n 'Espere por favor')</script>";

		echo "<META HTTP-EQUIV='Refresh' CONTENT='1;url=http://localhost/sedafpa/pescadores/historial/historialpesca.php'>";

		unset($_SESSION['id_emb']);
		unset($_SESSION['tespecie']);
		unset($_SESSION['especie']);


	}
	
?>
</body>
</html>