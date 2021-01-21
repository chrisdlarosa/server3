<?php
require('../fpd/fpdf.php');



class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(110);
    // Título
    $this->Cell(80,10,'Reporte de servicios',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

include '../scripts/database.php';
$conexion = new Database();
$conexion->conectarBD();
$consulta="SELECT*FROM servicios";
$servicios = $conexion->seleccionar($consulta);



// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);
$pdf->Cell(10);
$pdf->Cell(12,10,'Cve',1,0,'C',0);
$pdf->Cell(30,10,'Nombre',1,0,'C',0);
$pdf->Cell(128,10,'Descripcion',1,1,'C',0);
$pdf->SetFont('Times','',12);
foreach ($servicios as $servicio) {
    $pdf->Cell(10);
    $pdf->Cell(12,10,$servicio->cve,1,0,'C',0);
    $pdf->Cell(30,10,$servicio->nombre,1,0,'C',0);
    $pdf->Cell(128,10,$servicio->descripcion,1,1,'C',0);
}

$pdf->Output();
?>