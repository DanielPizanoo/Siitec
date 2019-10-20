<?php
session_start();
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

$sesion = $_SESSION['usuario'];
$consulta = "SELECT idsolicitud, suscribe, num_control, carrera, objetivo, status
            FROM solicitud
            WHERE num_control = $sesion";
$resultado = mysqli_query($con, $consulta) or die(mysqli_error($con));

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="./css/respuestas.css" rel="stylesheet" type="text/css">

<div>
    <table align="center">
        <thead>
            <td>Numero de Solicitud</td>
            <td>Suscribe</td>
            <td>No. Control</td>
            <td>Carrera</td>
            <td>Objetivo</td>
            <td>Status</td>
            <td>Solicitud</td>
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
                <td><?php echo filtrado($fila['carrera']); ?></td>
                <td><?php echo filtrado($fila['objetivo']); ?></td>
                <td><?php echo filtrado($fila['status']) ?></td>
                <form method="POST" action="pdf.php">
                    <input type='hidden' value="<?php echo $fila['num_control']; ?>" name="ncontrol"/>
                    <input type='hidden' value="<?php echo $fila['objetivo']; ?>" name="obje"/>
                    <input type='hidden' value="<?php echo $fila['carrera']; ?>" name="carrera"/>
                    <td><button type='submit'><img src="./images/PDF.png" title="Ver Solicitud"></button></td>
                </form>
                <form method="POST" action="resdirpdf.php">
                    <input type='hidden' value="<?php echo $fila['num_control']; ?>" name="ncontrol"/>
                    <input type='hidden' value="<?php echo $fila['objetivo']; ?>" name="obje"/>
                    <td><button type='submit'><img src="./images/PDF.png" title="Ver Dictamen Oficial"></button></td>
                </form>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
