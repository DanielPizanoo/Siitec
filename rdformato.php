<?php
    session_start();
    $numcontrol = $_POST['numControl'];
    $objetivo = $_POST['objetivos'];
    $conexion = new mysqli("localhost", "root", "", "sittec");
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
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
    <form method="post" action="subir.php">
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
                        <p><b>ANEXO XLIV. DICTAMEN OFICIAL</b></p>
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
                        <p><strong>Lugar y Fecha: </strong></p>
                        <p><strong>Dictamen No.: 1650</strong></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="lic">
                        <p><b>C. Jose Francisco Brizuela Ventura<br>
                                Subdirector(a) Académico(a) o su equivalente en los Institutos Tecnológicos
                                Desentralizados<br>
                                PRESENTE</b></p>    
                    </div>
                </td>
            </tr>
        </table>
        <table style="width: 70%" border="1" align="center">
            <tr>
                <td colspan="2">
                    <div class="form">
                        <label>Por este conducto y atendiendo la recomendación del Comité Académico comunico a usted,
                            que</label>

                        <select name="opcion" required>
                            <option>SE AUTORIZA</option>
                            <option>NO SE AUTORIZA</option>
                        </select>
                        <br>
                        <label for="suscribe_c">la solicitud del interesado</label>
                        <input type="text" name="control" placeholder="<?php echo $numcontrol; ?>" value="<?php echo $numcontrol; ?>">
                        <br>
                        <label for="solicito">con referencia a</label>
                        <input type="text" name="objetivos" placeholder="<?php echo $objetivo; ?>" value="<?php echo $objetivo; ?>">

                        <br>

                        <label>Sin otro particular por el momento, quedo en Usted.</label>
                        <br>
                        <br>
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
                            <p><b>c.c.p Interesado</b><br></p>
                            <p><b>c.c.p Archivo</b><br></p>
                        </center>
                    </footer>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>