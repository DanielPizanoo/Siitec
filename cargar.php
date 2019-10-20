    <?php
    session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sittec';
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
 
echo $valoresSelect[$grupos];
    
    if($conn) {
        $fecha = $_POST['fecha'];
        $suscribe = $_POST['suscribe'];
        $usuario=$_POST['ncontrol'];
        $carrera= $_POST['carrera'];
        $solicito =  $_POST['objetivo'];
        $recomienda = $_POST['recomienda'];
        $motivos = $_POST['motivosaca'];

        if ($_REQUEST["opcion"] == "SI") {
            $status = "Aprobada";
        } else {
            $status = "Rechazada";
        }
        
        $sql="CALL agregarrcomite('".$fecha."', '".$suscribe."', '".$usuario."', '".$carrera."', '".$solicito."', '".$recomienda."', '".$motivos."') ";
        $estado = "UPDATE `sittec`.`solicitud` SET `status`='$status' ";

        $resultado = mysqli_query($conn, $sql);
        $actualizacion = mysqli_query($conn, $estado);
        
        if($resultado && $actualizacion) {
            header('location: iniciocomite.php');

        } else {
            header('location: rcomite.php');

        }
    }
    
?>
