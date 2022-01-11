<?php
  require_once 'nav-bar.php';
  require_once '../procesos/reporteria/ReportesPDF.php';
  require_once '../clases/conexion.php';

  if(isset($_SESSION['user']))
  {
    while (ob_get_level())
    ob_end_clean();
    header("Content-Encoding: None", true);

    $query = "SELECT u.nombres, u.apellidos, v.descripcion,v.marca,v.tipo_matricula
              FROM vehiculos v
              INNER JOIN usuarios u
              ON v.id_usuario = u.id_usuario";

    $resultado = mysqli_query($con, $query);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(60,6,'NOMBRE CLIENTE',1,0,'C',1);
    $pdf->Cell(60,6,'DESCRIPCION VEHICULO',1,0,'C',1);
    $pdf->Cell(30,6,'MARCA',1,0,'C',1);
    $pdf->Cell(30,6,'MATRICULA',1,0,'C',1);

    $pdf->SetFont('Arial', '', 10);

    while($row = $resultado->fetch_assoc())
    {
      $pdf->Ln();
      $pdf->Cell(60,6,$row['nombres'].$row['apellidos'], 1,0,'C',1);
      $pdf->Cell(60,6,$row['descripcion'], 1,0,'C',1);
      $pdf->Cell(30,6,$row['marca'], 1,0,'C',1);
      $pdf->Cell(30,6,$row['tipo_matricula'], 1,0,'C',1);
    }
    $pdf->Output();
  }
  else
  {
    header('Location: ../index.php');
  }
?>
