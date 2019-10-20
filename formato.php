<?php
    session_start();

    $conexion = new mysqli("localhost", "root", "", "sittec");
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }

    $sql="SELECT * from carreras";
    $sql2="SELECT * from tsolicitudes";
    
    $usuario = $_SESSION['usuario'];

    $nombre="SELECT CONCAT(nombre, ' ' ,ap_paterno, ' ',ap_materno) as nombre FROM alumno WHERE num_control = $usuario";
    $sem="SELECT semestre AS semestre FROM alumno WHERE num_control = $usuario";

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
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="./css/formato.css">
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
                <td>
                    <div class="img2"><img src="./images/tecNM.png"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="itc"><em>Instituto Tecnológico de Colima</em></div>
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
                        <p><strong>Villa de Álvarez, Col, Fecha: <?php $fecha=strftime( "%Y-%m-%d", time() ); echo $fecha ?> </strong></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="lic">
                        <p><b>C. LIC. JOSÉ FRANCISCO BRIZUELA VENTURA<br>
                                JEFE DE LA DIVISIÓN DE ESTUDIOS PROFESIONALES<br>
                                P R E S E N T E.</b></p>
                    </div>
                </td>
            </tr>
        </table>
        <table style="width: 70%" border="1" align="center">
            <tr>
                <td colspan="2">
                    <div class="form">

                        <label for="suscribe_c">El que suscribe C.</label>
                        <?php
                            $resultado = $conexion -> query($nombre);
                            if ($row = $resultado->fetch_assoc()) {
                                echo $row['nombre'];
                            } else {
                                echo "0";
                            }
                        ?>

                        <br>

                        <label for="semestre">Estudiante de semestre:</label>
                        <?php
                            $resultado = $conexion -> query($sem);
                            if ($row = $resultado->fetch_assoc()) {
                                echo $row['semestre'];
                            } else {
                                echo "0";
                            }
                        ?>
                        <br>
                        <br>

                        <label for="carrera">de la carrera:</label>
                        <select name="carrera">
                            <?php echo $combobit; ?>
                        </select>
                        <br>
                        <br>

                        <label for="num_control">Con número de Control:</label>
                        <?php
                                echo $_SESSION['usuario'];

                            ?>
                        <br>

                        <label for="solicito">Solicito de la manera más atenta:</label>
                        <select name="solicito">
                            <?php echo $combobit2; ?>
                        </select>
                        <br>
                        <br>

                        <label for="motivos_a">Por los siguientes motivos académicos:</label>
                        <br>
                        <textarea type="text" name="motivosaca" rows="10" cols="60" value="" required></textarea>
                        <br>

                        <label for="motivos_p">Motivos Personales:</label>
                        <br>
                        <textarea type="text" name="motivosper" rows="10" cols="60" value="" required></textarea>
                        <br>

                        <label for="otros">Otros:</label>
                        <br>
                        <textarea type="text" name="otros" rows="10" cols="60" value=""></textarea>
                        <br>
                        <br>
                        <br>

                        <br>
                        <input type="submit" value="Enviar" name="firmar">
                        <input type="button" value="Regresar" name="regresar" onclick="window.history.back()">
                    </div>
                </td>
            </tr>
        </table>
        <table style="width: 70%" border="0" align="center">
            <tr>
                <td>
                    <div class="img1"><img src="images/tec.png"></div>
                </td>

                <td>
                    <footer>
                        <center>
                            <p><b>“Año 2018, Centenario del natalicio del escritor mexicano y universal Juan José
                                    Arreola”</b><br><i>Av. Tecnológico No 1.,C.P. 28976, Villa de Álvarez, Col. Tel /
                                    Fax (01 312) 312-9920, 314-0933, 312-6393, 314-0683 www.itcolima.edu.mx</i></p>
                        </center>
                    </footer>
                </td>

                <td>
                    <div class="img1"><img src="images/aprovado.jpg"></div>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>