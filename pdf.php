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
    $carrera = $_POST['carrera'];

    $todo="SELECT * FROM solicitud WHERE num_control = $usuario AND objetivo = '$objetivo' AND carrera = '$carrera' ";

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

    $this->Ln(10);

    $this->SetFont('Arial','I',13);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->Cell(110,10, utf8_decode('Instituto Tecnológico de Colima'),0,0,'C');

    // Salto de línea
    $this->Ln(15);

    $this->SetFont('Arial','B',16);
	$this->Cell(40);
	$this->Cell(110,10, utf8_decode('INSTITUTO TECNOLÓGICO DE COLIMA'),0,0,'C');
	$this->Ln(10);

	$this->SetFont('Arial','I',10);
	$this->Cell(100);
	$this->Cell(80,10, utf8_decode('Villa de Álvarez, Col, Fecha:'),0,0,'C');

	$this->Ln(10);
	$this->SetFont('Arial','B',10);
	$this->Cell(10);
	$this->Cell(80,10, utf8_decode('C. LIC. JOSÉ FRANCISCO BRIZUELA VENTURA'),0,0,'C');
	$this->Ln(5);
	$this->Cell(16);
	$this->Cell(80,10, utf8_decode('JEFE DE LA DIVISIÓN DE ESTUDIOS PROFESIONALES'),0,0,'C');
	$this->Ln(5);
	$this->Cell(-17);
	$this->Cell(80,10, utf8_decode('P R E S E N T E.'),0,0,'C');

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-40);

    $this->SetFont('Arial','I',8);
    $this->Cell(10);
    $this->Cell(20,10, utf8_decode(' c.p. interesado '),0,0,'C');
    $this->Ln(15);

    $this->Image('images/tec.png',10,270,20,20); 
    
    // Arial italic 8
    $this->SetFont('Arial','B',8);
    // Número de página
    $this->Cell(0,10, utf8_decode(' Año 2018, Centenario del natalicio del escritor mexicano y universal Juan José Arreola '),0,0,'C');

    $this->Ln(5);
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode(' Av. Tecnológico No 1.,C.P. 28976, Villa de Álvarez, Col. '),0,0,'C');

    $this->Ln(5);
    $this->Cell(0,10, utf8_decode(' Tel / Fax (01 312) 312-9920, 314-0933, 312-6393, 314-0683 www.itcolima.edu.mx '),0,0,'C');
    $this->Image('images/aprovado.jpg',166,270,40,20); 
}
}

/*require 'subirsolicitud.php';
$sql = "SELECT * FROM rcomite";
$resultado = $mysqli->query($sql);*/



$pdf = new PDF();
$pdf->AddPage();
//while ($row = $resultado->fetch_assoc()) {
       /* while ($row = mysqli_fetch_array($resultado)) {
        $query2 = "SELECT * FROM rcomite WHERE id=". $row['id'];
        $persona= $conexion->query($query2);
        $persona = $persona->fetch_assoc();*/
$pdf->Ln(7);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15);
$pdf->Cell(20,10, utf8_decode('El que suscribe C.'),0,0,'C');  
// $resultado = $conexion -> query($nombre);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['suscribe'];
//                             } else {
//                                 "0";
//                             }
$pdf->Cell(90,10, utf8_decode($row3['suscribe']),0,0,'C');

$pdf->Ln(10);
$pdf->Cell(15);
$pdf->Cell(30,10, utf8_decode('Estudiante del semestre'),0,0,'C');
// $resultado = $conexion -> query($sem);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['semestre'];
//                             } else {
//                                 "0";
//                             }
$pdf->Cell(-5);
$pdf->Cell(30,10, $row3['semestre'],0,0,'C');

$pdf->Cell(4);
$pdf->Cell(10,10, utf8_decode('de la carrera:'),0,0,'C');
// $resultado = $conexion -> query($carrera);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['carrera'];
//                             } else {
//                                 "0";
//                             }

$pdf->Cell(55,10, $row3['carrera'],0,0,'C');
$pdf->Ln(10);
$pdf->Cell(15);
$pdf->Cell(30,10, utf8_decode('Con número de Control:'),0,0,'C'); 
$pdf->Cell(30,10, $row3['num_control'],0,0,'C');                                

$pdf->Ln(10);
$pdf->Cell(7);
$pdf->Cell(65,10, utf8_decode('Solicito de la manera más atenta:'),0,0,'C');

$pdf->Cell(30,10, $row3['objetivo'],0,0,'C');

$pdf->Ln(10);
$pdf->Cell(8);
$pdf->Cell(70,10, utf8_decode('Por los siguientes motivos académicos:'),0,0,'C');
// $resultado = $conexion -> query($razon1);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['razon_acade'];
//                             } else {
//                                 "0";
//                             }
$pdf->Cell(30,20, utf8_decode ($row3['razon_acade']),0,0,'C');

$pdf->Ln(30);
$pdf->Cell(9);
$pdf->Cell(35,10, utf8_decode('Motivos Personales:'),0,0,'C');
// $resultado = $conexion -> query($razon2);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['razon_personal'];
//                             } else {
//                                 "0";
//                             }
$pdf->Cell(-30);
$pdf->Cell(170,20, utf8_decode ($row3['razon_personal']),0,0,'C');

$pdf->Ln(30);
$pdf->Cell(7);
$pdf->Cell(15,10, utf8_decode('Otros:'),0,0,'C');
// $resultado = $conexion -> query($razon3);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['otro'];
//                             } else {
//                                 "0";
//                             }
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(160,10, utf8_decode ($row3['otro']),0,0,'C');


$pdf->Ln(20);
$pdf->Cell(9);
$pdf->Cell(39,10, utf8_decode('A T E N T A M E N T E '),0,0,'C');

$pdf->Ln(7);
$pdf->Cell(12);
$pdf->Cell(30,10, $row3['firma'],0,0,'C');

$pdf->Ln(8);
$pdf->Cell(12);
$pdf->Cell(39,10, utf8_decode('FIRMA DEL ESTUDIANTE '),0,0,'C');
//}
//}
$pdf->Output();
?>