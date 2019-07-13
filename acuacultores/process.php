<?php session_start();?>
<html>
<head>
<title>
:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA ::
</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border="0" align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE ACUACULTORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>
<br>
<br>
<br>

<table class="punteado" width="820" border="0px" align="center">
    <tr>
		<td colspan=2>
		
		
		<?php
			//conexion a la base de datos
		@$conexion=mysql_connect("localhost", "root", "toor") 
		or exit("No se pudo establecer una conexión");
		@$dbseleccionada=mysql_select_db("acuacultura", $conexion)
		or exit("No se pudo seleccionar la base de datos");
		?>
		
		 <?php
		 
		 if(isset($_REQUEST['pag1']))
		 {
			//empieza primer formulario			
		$Razon=$_POST['txt_nombre'];
		$Rnpa=$_POST['txt_rnpa'];
		$Nunidada=$_POST['txt_unidada'];
		$Curp=$_POST['txt_curp'];
		$Domicilio=$_POST['txt_domicilio'];
		$Rfc=$_POST['txt_rfc'];
		$Paraje=$_POST['txt_paraje'];
		$Localidad=$_POST['txt_localidad'];
		$Municipio=$_POST['txt_municipio'];
		$Region=$_POST['txt_region'];
		$Distrito=$_POST['txt_distrito'];
		$Cp=$_POST['txt_cp'];
		$Tel=$_POST['txt_telefono'];
		$Correo=$_POST['txt_correo'];
		$Ioperaciones=$_POST['txt_ioperaciones'];
		$Nfam=$_POST['txt_nfamilias'];
		$Nmujeres=$_POST['txt_nmujeres'];
		$Nhombres=$_POST['txt_nhombres'];
		$Int15=$_POST['txt_int15'];
		$Int36=$_POST['txt_int36'];
		$Int16=$_POST['txt_int16'];
		$Int46=$_POST['txt_int46'];
		$Int26=$_POST['txt_int26'];
		$Int61=$_POST['txt_int61'];
		$Totalint=$_POST['txt_tolintegrantes'];
		$Contratacion=$_POST['txt_contratacion'];
		$Contratemp=$_POST['txt_contratemp'];
		$Contraper=$_POST['txt_contraper'];
		$Tipoten=$_POST['txt_tipoten'];
	
		$query = mysql_query("INSERT INTO datosacuicultor(razon,rnpa,nunidada,curp,domicilio,rfc,paraje,localidad,municipio,
							region,distrito,cp,telefono,correo,ioperaciones)
							VALUES ('$Razon','$Rnpa','$Nunidada','$Curp','$Domicilio','$Rfc',
							'$Paraje','$Localidad','$Municipio','$Region','$Distrito','$Cp',
							'$Tel','$Correo','$Ioperaciones')",$conexion);
		
			if($Contratacion=='SI'){
		
				$last = "SELECT LAST_INSERT_ID() FROM datosacuicultor";
				$last_id = mysql_result( mysql_query( $last ), 0, 0 );
				$_SESSION['idacui']=$last_id;
		
				$query2 = mysql_query("INSERT INTO admonproduccion (nfamilias,nmujeres,nhombres,int15,int16,int26,int36,
										int46,int61,tolintegrantes,contratacion,
										contratemp,contraper,tipoten,id_acuicultor)
										VALUES('$Nfam','$Nmujeres','$Nhombres','$Int15','$Int16','$Int26','$Int36',
										'$Int46','$Int61','$Totalint','$Contratacion','$Contratemp','$Contraper',
										'$Tipoten','$last_id')",$conexion);
			}else{		
				$last = "SELECT LAST_INSERT_ID() FROM datosacuicultor";
				$last_id = mysql_result( mysql_query( $last ), 0, 0 );
				$_SESSION['idacui']=$last_id;
			
				$query2 = mysql_query("INSERT INTO admonproduccion (nfamilias,nmujeres,nhombres,int15,int16,int26,int36,int46,
									 int61,tolintegrantes,contratacion,tipoten,id_acuicultor)
									VALUES('$Nfam','$Nmujeres','$Nhombres','$Int15','$Int16','$Int26','$Int36',
									'$Int46','$Int61','$Totalint','$Contratacion','$Tipoten','$last_id')",$conexion);
			}						
		
		echo "Los datos fueron agregados exitosamente </br>";
		echo "Espere por favor redirigiendo a la pagina 2 ....";
		echo "<META HTTP-EQUIV='Refresh' CONTENT='3;url=http://localhost/sedafpa/acuacultores/acuacultores2.php'>";
		
		}
		
		
		
		  //  solocitando la segunda pagina t-p
		 if(isset($_REQUEST['pag2']))
		 {

			$last_id=$_SESSION['idacui'];
			
			// t-p
			$Areatol=$_POST['areatotal'];
			$Areaact=$_POST['areaactividad'];
			$Arearest=$_POST['arearestante'];
			if(isset($_REQUEST['extensivo'])){	$Extensivo="SI";}
			if(isset($_REQUEST['intensivo'])){	$Intensivo="SI";}
			if(isset($_REQUEST['semi'])){	$Semi="SI";}
			if(isset($_REQUEST['otro'])){	$Otro=$_POST['otromodelo'];}
			
			//	tabla de especie acuicola
			if(isset($_REQUEST['mojarra'])){ $Mojarra="SI";}
			if(isset($_REQUEST['langostino'])){	$Langostino="SI";}
			if(isset($_REQUEST['trucha'])){		$Trucha="SI";}
			if(isset($_REQUEST['huachinango']))	{	$Huachinango="SI";}
			if(isset($_REQUEST['camaron'])){	$Camaron="SI";}
			if(isset($_REQUEST['pecesornato'])){$Pecesornato="SI";}
			if(isset($_REQUEST['carpa'])){	$Carpa="SI";}
			$Otraespecie = $_POST['otraespecie'];
			//	termina tabla de especie acuicola
		
		
			//	tabla de infraestructura
			$Rusdim=$_POST['rusdim'];
			$Ruscant=$_POST['ruscant'];
			$Rustotal=$Rusdim*$Ruscant;
			$Memdim=$_POST['memdim'];
			$Memcant=$_POST['memcant'];
			$Memtotal=$Memdim*$Memcant;
			$Geodim=$_POST['geodim'];
			$Geocant=$_POST['geocant'];
			$Geototal=$Geodim*$Geocant;
			$Cirdim=$_POST['cirdim'];
			$Circant=$_POST['circant'];
			$Cirtotal=$Cirdim*$Circant;
			$Recdim=$_POST['recdim'];
			$Reccant=$_POST['reccant'];
			$Rectotal=$Recdim*$Reccant;
			$Jaulasdim=$_POST['jaulasdim'];
			$Jaulascant=$_POST['jaulascant'];
			$Jaulastotal=$Jaulasdim*$Jaulascant;
			$Cercosdim=$_POST['cercosdim'];
			$Cercoscant=$_POST['cercoscant'];
			$Cercostotal=$Cercosdim*$Cercoscant;
			$Otrodim=$_POST['otrodim'];
			$Otrocant=$_POST['otrocant'];
			$Otrototal=$Otrodim*$Otrocant;
			//	termina infraestructura
		 
			//	tabla captaciónagua	
			if(isset($_REQUEST['pozo'])){	$Pozo="SI";}
			if(isset($_REQUEST['presa'])){	$Presa="SI";}
			if(isset($_REQUEST['pozocielo'])){	$Pozocielo="SI";}
			if(isset($_REQUEST['laguna'])){		$Laguna="SI";}
			if(isset($_REQUEST['riocuenca'])){	$Riocuenca="SI";}
			if(isset($_REQUEST['mar'])){	$Mar="SI";}
			if(isset($_REQUEST['arrolloman'])){	$Arrolloman="SI";}
			$Otrafuente= $_POST['otrafuente'];
			$Alimentagua=$_POST['alimentagua'];
			$Flujo=$_POST['flujo'];
			//	termina tabla de captaciónagua 
			
			// t-p
		 	 $Nombequipos=$_POST['nombequipos'];
			 if(isset($_REQUEST['asesorpagado'])){	$Asesorpagado="SI";}
			 if(isset($_REQUEST['asesorinst'])){	$Asesorinst="SI";}
 			 if(isset($_REQUEST['ningunasesor'])){	$Ningunasesor="SI";}
		 	 if(isset($_REQUEST['centrosi'])){	$Centrosi="SI";}
		     $Densidadorg=$_POST['densidadorg'];
		     if(isset($_REQUEST['hormonadosi'])){	$Hormonadosi="SI";}
		     if(isset($_REQUEST['medicamentosi'])){	$Medicamentosi=$_POST['medicamento'];}
		     if(isset($_REQUEST['alimentosbalsi'])){ $Alimentosbal=$_POST['alimentosbal'];	}
			 // termina t-p
		
			//insercion de datos de la primera tabla tecnicoproductivo SI SE PUDO
			$query= mysql_query("INSERT INTO tecnicoproductivo (areatotal,areaactividad,arearestante,
								modeloext,modeloint,modelosemi,modelootro,equipoacuicola,asesorpag,
								asesorinst,ningunasesor,organismoscert,densidadorganismos,hormonados,
								medicamentos,alimentosbal,id_acuicultor)VALUES ('$Areatol','$Areaact',
								'$Arearest','$Extensivo','$Intensivo','$Semi','$Otro','$Nombequipos',
								'$Asesorpagado','$Asesorinst','$Ningunasesor','$Centrosi','$Densidadorg',
								'$Hormonadosi','$Medicamentosi','$Alimentosbal','$last_id')",$conexion);
								
			
				
		
			//insercion de datos en  la tabla especieacuicola
			$query2=mysql_query("INSERT INTO especieacuicola (mojarra,trucha,camaronbco,
								carpacomun,langostino,huachinango,pecesornato,otraespecie,id_tecpro) 
								VALUES ('$Mojarra','$Trucha','$Camaron','$Carpa','$Langostino',
								'$Huachinango','$Pecesornato','$Otraespecie','$last_id') ",$conexion);
			
			//insercion de datos en la tabla infraestructura
			$query3=mysql_query("INSERT INTO infraestructura(rusticosdim,rusticoscant,rusticostotal,membranadim,membranacant,
								membranatotal,geomembranadim,geomembranacant,geomembranatotal,tcirculardim,tcircularcant,
								tcirculartotal,trectandim,trectancant,trectantotal,jaulaflotdim,jaulaflotcant,jaulaflottotal,
								ceryencdim,ceryenccant,ceryenctotal,otrodim,otrocant,otrototal,id_tecpro) 
								VALUES ('$Rusdim','$Ruscant','$Rustotal','$Memdim','$Memcant','$Memtotal','$Geodim','$Geocant',
								'$Geototal','$Cirdim','$Circant','$Cirtotal','$Recdim','$Reccant','$Rectotal','$Jaulasdim',
								'$Jaulascant','$Jaulastotal','$Cercosdim','$Cercoscant','$Cercostotal','$Otrodim','$Otrocant',
								'$Otrototal','$last_id')",$conexion);
			
			//insercion de datos en la tabla captacionagua
			$query4=mysql_query("INSERT INTO captacionagua(pozoprofun,pozocielo,riocuenca,arrollomanantial,presa,laguna,mar,otracaptacion,
								alimentacionagua,flujo,id_tecpro)VALUES ('$Pozo','$Pozocielo','$Riocuenca','$Arrolloman','$Presa','$Laguna',
								'$Mar','$Otrafuente','$Alimentagua','$Flujo','$last_id')",$conexion);
		
			echo "Los datos fueron agregados exitosamente </br>";
			echo "Espere por favor redirigiendo a la pagina 3 ....";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='3;url=http://localhost/sedafpa/acuacultores/acuacultores3.php'>";
		 
		 
		 
		 }

		 if(isset($_REQUEST['pag3']))
		 
		 {
			$last_id=$_SESSION['idacui'];
			$Producmes = $_POST['produmes'];
			$Talla= $_POST['talla'];
			$Ciclos=$_POST['ciclos'];
			$Meses=$_POST['meses'];
			$Captura=$_POST['captura'];
			$Mortalidad=$_POST['mortalidad'];
			$Autoconsumo=$_POST['autoconsumo'];
			$Comer=$_POST['comer'];
			$Otraproduccion=$_POST['otraproduccion'];
			
			if(isset($_REQUEST['mercadolocal'])){	$Mercadolocal="SI";}
			if(isset($_REQUEST['mercadoestatal'])){	$Mercadoestatal="SI";}
			if(isset($_REQUEST['mercadoregional'])){	$Mercadoregional="SI";}
			if(isset($_REQUEST['mercadotro'])){	$Otromercado=$_POST['otromercado'];}
			
			
			$Frescoentero=$_POST['frescoentero'];
			$Eviscerado=$_POST['eviscerado'];
			$Enhielado=$_POST['enhielado'];
			if(isset($_REQUEST['frescoentero']) && $Frescoentero == '1' ){$Frescoprecio=$_POST['frescoprecio'];}
			if(isset($_REQUEST['eviscerado']) && $Eviscerado == '1' ){$Evisceradoprecio=$_POST['evisceradoprecio'];}
			if(isset($_REQUEST['enhielado']) && $Enhielado == '1' ){$Enhieladoprecio=$_POST['enhieladoprecio'];}
			$Otrocosto=$_POST['otrocosto'];
			if($Otrocosto==""){	$Otroprecio=0.00;}
			else{$Otroprecio=$_POST['otroprecio'];	}
			
			
			$Apoyoprograma=$_POST['apoyoprograma'];
			$Anioprograma=$_POST['anioprograma'];
			$Importeprograma=$_POST['importeprograma'];
			$Etapaapoyo=$_POST['etapaapoyo'];
			
			$Gastohuevo=$_POST['gastohuevo'];
			$Gastoamedicamento=$_POST['gastoamedicamento'];
			$Gastoalimento=$_POST['gastoalimento'];
			$Gastoservicios=$_POST['gastoservicios'];
			$Gastocombustible=$_POST['gastocombustible'];
			$Gastomano=$_POST['gastomano'];
			$Gastomaquinaria=$_POST['gastomaquinaria'];
			$Gastoelectrico=$_POST['gastoelectrico'];
			$Gastoinstalacion=$_POST['gastoinstalacion'];
			$Gastomantenimiento=$_POST['gastomantenimiento'];
			$Gastoflete=$_POST['gastoflete'];
			$Gastopermisos=$_POST['gastopermisos'];
			$Otrogasto=$_POST['otrogasto'];
			$Otrogastoprecio=$_POST['otrogastoprecio'];
		
			
			
			//insercion de los datos tecnicoproductivo
			$query = mysql_query("INSERT INTO tecnicoeconomico (producpormes,talla,ultimociclo,mesesciclo,
								  capturacosecha,mortalidad,autoconsumo,comercializacion,otrodestino,
								  mercadolocal,mercadoregional,mercadoestatal,mercadootro,costoventafresco,
								  costoventaviscerado,costoventaenhielado,ventaotro,costoventaotro,fuentesfinanprograma,
								  fuentesfinanano,fuentesfinanimporte,etaparecibioeconomico,id_acuicultor)
								  VALUES ('$Producmes','$Talla','$Ciclos','$Meses',
								  '$Captura','$Mortalidad','$Autoconsumo','$Comer','$Otraproduccion',
								  '$Mercadolocal','$Mercadoestatal','$Mercadoregional','$Otromercado','$Frescoprecio',
								  '$Evisceradoprecio','$Enhieladoprecio','$Otrocosto','$Otroprecio','$Apoyoprograma',
								  '$Anioprograma','$Importeprograma','$Etapaapoyo','$last_id')",$conexion);
								  
			$query2 = mysql_query("INSERT INTO gastosoperacion(compradehuevo,medicamentoyprofi,alimentobal,serviciosprof,
								 gastoscomb,manodeobra,rentamaquinaria,energiaelect,rentaequipos,mantenimaq,fletestransportes,
								 permisosintereses,otrosgastos,otropreciogast,id_tece) 
								 VALUES ('$Gastohuevo','$Gastoamedicamento','$Gastoalimento','$Gastoservicios','$Gastocombustible',
								 '$Gastomano','$Gastomaquinaria','$Gastoelectrico','$Gastoinstalacion','$Gastomantenimiento',
								 '$Gastoflete','$Gastopermisos','$Otrogasto','$Otrogastoprecio','$last_id') ",$conexion);
		 
			echo "Los datos fueron agregados exitosamente </br>";
			echo "Espere por favor redirigiendo al panel principal ....";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='3;url=http://localhost/sedafpa/acuacultores/accion.php'>";
		 }
		 
		 		 
		
		 
		 
		 
		 
		
	mysql_close($conexion); 
?>		
		</td>
	</tr>
  </table>
</body>
</html>