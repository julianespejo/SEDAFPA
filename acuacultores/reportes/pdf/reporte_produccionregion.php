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

	$this->SetFont('Arial','B',14);
	$this->Text(60,35,utf8_decode('REPORTE DE PRODUCCIÓN POR REGIÓN'),0,'C', 0);
	$this->Ln(10);
}


}


	$con = new DB;
	$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(0);

	
	$pdf->Ln(10);
	
	$pdf->SetWidths(array(65, 60, 55, 50, 20));
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(66,33,00);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array(utf8_decode('REGIÓN'), utf8_decode('PRODUCCIÓN'), 'UNIDAD'));
			}
	
	$historial = $con->conectar();	
	$strConsulta = "SELECT d.region,sum(t.capturacosecha) as capturacosecha 
					  FROM datosacuicultor d,tecnicoeconomico t 
					  WHERE d.idacuicultor=t.id_acuicultor GROUP BY region";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
			$pdf->SetFont('Arial','',10);
			
			if($i%2 == 1)
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['region'], $fila['capturacosecha'], 'TONELADAS'));
			}
			else
			{
			$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['region'], $fila['capturacosecha'], 'TONELADAS'));
			}
		}

$pdf->Output();
?>
