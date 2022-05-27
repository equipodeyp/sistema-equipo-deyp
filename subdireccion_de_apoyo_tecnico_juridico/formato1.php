<?php
    require("../fpdf182/fpdf.php");
    require("conectar.php");
    class PDF extends FPDF{
        function Header(){
            $this->SetFont("Arial", "", 12);
            $this->Image("../image/formatos/lge.png", 0, 0);
            $this->Cell(6);
            $this->Cell(10, 2, utf8_decode("FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO"), 1, 1, 'C');

            // -$this->Image("../image/formatos/ups5.png", 5, 5);
            // $this->Cell(6);
        }
        function Body(){
            $my = conectObj();
            // $sql = "select nombre, area, usuario, sexo from usuarios order by nombre";
            // $stm = $my->prepare($sql);
            // $stm->execute();
            // $stm->bind_result($nombre, $area, $usuario, $sexo);
            // $stm->store_result();
            // $hay = $stm->num_rows;
            // if($hay==0){
                $this->Cell(10, 3, "No hay registros que mostrar", 1, 1, 'C');
            // }else{
            //     $this->SetFont("Arial", 'B', 14);
            //     $this->Ln();
            //     $this->SetTextColor(62, 72, 204);
            //     $this->Cell(7,1,"Nombre", 1, 0, 'C');
            //     $this->Cell(3,1,"Sexo", 1, 0, 'C');
            //     $this->Cell(2,1,"Edad", 1, 0, 'C');
            //     $this->Cell(7,1,"Correo", 1, 1, 'C');
            //     $this->SetFont("Arial", '', 14);
            //     $this->SetTextColor(0, 0, 0);
            //     while($stm->fetch()){
            //         $nombre = utf8_decode($nombre);
            //         $this->Cell(7,1,$nombre, 1, 0, 'C');
            //         $this->Cell(3,1,$area, 1, 0, 'C');
            //         $this->Cell(2,1,$usuario, 1, 0, 'C');
            //         $this->Cell(7,1,$sexo, 1, 1, 'C');
            //     }
            }
            // $stm->close();
      //  }
        function Footer(){
            // $this->SetY(-2);
            // $this->SetFont("Arial", 'I', 10);
            // $this->Cell(0, 1, "Como generar archivos PDF con PHP", 0, 0, 'C');
        }
    }
    $pdf = new PDF('P', 'cm','letter');
  //  $pdf->SetAuthor("CableNaranja", true);
    $pdf->SetTitle("Sintesis de Solicitud", true);
    $pdf->AddPage();
    $pdf->Body();
    // Encabezado del documento
    $pdf->Output();
    $pdf->Output("Documento Final.pdf", 'F');
?>
