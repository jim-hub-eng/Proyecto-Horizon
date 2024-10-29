<?php

    $conexion = new mysqli("localhost", "root", "", "horizon");
    require('./fpdf186/fpdf.php');

    class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'HORIZON MARKETING',0,1,'C');

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'REPORTE DE PRODUCTO DE HOGAR',0,1,'C');

    $this->SetFont('Arial','B',13);

        
    // Salto de línea
    $this->Ln(10);
    $this->Cell(10);
    $this->Cell(20,10,'#Id',1,0,'C',0);
    $this->Cell(20,10,'Producto',1,0, 'C',0);
    $this->Cell(70,10,'Descripcion',1,0, 'C',0);
    $this->Cell(20,10,'Precio',1,0, 'C',0);
    $this->Cell(20,10,'Descuento',1,1, 'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

    $consulta = "SELECT * FROM productos";
    $resultado = $conexion -> query($consulta);
    

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    while($row = $resultado -> fetch_assoc()){
        $pdf->Cell(10);
        $pdf->Cell(20,10,$row['id'],1,0,'C',0);
        $pdf -> Cell(20, 10, utf8_decode($row['nombre']), 0, 0, 'C', 0);
        $pdf->Cell(70,10,utf8_decode($row['descripcion']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($row['precio']),1,0,'C',0);
        $pdf->Cell(20,10,utf8_decode($row['descuento']),1,1,'C',0);

        
    }
    $pdf->Output("Reporte_administradores.pdf","D");




?>