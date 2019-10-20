
<?php
session_start();
require('fpdf/fpdf.php');

    $conexion = new mysqli("localhost", "root", "", "sittec");
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }

    $sql="SELECT * from carreras";
    $sql2="SELECT * from tsolicitudes";

    $usuario = $_POST['ncontrol'];
    $objetivo = $_POST['obje'];

    $todo="SELECT * FROM rcomite WHERE ncontrol = $usuario and solicito = '$objetivo' ";

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
	$this->Cell(110,10, utf8_decode('ANEXO XLIV. RECOMENDACIÓN DEL COMITE ACADEMICO PARA'),0,0,'C');
    $this->Ln(8);
    $this->Cell(18);
    $this->Cell(40,8, utf8_decode('ESTUDIANTES'),0,0,'C');

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
    $this->Cell(80,10, utf8_decode('No. de recomendación: 1446'),0,0,'C');

	$this->Ln(10);
	$this->SetFont('Arial','B',10);
	$this->Cell(8);
	$this->Cell(50,10, utf8_decode('C. Ana Rosa Braña Castillo'),0,0,'C');
	$this->Ln(5);
	$this->Cell(9);
	$this->Cell(80,10, utf8_decode('Director(a) del Instituto Tecnológico de Colima'),0,0,'C');
	$this->Ln(5);
	$this->Cell(5);
	$this->Cell(30,10, utf8_decode('PRESENTE'),0,0,'C');

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-40);

    $this->SetFont('Arial','I',8);
    $this->Cell(10);
    $this->Cell(20,10, utf8_decode(' c.c.p Archivo '),0,0,'C');
    $this->Ln(15);
}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Ln(13);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10);
$pdf->Cell(130,10, utf8_decode('Por este motivo le informo, que en reunión del Comité Academico, celebrada '),0,0,'C');
$pdf->Ln(8);
$pdf->Cell(9);
$pdf->Cell(7,10, utf8_decode('el'),0,0,'C');

$pdf->Cell(2);
$pdf->Cell(20,10,($row3['fecha']),0,0,'C');

$pdf->Cell(90,10, utf8_decode('del año en curso, asentada en el libro de actas no.'),0,0,'C');      

$pdf->Cell(5,10,('487'),0,0,'C');  

$pdf->Cell(20,10, utf8_decode('en la hoja'),0,0,'C');

$pdf->Ln(8);
$pdf->Cell(10);
$pdf->Cell(22,10, utf8_decode('con folio no. '),0,0,'C');  

$pdf->Cell(7,10,('264'),0,0,'C');

$pdf->Cell(90,10, utf8_decode('y en virtud de haber sido analizada la situación del'),0,0,'C');
$pdf->Ln(8);
$pdf->Cell(9);
$pdf->Cell(20,10, utf8_decode('estudiante'),0,0,'C');
$pdf->Cell(75,10, utf8_decode($row3['suscribe']),0,0,'C');
$pdf->Cell(22,10, utf8_decode('de la carrera'),0,0,'C');
$pdf->Cell(50,10, utf8_decode($row3['carrera']),0,0,'C');
$pdf->Cell(7,10, utf8_decode('con'),0,0,'C');

$pdf->Ln(10);
$pdf->Cell(9);
$pdf->Cell(34,10, utf8_decode('número de control '),0,0,'C');
$pdf->Cell(19,10, $_POST['ncontrol'],0,0,'C');
$pdf->Cell(18,10, utf8_decode('y quien'),0,0,'C');
$pdf->Cell(15,10, utf8_decode('solicita'),0,0,'C');
$pdf->Cell(40,10, utf8_decode($row3['solicito']),0,0,'C');

$pdf->Cell(50,10, utf8_decode('(SI)(NO) SE RECOMIENDA:'),0,0,'C');

$pdf->Ln(8);
$pdf->Cell(8);
$pdf->Cell(60,10, utf8_decode($row3['recomienda']),0,0,'C');

$pdf->Ln(20);
$pdf->Cell(10);
$pdf->Cell(45,10, utf8_decode('Por los siguientes motivos: '),0,0,'C');

$pdf->Ln(10);
$pdf->Cell(10);
$pdf->Cell(175,10, utf8_decode($row3['motivos']),0,0,'C');

$pdf->Ln(40);
$pdf->Cell(77);
$pdf->Cell(35,10, utf8_decode('ATENTAMENTE '),0,0,'C');

$pdf->Ln(15);
$pdf->Cell(37);
$pdf->Cell(110,10, utf8_decode('Nombre y firma del Presidente(a) del Comité Académico '),0,0,'C');

$pdf->Output();
?>