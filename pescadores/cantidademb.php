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
<title >
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
	function validacion(){
		cantidad = document.getElementById("cantidad").value;
		 if (cantidad="" || cantidad==0 || cantidad=='0' || cantidad=='00') {
    
			alert('la cantidad no puede ser 0 o no has ingresado la cantidad');
    return false;
  }
}
</script>
</head>
<body ><?php include $_SERVER['DOCUMENT_ROOT']."/sedafpa/header.php"; ?>
<table width="780" border=0 align="center" >
  <tr>
    <td colspan="3" >      
	  <h2 align="center" id="borderegistro">:: REGISTRO DE PESCADORES AFILIADOS A SEDAFPA :: </h2>
	</td>
  </tr>
</table>
<br>
<br>
<br>
<form action="processpescadores.php" method="post" onsubmit="return validacion()" />
<table width="820" border="0px" align="center">
	<tr>
		<td>
		<div align="left" ><strong>CANTIDAD DE EMBARCACION:</strong>
		<input id ="cantidad" name="txt_cantidad" type="text"  size="5" maxlength="2" onkeypress="javascript:return validarNro(event)" required/>
		<input name="cantidademb" type="Submit" value="AGREGAR EMBARCACIÓN"></div>
		</td>
	</tr>
</table>
</form>

</body>
</html>