<?php
require('./fpdf/fpdf.php');
include("conexion.php");
session_start ();
$name = $_SESSION['usuario'];
if (!isset($name)) {
  header("location: ../logout.php");
}
$verifica_update_person = 1;
$_SESSION["verifica_update_person"] = $verifica_update_person;
$sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
$result = $mysqli->query($sentencia);

class PDF extends FPDF
{
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
    $this->Image('./images_reports/estado.png', 7,7,23);
    $this->Image('./images_reports/fgjem.png', 182,7,20);
    $this->Image('./images_reports/title.png',35,15,140);
    $this->Image('./images_reports/global.png',83,30,40);
  
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

// ---------  SCRIPT FPDF Table with MultiCells   -----------

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

function Row($data, $setX)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h, $setX);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h, 'DF');
        //Print the text
        $this->MultiCell($w,8,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h, $setX)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger){
        $this->AddPage($this->CurOrientation);
            $this->SetX($setX);

            $this->SetFont('Helvetica', 'B', 15);
            $this->Cell(10, 8, 'ESTATUS', 'B', 0, 'C', 0);
            $this->Cell(60, 8, 'TOTAL', 'B', 0, 'C', 0);

}

    if ($setX == 100) {
        $this->SetX(100);
    } else {
        $this->SetX($setX);
    }
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



// -------------    TERMINA  SCRIPT ------------------

}





// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADOD DE LA TABLA------------------
// $pdf->SetX(5);
// $pdf->SetY(45);
// $pdf->SetFont('Times','B',11);
// $pdf->Cell(60,8,utf8_decode('CONCEPTO'),1,0,'C',0);
// $pdf->Cell(20,8,utf8_decode('TOTAL'),1,0,'C',0);
// $pdf->SetX(10);
$pdf->SetFont('Times','B',11);

$pdf->Cell(190, 57,'Del 01 de Junio de 2021 al '. date('d') . ' de '. utf8_decode( date('M')). ' de '. date('Y'), 0,1,'C');

$pdf->SetX(30);
$pdf->SetY(45);
$pdf->SetFont('Times','B',11);
$pdf->Cell(60,8,utf8_decode('ESTATUS'),1,0,'C',0);
$pdf->Cell(20,8,utf8_decode('TOTAL'),1,0,'C',0);


// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(127, 139, 125); //Color de fondo RGB
$pdf->SetDrawColor(61,61,61);//Color de la linea RGB

$pdf->SetFont('Arial', '', 11);

// $pdf->SetWidths(array(50,35)); // Ancho de las celdas
?>



<?php
// ------- ENCABEZADO Y PIE DE PAGINA MANUAL------------------

// $pdf->Image('./images_reports/estado.png', 7,7,23);
// $pdf->Image('./images_reports/fgjem.png', 182,7,20);
// $pdf->Image('./images_reports/title.png',35,15,140);
// $pdf->Image('./images_reports/global.png',83,30,40);
// $pdf->Image('./images_reports/pie de pagina.png',5,285,200);
// $pdf->Cell(50,14, utf8_decode('Penal o de Extinción de Dominio del Estado de México. '));


// -------    TERMINA   ------------------


// ------- CREA FILAS CON DATOS DATOS ALEATOREOS------------------

// for($i=1;$i<=40;$i++){
//     // $pdf->Cell(0,10, utf8_decode('Imprimiendo línea número ').$i,0,1);
//     $pdf->Ln(0.6);
//     $pdf->SetX(10);

//     $pdf->Cell(10,8,$i,'B',0,'C',1);
//     $pdf->Cell(60,8,'Leche','B',0,'C',1);
//     $pdf->Cell(30,8,'$'.$i,'B',0,'C',1);
//     $pdf->Cell(35,8,'2'.$i,'B',0,'C',1);
//     $pdf->Cell(50,8,'3'.$i,'B',1,'C',1);
    
// }

// -------    TERMINA   ------------------


// ------- AGREGAR UNA NUEVA PAGINA MANUALMENTE ------------------

// $pdf->AddPage();
// $pdf->SetFont('Times','',14);
// $pdf->Image('./images_reports/estado.png', 7,7,23);
// $pdf->Image('./images_reports/fgjem.png', 182,7,20);
// $pdf->Image('./images_reports/title.png',35,15,140);
// $pdf->Image('./images_reports/global.png',83,30,40);
// $pdf->Image('./images_reports/pie de pagina.png',5,285,200);

// $pdf->AddPage();
// $pdf->SetFont('Times','',14);
// $pdf->Image('./images_reports/estado.png', 7,7,23);
// $pdf->Image('./images_reports/fgjem.png', 182,7,20);
// $pdf->Image('./images_reports/title.png',35,15,140);
// $pdf->Image('./images_reports/global.png',83,30,40);
// $pdf->Image('./images_reports/pie de pagina.png',5,285,200);


// -------    TERMINA   ------------------





$pdf->Output();
?>



<!-- minuto 3
https://www.youtube.com/watch?v=2ucKCuFY6-c -->

<!-- https://www.youtube.com/watch?v=ZyaqjkuWYYU
https://www.youtube.com/watch?v=t3SuwL6GOxk
https://www.youtube.com/watch?v=KXnOryN4ENc -->