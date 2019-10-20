<?php
    session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <link href="./css/iniciomaestro.css" rel="stylesheet" type="text/css">
    <title>SIITEC2</title>
</head>

<body>
    <div style="relative" class="container" align="center">
        <img src="./images/barra.png" id="barra" z-index:1>
    </div>

    <a href="iniciomaestro.php"><img src="./images/logo2.png" id="logo" z-index:2></a>
    <a href="logout.php"><img src="./images/close.png" id="logout" z-index:2></a>

    <div>
        <table id="tabla" style="width: 70%">
            <tbody>

                <tr>
                    <td id="usuario">
                        <?php
                            echo $_SESSION['email'];
                        ?>
                    <td>
                </tr>
                
                <tr>
                    <td>
                        <img src="./images/buzon.png" id="buzon">
                    </td>
                    <td>
                        <img src="./images/calificacion.png" id="calificaciones">

                    </td>
                </tr>

                <tr>
                    <td>
                        <img src="./images/grupos.png" id="grupos">
                    </td>

                    <td>
                        <img src="./images/datos.png" id="datos">
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

            </tbody>
        </table>
    </div>

</body>

</html>