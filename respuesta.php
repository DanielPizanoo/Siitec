<?php
    session_start();

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
    <form method="post" action="subirsolicitud.php">
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
                    <div class="itc"><p><b>ANEXO XLIV. RECOMENDACIÓN DEL COMITE ACADEMICO PARA</b></p> <b><p>ESTUDIANTES</b></p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="itc2">
                        <p><b>INSTITUTO TECNOLÓGICO DE COLIMA</b></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="va">
                        <p><strong>Lugar y Fecha: Villa de Álvarez, Col, <?php $fecha=strftime( "%Y-%m-%d", time() ); echo $fecha ?></strong></p>
                        <p><strong>No. de recomendación: </strong></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="lic">
                        <p><b>C. <br>
                                Director(a) del instituto<br>
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
                        <form action="respuesta.php" method="POST">

                            <label for="fecha_nac">Por este motivo le informo, que en reunión del Comité Academico, celebrada el</label>
                            <input required type="date" id="fecha_nac" name="f_nacimiento" /> 
                            <label>del año en curso, asentada en el libro de actas no. </label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <label>en la hoja con folio no.</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <label for="suscribe_c">y en virtud de haber sido analizada la situación del estudiante</label>
                            <input type="text" name="suscribe" placeholder="El que suscribe C" value="" required>


                            <label for="carrera">de la carrera</label>
                            <select name="carrera">
                                <?php echo $combobit; ?>
                            </select>

                            <label for="num_control">con número de control</label>
                            <?php
                                echo $_SESSION['usuario'];

                            ?>
                            <label for="solicito">y quien solicita</label>
                            <select name="solicito">
                                <?php echo $combobit2; ?>
                            </select>
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

                            <?php 
                            function generarCodigo($longitud) {
                                $key = '';
                                $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                                $max = strlen($pattern)-1;
                                for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
                                return $key;
                                }   
                                //echo generarCodigo(16);
                            ?>
                            <br>
                            <input type="submit" value="firmar" name="firmar">
                            <input type="button" value="Regresar" name="regresar" onclick="window.history.back()" />
                        </form>
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
