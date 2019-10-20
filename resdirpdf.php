<?php
session_start();
require('fpdf/fpdf.php');

    $conexion = new mysqli("localhost", "root", "", "sittec");
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }

    $sql="SELECT * from carreras";
    $sql2="SELECT * from tsolicitudes";

    $ncontrol = $_POST['ncontrol'];
    $objetivo = $_POST['obje'];

    $todo = "SELECT * FROM rdirector WHERE nombre = '$ncontrol' and objetivo = '$objetivo' ";

    $result = $conexion->query($sql);
    $result2 = $conexion->query($sql2);

    $resultado = $conexion -> query($todo);
    $row3 = $resultado->fetch_assoc();

    if ($result->num_rows > 0) 
    {
        $combobit="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $combobit .=" <option value=\"{$row['ncarrera']}\">{$row['ncarrera']}</option>"; 
        }
    }
    else
    {
        echo "No hubo resultados";
    }

    if ($result2->num_rows > 0)
    {
        $combobit2="";
        while ($row = $result2->fetch_array(MYSQLI_ASSOC))
        {
            $combobit2 .=" <option value\"{$row['id']}\">{$row['nsolicitud']}</option>";
        }
    }
    else {
        echo "No hubo resultados";
    }

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
    $this->Image('images/sep.png'); 
    $this->Cell(120);
    $this->Image('images/tecNM.png',125,10,70,20); 

    // Salto de línea
    $this->Ln(10);

    $this->SetFont('Arial','B',13);
	$this->Cell(40);
	$this->Cell(75,10, utf8_decode('ANEXO XLVI. DICTAMEN OFICIAL'),0,0,'C');

	$this->Ln(10);
    $this->SetFont('Arial','B',10);
    $this->Cell(40);
    $this->Cell(110,10, utf8_decode('Instituto Tecnológico de Colima'),0,0,'C');

    $this->Ln(10);

	$this->SetFont('Arial','I',10);
	$this->Cell(100);
	$this->Cell(80,10, utf8_decode('Lugar y fecha:'),0,0,'C');
    $this->Ln(8);
    $this->Cell(100);
    $this->Cell(80,10, utf8_decode('Dictamen No.: 1650'),0,0,'C');

	$this->Ln(10);
	$this->SetFont('Arial','B',10);
	$this->Cell(8);
	$this->Cell(50,10, utf8_decode('C. Jose Francisco Brizuela Ventura'),0,0,'C');
	$this->Ln(5);
	$this->Cell(2);
	$this->Cell(160,10, utf8_decode('Subdirector(a) Académico(a) o su equivalente en los Institutos Tecnológicos Desentralizados'),0,0,'C');
	$this->Ln(5);
	$this->Cell(3);
	$this->Cell(20,10, utf8_decode('PRESENTE'),0,0,'C');

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-40);

    $this->SetFont('Arial','I',8);
    $this->Cell(10);
    $this->Cell(20,10, utf8_decode(' c.c.p Interesado '),0,0,'C');
    $this->Ln(10);
    $this->Cell(10);
    $this->Cell(20,10, utf8_decode(' c.c.p Archivo '),0,0,'C');
    $this->Ln(15);
}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Ln(13);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(7);
$pdf->Cell(148,10, utf8_decode('Por este conducto y atendiendo la recomendación del Comité Académico comunico a'),0,0,'C');
$pdf->Ln(8);
$pdf->Cell(8);
$pdf->Cell(20,10, utf8_decode('usted, que'),0,0,'C');

$pdf->Cell(30,10, utf8_decode($row3['autoriza']),0,0,'C');

$pdf->Cell(35,10, utf8_decode('la solicitud del '),0,0,'C');
$pdf->Ln(8);
$pdf->Cell(8);
$pdf->Cell(20,10, utf8_decode('interesado'),0,0,'C');   

$pdf->Cell(60,10, utf8_decode($row3['nombre']),0,0,'C');

$pdf->Cell(8,10, utf8_decode('con'),0,0,'C');
$pdf->Ln(8);
$pdf->Cell(4);
$pdf->Cell(30,10, utf8_decode('referencia a'),0,0,'C');

$pdf->Cell(35,10, utf8_decode($row3['objetivo']),0,0,'C');

$pdf->Ln(20);
$pdf->Cell(7);
$pdf->Cell(90,10, utf8_decode('Sin otro particular por el momento, quedo en Usted.'),0,0,'C');


$pdf->Ln(50);
$pdf->Cell(77);
$pdf->Cell(35,10, utf8_decode('ATENTAMENTE '),0,0,'C');


/*$pdf->Ln(15);
$pdf->Cell(80);
$pdf->Cell(10,10, ($row3['firma']),0,0,'C');*/

$pdf->Ln(5);
$pdf->Cell(68);
$pdf->Cell(50,10, utf8_decode('Ana Rosa Braña Castillo'),0,0,'C');

$pdf->Ln(5);
$pdf->Cell(68);
$pdf->Cell(50,10, utf8_decode('Director(a) del Instituto '),0,0,'C');

$pdf->Output();
?>