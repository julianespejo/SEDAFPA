<?php
require('fpdf/fpdf.php');
require('conexion.php');

class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{

	$this->SetFont('Arial','B',10);
	$this->SetTextColor(66,33,00);
	$this->Text(55,14,'SECRETARIA DE DESARROLLO AGROPECUARIO,FORESTAL,',0,'C', 0);
	$this->Text(85,18,'PESCA Y ACUACULTURA',0,'C', 0);
	$this->Image('estado.jpg',15,10,40);
	$this->Image('oax.jpg',165,8,20);
	$this->Ln(10);
		
	
}
function Footer()
{
//Pie de página
$this->SetY(-15);
$this->SetFont('Arial','I',10);
$this->SetTextColor(128);
$this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C'); // el parametro {nb} es generado por una funcion llamada AliasNbPages
} 


}
	
	$pescador= $_GET['id'];
	$con = new DB;
	$pescadores = $con->conectar();	
	
	
	$strConsulta = "SELECT * from datospescador where idpescadores ='".$pescador."'";
	
	$pescadores = mysql_query($strConsulta);
	
	$fila = mysql_fetch_array($pescadores);

	$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->AliasNbPages(); //funcion que calcula el numero de paginas

	$pdf->Ln(10);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,6,utf8_decode('RAZÓN SOCIAL: ').$fila['razonsocial'],0,1);
	$pdf->Cell(0,6,'RFC: '.$fila['rfc'],0,1);
	$pdf->Cell(0,6,'NOMBRE: '.$fila['nombre'],0,1);
	$pdf->Cell(0,6,'CURP: '.$fila['curp'],0,1);
	$pdf->Cell(0,6,'TELEFONO: '.$fila['telefono'],0,1); 
	$pdf->Cell(0,6,'CORREO: '.$fila['correo'],0,1);
	$pdf->Cell(0,6,'DOMICILIO: '.$fila['domicilio'],0,1);
	$pdf->Cell(0,6,'LOCALIDAD: '.$fila['localidad'],0,1);
	$pdf->Cell(0,6,'MUNICIPIO: '.$fila['municipio'],0,1);
	$pdf->Cell(0,6,'DISTRITO: '.$fila['distrito'],0,1);
	$pdf->Cell(0,6,utf8_decode('REGIÓN: ').$fila['region'],0,1);
	$pdf->Cell(0,6,'GRUPO SANGUINEO: '.$fila['gsanguineo'],0,1);
	$pdf->Cell(0,6,'TIPO PESCADOR: '.$fila['tpescador'],0,1);
	$pdf->Cell(0,6,utf8_decode('N° PERMISO: ').$fila['npermiso'],0,1);
	$pdf->Cell(0,6,'RNPUE: '.$fila['rnpue'],0,1);
	$pdf->Cell(0,6,'VIGENCIA PERMISO DE: '.$fila['vigenciade'],0,1);
	$pdf->Cell(0,6,'VIGENCIA PERMISO HASTA: '.$fila['vigenciahasta'],0,1);
	$pdf->Cell(0,6,'PESQUERIA: '.$fila['pesqueria'],0,1);
	$pdf->Cell(0,6,'TIPO DE PERMISO: '.$fila['tpermiso'],0,1);
	
	$pdf->Ln(10);

	
$pdf->Output();
?>
