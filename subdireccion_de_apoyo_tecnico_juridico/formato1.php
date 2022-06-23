<?php
// $folio = $_GET['folio'];
    require("../fpdf182/fpdf.php");
    require("conectar.php");
    class PDF extends FPDF{
        function Header(){
            //$this->Cell(30);
            $this->SetFont("Arial", "", 14);
            $this->Image("../image/formatos/lge.png", 1, 1, 3.97, 2.98);
            $this->Cell(4);
            $this->Image("../image/formatos/logo.png", 17, 1 , 3.09, 3.09);
            $this->Cell(1);
            $this->Cell(10, 1, utf8_decode("FISCALÍA GENERAL DE JUSTICIA"), 0, 1, 'C');
            $this->Cell(1);
            $this->Cell(18, 3, utf8_decode("DEL ESTADO DE MÉXICO"), 0, 1, 'C');
            $this->SetFont("Arial", "", 10);
            $this->Cell(4);
            $this->Cell(18, 0.5, utf8_decode("UNIDAD DE PROTECCIÓN DE SUJETOS QUE INTERVIENEN EN EL"), 0, 4, 'J');
            $this->Cell(1);
            $this->Cell(18, 0.5, utf8_decode("PROCEDIMIENTOPENAL O DE EXTINCION DE DOMINIO"), 0, 4, 'J');

        }
        function Body(){
            $my = conectObj();
            $sql = "select fol_exp from expediente WHERE fol_exp ='UPSIPPED/SAR/TOL-TOL/001/2021'";
            $stm = $my->prepare($sql);
            $stm->execute();
            $stm->bind_result($fol_exp);
            $stm->store_result();
            $hay = $stm->num_rows;
            if($hay==0){
             $this->Cell(10, 3, "No hay registros que mostrar", 1, 2, 'C');
           }else
            {
                 $this->SetFont("Arial", '', 36);
                 $this->Ln();
                 $this->SetTextColor(62, 72, 204);
                // $this->Cell(7,1,"fol_exp", 1, 0, 'C');
            //     $this->Cell(3,1,"Sexo", 1, 0, 'C');
            //     $this->Cell(2,1,"Edad", 1, 0, 'C');
            //     $this->Cell(7,1,"Correo", 1, 1, 'C');
                 $this->SetFont("Arial", '', 14);
                 $this->SetTextColor(0, 0, 0);
                while($stm->fetch())
                {
                    $fol_exp = utf8_decode($fol_exp);
                    $this->Cell(18,5,$fol_exp, 1, 1, 'C');
                    $this->SetFont("Arial", '', 12);
                    $this->Cell(18,1,utf8_decode("AÑO DE APERTURA _ 2022___"), 0, 0, 'L');
                    $this->Cell(-8,1,utf8_decode("AÑO DE CIERRE"), 0, 1, 'C');
                    $this->Cell(19,1,utf8_decode("DESCRIPCIÓN DEL CONTENIDO"), 0, 6, 'L');
                    $this->Cell(19,1,utf8_decode("SOLICITUD DE LA INCORPORACIÓN"), 1,1 , 'L');
                    $this->Cell(19,2,utf8_decode("VALORACION JURIDICA"), 1, 6, 'C');
                    $this->Cell(19,2,utf8_decode("OFICIO ANALISIS DE RIESGO"), 1, 6, 'C');
                    $this->Cell(19,2,utf8_decode("ANEXO/OTROS (DESCRIBIR)"), 1, 6, 'C');
                     //$this->Cell(2,1,$usuario, 1, 0, 'C');
                    // $this->Cell(7,1,$sexo, 1, 1, 'C');
              }

              function ImprovedTable($header, $data)
{
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

            }
             $stm->close();

    }
        function Footer(){
            // $this->SetY(-2);
            // $this->SetFont("Arial", 'I', 10);
            // $this->Cell(0, 1, "Como generar archivos PDF con PHP", 0, 0, 'C');
            $this->SetY(-15);
            $this->SetFont('Arial', '',8);
            $this->cell(0,28,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    $pdf = new PDF('P', 'cm','letter');
    // Títulos de las columnas
    //$header = array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
    $pdf->AliasNbPages();
  //  $pdf->SetAuthor("CableNaranja", true);
    $pdf->SetTitle("Sintesis de Solicitud", true);
    $pdf->AddPage();
    $pdf->Body();
    // Encabezado del documento
    $pdf->Output();
    $pdf->Output("Documento Final.pdf", 'F');
?>
