<?php
    session_start();
    $numcontrol = $_POST['numControl'];
    $nombre = $_POST['nombre'];
    $carrera = $_POST['carrera'];
    $objetivo = $_POST['objetivo'];

    $conexion = new mysqli("localhost", "root", "", "sittec");
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }
    $sql="SELECT * from carreras";
    $sql2="SELECT * from tsolicitudes";

    $result = $conexion->query($sql);
    $result2 = $conexion->query($sql2);

    if ($result->num_rows > 0) 
    {
        $combobit="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            IF($row['ncarrera'] === $carrera){
                $combobit .=" <option value=\"{$row['ncarrera']}\" Selected>{$row['ncarrera']}</option>";
            }else{
                $combobit .=" <option value=\"{$row['ncarrera']}\">{$row['ncarrera']}</option>";
            }
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
?>



<!DOCTYPE html>
<html>

<head>
    <title>Respuesta</title>
    <link rel="stylesheet" type="text/css" href="./css/formato2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="widh=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA">

</head>

<body>
    <form method="post" action="cargar.php">
        <table style="width: 70%" align="center">
            <tr>
                <td>
                    <div class="img1"><img src="./images/sep.png"></div>
                </td>
                <td colspan="2">
                    <div class="img2"><img src="./images/tecNM.png"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="itc">
                        <p><b>ANEXO XLIV. RECOMENDACIÓN DEL COMITE ACADEMICO PARA</b></p> <b>
                            <p>ESTUDIANTES
                        </b></p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="itc2">
                        <p><b>INSTITUTO TECNOLOGICO DE COLIMA</b></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="va">
                        <p><strong>Lugar y Fecha: Villa de Álvarez, Col, <?php $fecha=strftime( "%Y-%m-%d", time() ); echo $fecha ?> </strong></p>
                        <p><strong>No. de recomendación: 1446</strong></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="lic">
                        <p><b>C. Ana Rosa Braña Castillo<br>
                                Director(a) del instituto Tecnologico de Colima<br>
                                PRESENTE</b></p>
    </form>
    </div>
    </td>
    </tr>
    </table>
    <table style="width: 70%" border="1" align="center">
        <tr>
            <td colspan="2">
                <div class="form">
                    <label for="fecha_nac">Por este motivo le informo, que en reunión del Comité Academico, celebrada
                        el</label>
                    <input required type="date" id="fecha_nac" name="fecha" />
                    <label>del año en curso, asentada en el libro de actas no. </label>&nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; <label>en la hoja con folio no.</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                    <label for="suscribe_c">y en virtud de haber sido analizada la situación del estudiante</label>
                    <input type="text" name="suscribe" placeholder="<?php echo $nombre; ?>" value="<?php echo $nombre; ?>">


                    <label for="carrera">de la carrera</label>
                    <input type="text" name="carrera" placeholder="<?php echo $carrera; ?>" value="<?php echo $carrera; ?>">


                    <label for="num_control">con número de control</label>
                    <input type="text" name="ncontrol" placeholder="<?php echo $numcontrol; ?>" value="<?php echo $numcontrol; ?>">

                    <label for="solicito">y quien solicita</label>
                    <input type="text" name="objetivo" placeholder="<?php echo $objetivo; ?>" value="<?php echo $objetivo; ?>">
                    
                    <select name="opcion" required>
                        <option>SI</option>
                        <option>NO</option>
                    </select>
                    <label for="recomienda">SE RECOMIENDA:</label>
                    <input type="text" name="recomienda" placeholder="se acepta o no la petición" value="" required>
                    <br>
                    <br>

                    <label for="motivos_a">Por los siguientes motivos:</label>
                    <br>
                    <textarea type="text" name="motivosaca" rows="10" cols="60" value="" required></textarea>
                    <br>
                    <br>
                    <input type="submit" value="Enviar" name="firmar">
                    <input type="button" value="Regresar" name="regresar" onclick="window.history.back()" />
                </div>
            </td>
        </tr>
    </table>
    <table style="width: 70%" border="0" align="center">
        <tr>
            <td>
                <footer>
                    <center>
                        <p><b>c.c.p Archivo</b><br></p>
                    </center>
                </footer>
            </td>
        </tr>
    </table>
    </form>

</body>

</html>