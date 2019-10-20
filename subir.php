<?php
    session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sittec';
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
 
echo $valoresSelect[$grupos];
    
    if($conn) {
        if ($_REQUEST["opcion"] == "SE AUTORIZA") {
            $status = "Aprobada";
        } else {
            $status = "Rechazada";
        }
        $control = $_POST['control'];
        $solicito = $_POST['objetivos']; 
        
        $sql = "CALL sdirector('".$status."', '".$control."', '".$solicito."')";
        /* $sql = "INSERT INTO rdirector (autoriza, nombre, objetivo) VALUES('$status', '$control', '$solicito')"; */ 
        $estado = "UPDATE `sittec`.`solicitud` SET `status`='$status' WHERE num_control = $control and objetivo = '$solicito' ";

        $resultado = mysqli_query($conn, $sql);
        $actualizacion = mysqli_query($conn, $estado);
        
        if($resultado && $actualizacion) {
            header('location: iniciodirector.php');
                        
        } else {
            header('location: rdformato.php');

        }
    }
    
?>