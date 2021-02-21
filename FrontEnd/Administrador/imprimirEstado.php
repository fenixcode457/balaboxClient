<?php

require_once("../../fpdf/fpdf.php");
require_once '../../Conexion/conexion.php';
require_once '../../vendor/ruteo.php';
$ruta = new ruteo();

session_start();
if ($_SESSION["acceso"] != "1") {
    header("location:" . $ruta->ruta() . "/estadia/index.php");
    exit;
}


// Consulta para extrear los datos de la tabla empresa
$consulataProyectos =  "SELECT COUNT(idProyecto)  FROM proyecto";
$consulataOferta =  "SELECT COUNT(idOfertas)  FROM ofertas";



$resulContProye = mysqli_query($db, $consulataProyectos);
$resulContOfer = mysqli_query($db, $consulataOferta);


$contResultProye = mysqli_fetch_array($resulContProye, MYSQLI_BOTH);  // asignar todo una tabla  de mysql a una variable 
$contOfer = mysqli_fetch_array($resulContOfer, MYSQLI_BOTH);  // asignar todo una tabla  de mysql a una variable 

 



function mysqlTimestampNow()
{

    date_default_timezone_set("America/Mexico_City");

    return date('d-m-Y');
}


$timestamp =  mysqlTimestampNow();



/*---------------------------------------


Reporte pdf para ver datos de la empresa

--------------------------------------*/

class PDF extends FPDF
{
    //Cabecera de página
    function Header()
    {
    
 

        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(231,74,59);
        $this->SetDrawColor(231,74,59);
        $this->SetXY(0, 0);
        $this->Cell(210, 20, utf8_decode(''), 0, 1, 'C','true');
        $this->Image('assets/img/logo.png', 10, 6, 33);

        $this->SetXY(80, 9);
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(255,255,255);
        $this->Cell(98, 4, utf8_decode('Solicitud de cotización'), 0, 'C');

    }

    // Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Corporativo Cuernavaca, Torre 3, 604, Villas del Lago 100, 62374 Cuernavaca, Mor.',0,0,'C');
}

}


//Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();






//Texto Explicativo
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(83, 30);
$pdf->MultiCell(100, 4, utf8_decode('Datos del proyecto.'), 0, 'c');

$pdf->Line(10, 38, 200, 38); // 50mm from each edge


//Texto Explicativo

$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(10, 49);
$pdf->MultiCell(100, 4, utf8_decode('Total proyectos:'), 0, 'J');

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(52, 49);
$pdf->MultiCell(180, 4, utf8_decode($contResultProye[0]), 0, 'J');



$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(120, 49);
$pdf->MultiCell(100, 4, utf8_decode('Fecha de contestacion:'), 0, 'J');

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(168, 49);
$pdf->MultiCell(180, 4, utf8_decode($timestamp), 0, 'J');



//---------------------------------------------
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(10, 64);
$pdf->MultiCell(100, 4, utf8_decode('Tipo de Proyecto:'), 0, 'J');


$pdf->Line(67.5, 255, 135, 255);
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(90, 260);
$pdf->MultiCell(80, 5, utf8_decode('F I R M A'), 0, 'J');




$pdf->Output();
