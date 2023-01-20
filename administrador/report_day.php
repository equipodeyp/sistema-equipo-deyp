<?php

require 'fpdf/fpdf.php';
require './conexiondb.php'; //puede que no lo necesiten
class PDF extends FPDF {
// -------------- CABECERA DE PAGINA --------------------
    function Header()
    {
        // // Logo
        // $this->Image('logo.png',10,8,33);
        // // Arial bold 15
        // $this->SetFont('Arial','B',15);
        // // Movernos a la derecha
        // $this->Cell(80);
        // // Título
        // $this->Cell(30,10,'Title',1,0,'C');
        // // Salto de línea
        // $this->Ln(20);
        $this->Image('./images_reports/estado.png', 7,7,23); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->Image('./images_reports/fgjem.png', 182,7,20);
        $this->Image('./images_reports/title.png',35,10,140);
        $this->Image('./images_reports/global.png',83,28,40);
    
    }
    
    // -------------- TERMINA CABECERA DE PAGINA --------------------
    
    // ------------ PIUE DE POAGINA -------------
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-22);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'R');
        $this->Image('./images_reports/pie de pagina.png',5,285,200);
    }
    // ------------ TERMINA PIE DE PAGINA -------------
// --------------------METODO PARA ADAPTAR LAS CELDAS------------------------------
	var $widths;
	var $aligns;

	function SetWidths($w) {
		//Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a) {
		//Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data, $setX) //yo modifique el script a  mi conveniencia :D
	{
		//Calculate the height of the row
		$nb = 0;
		for ($i = 0; $i < count($data); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		}

		$h = 8 * $nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h, $setX);
		//Draw the cells of the row
		for ($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h, 'DF');
			//Print the text
			$this->MultiCell($w, 8, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x + $w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h, $setX) {
		//If the height h would cause an overflow, add a new page immediately
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
			$this->SetX($setX);

			//volvemos a definir el  encabezado cuando se crea una nueva pagina
			$this->SetFont('Helvetica', 'B', 15);
			$this->Cell(10, 8, 'N', 1, 0, 'C', 0);
			$this->Cell(60, 8, 'Codigo', 1, 0, 'C', 0);
			$this->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
			$this->Cell(35, 8, 'Precio', 1, 1, 'C', 0);
			$this->SetFont('Arial', '', 12);

		}

		if ($setX == 100) {
			$this->SetX(100);
		} else {
			$this->SetX($setX);
		}

	}

	function NbLines($w, $txt) {
		//Computes the number of lines a MultiCell of width w will take
		$cw = &$this->CurrentFont['cw'];
		if ($w == 0) {
			$w = $this->w - $this->rMargin - $this->x;
		}

		$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);
		if ($nb > 0 and $s[$nb - 1] == "\n") {
			$nb--;
		}

		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while ($i < $nb) {
			$c = $s[$i];
			if ($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if ($c == ' ') {
				$sep = $i;
			}

			$l += $cw[$c];
			if ($l > $wmax) {
				if ($sep == -1) {
					if ($i == $j) {
						$i++;
					}

				} else {
					$i = $sep + 1;
				}

				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			} else {
				$i++;
			}

		}
		return $nl;
	}
// -----------------------------------TERMINA---------------------------------
}

//------------------OBTENES LOS DATOS DE LA BASE DE DATOS-------------------------
$data = new Conexion();
$conexion = $data->conect();

$strquery = "SELECT * FROM tb_productos";
$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);


$exp = "SELECT COUNT(*) as t FROM expediente";
$rexp = $mysqli->query($exp);
$fexp = $rexp->fetch_assoc();
//
$sujtts = "SELECT COUNT(*) as t from datospersonales WHERE relacional = 'NO'";
$rsujtts = $mysqli->query($sujtts);
$fsujtts = $rsujtts->fetch_assoc();
//
$suj = "SELECT COUNT(*) as t from determinacionincorporacion
INNER JOIN datospersonales ON datospersonales.id = determinacionincorporacion.id_persona
WHERE  convenio = 'formalizado' AND datospersonales.relacional = 'NO'";
$rsuj = $mysqli->query($suj);
$fsuj = $rsuj->fetch_assoc();
//
$sujact = "SELECT COUNT(*) as t from datospersonales WHERE estatus = 'sujeto protegido' AND relacional = 'NO'";
$rsujact = $mysqli->query($sujact);
$fsujact = $rsujact->fetch_assoc();
//
$sujresg  = "SELECT COUNT(*) as t FROM datospersonales
INNER JOIN medidas on datospersonales.id = medidas.id_persona
where medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'en ejecucion'";
$rsujresg = $mysqli->query($sujresg);
$fsujresg = $rsujresg->fetch_assoc();
//
$meds = "SELECT COUNT(*) as t FROM medidas";
$rmeds = $mysqli->query($meds);
$fmeds = $rmeds->fetch_assoc();
//
$medidastts = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA'";
$rmedidastts = $mysqli->query($medidastts);
$fmedidastts = $rmedidastts->fetch_assoc();

/* IMPORTANTE: si estan usando MVC o algún CORE de php les recomiendo hacer uso del metodo
que se llama *select_all* ya que es el que haria uso del *fetchall* tal y como ven en la linea 161
ya que es el que devuelve un array de todos los registros de la base de datos
si hacen uso de el metodo *select* hara uso de fetch y este solo selecciona una linea*/

//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADO------------------
$pdf->SetXY(15,40);
$pdf->SetFont('Helvetica', 'B', 15);
$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);
$pdf->Cell(60, 8, 'Codigo', 1, 0, 'C', 0);
$pdf->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
$pdf->Cell(35, 8, 'Precio', 1, 1, 'C', 0);
// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Arial', '', 12);

//El ancho de las celdas
$pdf->SetWidths(array(10, 60, 80, 35)); //???
// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','C','C','L'));

for ($i = 0; $i < count($data); $i++) {

	$pdf->Row(array($i + 1, $data[$i]['Codigo'], ucwords(strtolower(utf8_decode($data[$i]['Nombre']))), '$' . $data[$i]['Precio']), 15);
}

// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
?>


<!-- minuto 3
https://www.youtube.com/watch?v=2ucKCuFY6-c -->

<!-- https://www.youtube.com/watch?v=ZyaqjkuWYYU
https://www.youtube.com/watch?v=t3SuwL6GOxk
https://www.youtube.com/watch?v=KXnOryN4ENc -->