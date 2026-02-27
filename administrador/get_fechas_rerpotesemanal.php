<?php
// echo "archivo para obtener fechas de reporte semanal<br>";
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
$fecha_actual = date("Y-m-d");
// echo "<br>";
$year = date("Y");
// echo "<br>";
$day = date("l");
// echo "<br>";
switch ($day) {
  case 'Monday':
    $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual));
    $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
    $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 6 day"));
    ////////////////////fechas de reporte semanal
    $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
    $diafinsemant = date( "j", $diafinsemanaanterior);
    $diainicio = strtotime($fecha_inicio);
    $diaini = date( "j", $diainicio);
    $diafinal = strtotime($fecha_fin);
    $diafin = date( "j", $diafinal);
    /////////////////////////////////////////////////////////
    if ($diaini < 10) {
      $diaini = '0'.$diaini;
    }else {
      $diaini = $diaini;
    }
    /////////////////////////////////////////////////////////
    if ($diafin < 10) {
      $diafin = '0'.$diafin;
    }else {
      $diafin = $diafin;
    }
    /////////////////////////////////////////////////////////
    if ($diaini > $diafin) {
      echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
    } else {
      echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    }
    if ($diaini > $diafin) {
      $mesreport = date('n');
      if ($mesreport < 10) {
        $mesreportpdf = '0'.$mesreport;
      }else {
        $mesreportpdf = $mesreport;
      }
    $fechainicio_pdf =date('Y').'-01-01';
    $fechafin_pdf =$fecha_finsemanaanterior;
    $fechainicial_reporte_pdf =date('Y').'-0'.date('n', strtotime('-0 month')).'-'.$diaini;
    $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+6 day'));
    } else {
      if ($mesreport < 10) {
        $mesreportpdf = '0'.$mesreport;
      }else {
        $mesreportpdf = $mesreport;
      }
      $fechainicio_pdf =date('Y').'-01-01';
      $fechafin_pdf =$fecha_finsemanaanterior;
      $fechainicial_reporte_pdf =date('Y').'-'.$mesreportpdf.'-'.$diaini;
      $fechafinal_reporte_pdf =date('Y').'-'.$mesreportpdf.'-'.$diafin;
    }
    break;
  case 'Tuesday':
    $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 1 day"));
    $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
    $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 5 day"));
    ////////////////////fechas de reporte semanal
    $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
    $diafinsemant = date( "j", $diafinsemanaanterior);
    $diainicio = strtotime($fecha_inicio);
    $diaini = date( "j", $diainicio);
    $diafinal = strtotime($fecha_fin);
    $diafin = date( "j", $diafinal);
    if ($diaini > $diafin) {
      echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
    } else {
      echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
    }
    /////////////////////////////////////////////////////////
    if ($diaini < 10) {
      $diaini = '0'.$diaini;
    }else {
      $diaini = $diaini;
    }
    /////////////////////////////////////////////////////////
    if ($diafin < 10) {
      $diafin = '0'.$diafin;
    }else {
      $diafin = $diafin;
    }
    /////////////////////////////////////////////////////////
    if ($diaini > $diafin) {
      $mesact = date('n', strtotime('-0 month'));
      if ($mesact < 10) {
        $mesactpdf = '0'.$mesact;
      }else {
        $mesactpdf = $mesact;
      }
      $fechainicio_pdf =date('Y').'-01-01';
      $fechafin_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini-1;
      $fechainicial_reporte_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini;
      $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+5 day'));
    } else {
      $fechainicio_pdf =date('Y').'-01-01';
      $fechafin_pdf =$fecha_finsemanaanterior;
      $fechainicial_reporte_pdf =date('Y').'-'.date('n').'-'.$diaini;
      $fechafinal_reporte_pdf =date('Y').'-'.date('n').'-'.$diafin;
    }
    break;
    case 'Wednesday':
      $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 2 day"));
      $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
      $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 4 day"));
      ////////////////////fechas de reporte semanal
      $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
      $diafinsemant = date( "j", $diafinsemanaanterior);
      $diainicio = strtotime($fecha_inicio);
      $diaini = date( "j", $diainicio);
      $diafinal = strtotime($fecha_fin);
      $diafin = date( "j", $diafinal);
      if ($diaini > $diafin) {
        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
      } else {
        echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
      }
      /////////////////////////////////////////////////////////
      if ($diaini < 10) {
        $diaini = '0'.$diaini;
      }else {
        $diaini = $diaini;
      }
      /////////////////////////////////////////////////////////
      if ($diafin < 10) {
        $diafin = '0'.$diafin;
      }else {
        $diafin = $diafin;
      }
      /////////////////////////////////////////////////////////
      if ($diaini > $diafin) {
        $mesact = date('n', strtotime('-0 month'));
        if ($mesact < 10) {
          $mesactpdf = '0'.$mesact;
        }else {
          $mesactpdf = $mesact;
        }
        $fechainicio_pdf =date('Y').'-01-01';
        $fechafin_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini-1;
        $fechainicial_reporte_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini;
        $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+4 day'));
      } else {
        $fechainicio_pdf =date('Y').'-01-01';
        $fechafin_pdf =$fecha_finsemanaanterior;
        $fechainicial_reporte_pdf =date('Y').'-0'.date('n').'-'.$diaini;
        $fechafinal_reporte_pdf =date('Y').'-0'.date('n').'-'.$diafin;
      }
      break;
      case 'Thursday':
        $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 3 day"));
        $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
        $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 3 day"));
        ////////////////////fechas de reporte semanal
        $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
        $diafinsemant = date( "j", $diafinsemanaanterior);
        $diainicio = strtotime($fecha_inicio);
        $diaini = date( "j", $diainicio);
        $diafinal = strtotime($fecha_fin);
        $diafin = date( "j", $diafinal);
        if ($diaini > $diafin) {
          echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
        } else {
          echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
        }
        /////////////////////////////////////////////////////////
        if ($diaini < 10) {
          $diaini = '0'.$diaini;
        }else {
          $diaini = $diaini;
        }
        /////////////////////////////////////////////////////////
        if ($diafin < 10) {
          $diafin = '0'.$diafin;
        }else {
          $diafin = $diafin;
        }
        /////////////////////////////////////////////////////////
        if ($diaini > $diafin) {
          $mesact = date('n', strtotime('-0 month'));
          if ($mesact < 10) {
            $mesactpdf = '0'.$mesact;
          }else {
            $mesactpdf = $mesact;
          }
          $fechainicio_pdf =date('Y').'-01-01';
          $fechafin_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini-1;
          $fechainicial_reporte_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini;
          $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+3 day'));
        } else {
          $mesreport = date('n');
          if ($mesreport < 10) {
            $mesreportpdf = '0'.$mesreport;
          }else {
            $mesreportpdf = $mesreport;
          }
          $fechainicio_pdf =date('Y').'-01-01';
          $fechafin_pdf =$fecha_finsemanaanterior;
          $fechainicial_reporte_pdf =date('Y').'-'.$mesreportpdf.'-'.$diaini;
          $fechafinal_reporte_pdf =date('Y').'-'.$mesreportpdf.'-'.$diafin;
        }
        break;
        case 'Friday':
          $fecha_inicio =  date("Y-m-d",strtotime($fecha_actual." - 4 day"));
          $fecha_finsemanaanterior =  date("Y-m-d",strtotime($fecha_actual." - 5 day"));
          $fecha_fin =  date("Y-m-d",strtotime($fecha_actual." + 2 day"));
          ////////////////////fechas de reporte semanal
          $diafinsemanaanterior = strtotime($fecha_finsemanaanterior);
          $diafinsemant = date( "j", $diafinsemanaanterior);
          $diainicio = strtotime($fecha_inicio);
          $diaini = date( "j", $diainicio);
          $diafinal = strtotime($fecha_fin);
          $diafin = date( "j", $diafinal);
          if ($diaini > $diafin) {
            echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." DE ".$meses[date('n')-1]." AL ".$diafin. " DE ".$meses[date('n')]. " DEL ".date('Y'); echo '</h1>';
          } else {
            echo '<h1 style="text-align:center">' ; echo "Reporte Semanal <br> DEL ".$diaini." AL ".$diafin. " DE ".$meses[date('n')-1]. " DEL ".date('Y'); echo '</h1>';
          }
          /////////////////////////////////////////////////////////
          if ($diaini < 10) {
            $diaini = '0'.$diaini;
          }else {
            $diaini = $diaini;
          }
          /////////////////////////////////////////////////////////
          if ($diafin < 10) {
            $diafin = '0'.$diafin;
          }else {
            $diafin = $diafin;
          }
          /////////////////////////////////////////////////////////
          if ($diaini > $diafin) {
            $mesact = date('n', strtotime('-0 month'));
            if ($mesact < 10) {
              $mesactpdf = '0'.$mesact;
            }else {
              $mesactpdf = $mesact;
            }
            $fechainicio_pdf =date('Y').'-01-01';
            $fechafin_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini-1;
            $fechainicial_reporte_pdf =date('Y').'-'.$mesactpdf.'-'.$diaini;
            $fechafinal_reporte_pdf =date('Y-m-d', strtotime('+2 day'));
          } else {
            $mesreport = date('n');
            if ($mesreport < 10) {
              $mesreportpdf = '0'.$mesreport;
            }else {
              $mesreportpdf = $mesreport;
            }
            $fechainicio_pdf =date('Y').'-01-01';
            $fechafin_pdf =$fecha_finsemanaanterior;
            $fechainicial_reporte_pdf =date('Y').'-'.$mesreportpdf.'-'.$diaini;
            $fechafinal_reporte_pdf =date('Y').'-'.$mesreportpdf.'-'.$diafin;
          }
          break;

  default:
    // code...
    break;
}
?>
