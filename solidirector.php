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

$sql = "SELECT idsolicitud, suscribe, num_control, semestre, carrera, objetivo, status FROM solicitud";
$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

if (mysqli_num_rows($resultado) == 0) {
    $mensaje = "<h1>No hay registros que coincidan con su escritorio de busqueda.</h1>";
}

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/solicitudes.css" rel="stylesheet" type="text/css">

<div>
    <table align="center">
        <thead>
            <td>Numero de Solicitud</td>
            <td>Alumno</td>
            <td>No. de Control</td>
            <td>Semestre</td>
            <td>Carrera</td>
            <td>Objetivo</td>
            <td>Status</td>
            <td>Responder</td>
            <td>Solicitud</td>
            <td>Respuesta Comite</td>
            <td>Dictamen</td>
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
                <td><?php echo filtrado($fila['status']); ?> </td>
                <form action="rdformato.php" method="POST">
                    <input type="hidden" value="<?php echo filtrado($fila['num_control']);  ?>" name="numControl">
                    <input type="hidden" value="<?php echo filtrado($fila['objetivo']); ?>" name="objetivos">
                    <td><button type="submit"><img src="images/responder.png" title="Responder"></button></td>
                    <!--<td><a href="./rcomite.php"><img src="./images/responder.png" title="Responder"></a></td>-->
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
                    <input type='hidden' value="<?php echo $fila['status']; ?>" name="estado"/>
                    <td><button type='submit'><img src="./images/PDF.png" title="Ver"></button></td>
                </form>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>