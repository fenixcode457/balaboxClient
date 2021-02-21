<?php

require_once("../../fpdf/fpdf.php");
require_once '../../Conexion/conexion.php';


$id = $_POST['variable'];

$sql =  "SELECT `cotizacion`.*, `empresa`.*
FROM `cotizacion` 
	LEFT JOIN `empresa` ON `cotizacion`.`Empresa_idEmpresa` = `empresa`.`idEmpresa` where idCotizacion='$id';";


$result = mysqli_query($db, $sql);


$row = mysqli_fetch_array($result, MYSQLI_BOTH);  // asignar todo una tabla  de mysql a una variable 

 

$hola=$row[1];

$tiposProyecto = array("Diseño de pagina web", "Tienda en linea", "Aplicacion móvil", "Diseño de Logotipo", "Diseño de Imagen Corporativa");

$seleccion=$row["Servicio"];

$dato=$tiposProyecto[$seleccion-1];


function mysqlTimestampNow()
{

    date_default_timezone_set("America/Mexico_City");

    return date('d-m-Y');
}


$timestamp =  mysqlTimestampNow();





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
$pdf->MultiCell(100, 4, utf8_decode('Empresa solicitante:'), 0, 'J');

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(52, 49);
$pdf->MultiCell(180, 4, utf8_decode($row["NombreEmpresa"]), 0, 'J');



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

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(46, 64);
$pdf->MultiCell(180, 4, utf8_decode($dato), 0, 'J');

 //------------------------------------------------------------------
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(10, 80);
$pdf->MultiCell(180, 5, utf8_decode('Explicación:'), 0, 'J');

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(35, 80);
$pdf->MultiCell(180, 5, utf8_decode($row["Explicacion"]), 0, 'J');

//-------------------------------------------------
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(10, 120);
$pdf->MultiCell(180, 5, utf8_decode('Comentario.-'), 0, 'J');

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(40, 120);
$pdf->MultiCell(180, 5, utf8_decode($row["Comentario"]), 0, 'J');






$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(68, 160);
$pdf->MultiCell(180, 5, utf8_decode('C O S T O  A P R O X I M A D O'), 0, 'J');

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(70, 170);
$pdf->MultiCell(60, 5, utf8_decode($row[5]), 1, 'C');

//------------------------------------------------
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(80, 190);
$pdf->MultiCell(180, 5, utf8_decode('E X P L I C A C I O N'), 0, 'J');

$pdf->SetFont('Arial','', 12);
$pdf->SetXY(50, 200);
$pdf->MultiCell(100, 5, utf8_decode($row[6]), 1, 'J');






$pdf->Line(70, 250, 135, 250);
$pdf->SetFont('Arial','B', 12);
$pdf->SetXY(94, 255);
$pdf->MultiCell(80, 5, utf8_decode('F I R M A'), 0, 'J');




$pdf->Output();
