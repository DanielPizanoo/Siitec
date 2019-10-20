<?php
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'sittec');

$con = mysqli_connect(dbhost, dbuser, dbpass, dbname) or die("No se ha podido conectar al servidor");

function filtrado($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

////////////////////////////// Consulta a la base de datos /////////////////////////////////////

$consulta = "SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo, status FROM solicitud";
$resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/solicitudes.css" rel="stylesheet" type="text/css">

<div>
    <table align="center" id="tabla" class="table table-striped">
        <thead>
            <td>Numero de Solicitud</td>
            <td>Nombre</td>
            <td>Numero de control</td>
            <td>Semestre</td>
            <td>Carrera</td>
            <td>Objetivo</td>
            <td>Status</td>
            <td>Responder</td>
            <td>Solicitud</td>
            <td>Respuesta</td>
            <td>Dictamen Oficial</td>
        </thead>
        <tbody>

            <?php
            while ($fila = mysqli_fetch_array($resultado)) {

                ?>
            <tr>
                <td><?php echo filtrado($fila['idsolicitud']); ?></td>
                <td><?php echo filtrado($fila['suscribe']); ?></td>
                <td><?php echo filtrado($fila['num_control']); ?></td>
                <td><?php echo filtrado($fila['semestre']); ?></td>
                <td><?php echo filtrado($fila['carrera']); ?></td>
                <td><?php echo filtrado($fila['objetivo']); ?> </td>
                <td><?php echo filtrado($fila['status']); ?></td>
                <form action="rcomite.php" method="POST">
                    <input type="hidden" value="<?php echo filtrado($fila['num_control']);  ?>" name="numControl">
                    <input type="hidden" value="<?php echo filtrado($fila['suscribe']); ?>" name="nombre">
                    <input type="hidden" value="<?php echo filtrado($fila['carrera']); ?>" name="carrera">
                    <input type="hidden" value="<?php echo filtrado($fila['objetivo']); ?>" name="objetivo">
                    <td><button type="submit"><img src="images/responder.png" title="Responder"></button></td>
                </form>
                <form method="POST" action="pdf.php">
                    <input type='hidden' value="<?php echo $fila['num_control']; ?>" name="ncontrol"/>
                    <input type='hidden' value="<?php echo $fila['objetivo']; ?>" name="obje"/>
                    <td><button type='submit'><img src="./images/PDF.png" title="Ver Solicitud"></button></td>
                </form>
                <form method="POST" action="respdf.php">
                    <input type='hidden' value="<?php echo $fila['num_control']; ?>" name="ncontrol"/>
                    <input type='hidden' value="<?php echo $fila['objetivo']; ?>" name="obje"/>
                    <td><button type='submit'><img src="./images/PDF.png" title="Ver Respuesta"></button></td>
                </form>
                <form method="POST" action="resdirpdf.php">
                    <input type='hidden' value="<?php echo $fila['num_control']; ?>" name="ncontrol"/>
                    <input type='hidden' value="<?php echo $fila['objetivo']; ?>" name="obje"/>
                    <td><button type='submit'><img src="./images/PDF.png" title="Ver Dictamen"></button></td>
                </form>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
