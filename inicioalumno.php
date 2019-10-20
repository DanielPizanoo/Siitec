<?php
    session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <link href="./css/inicioalumno.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SIITEC2</title>
</head>

<body>
    <div style="relative" class="container" align="center">
        <img src="./images/barra.png" id="barra" z-index:1>
    </div>

    <a href="./inicioalumno.php"><img src="./images/logo2.png" id="logo" z-index:2></a>
    <a href="logout.php"><img src="./images/close.png" id="logout" z-index:2></a>

    <div>
        <table id="tabla" style="width: 70%">
            <tbody>

                <tr>
                    <td id="usuario">
                        <?php
                            echo $_SESSION['usuario'];
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <img src="./images/buzon.png" id="buzon">
                    </td>

                    <td>
                        <img src="./images/extraescolares.png" id="extraescolares">
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="./images/calificacion.png" id="calificaciones"> </td>
                    <td>
                        <img src="./images/datos.png" id="datos">
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="./images/grupos.png" id="grupos">
                    </td>

                    <td>
                        <img src="./images/pagos.png" id="pagos">
                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="./images/moodle.png" id="moodle">
                    </td>

                    <td>
                        <img src="./images/biblioteca.png" id="biblioteca">
                    </td>
                </tr>

                <tr id="servicio">
                    <td>
                        <a href="servicio.html"><img src="./images/ser.png" border="0" width="481" height="94" id="servicios"></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>