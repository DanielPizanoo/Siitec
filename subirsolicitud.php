<?php
    session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sittec';
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
 
echo $valoresSelect[$grupos];
    
    if($conn) {
        $usuario = $_SESSION['usuario'];
        
        $nombre="SELECT CONCAT(nombre, ' ' ,ap_paterno, ' ',ap_materno) as nombre FROM alumno WHERE num_control = $usuario";
        $resultado = $conn -> query($nombre);
        if ($row = $resultado->fetch_assoc()) {
            $suscribe = $row['nombre'];
        } else {
            echo "0";
        }
                    
        $sem="SELECT semestre AS semestre FROM alumno WHERE num_control = $usuario";
        $resultado = $conn -> query($sem);
        if ($row = $resultado->fetch_assoc()) {
            $semestre = $row['semestre'];
        } else {
            echo "0";
        }
        
        $carrera= $_POST["carrera"];
        $num_control = $_SESSION['usuario'];
        $objetivo = $_POST['solicito'];
        $motivosacademicos = $_POST['motivosaca'];
        $motivospersonales = $_POST['motivosper'];
        $otros = $_POST['otros'];

        mt_srand(time());
        $digitos = '';
        for($i = 0; $i < 19; $i++){
            $digitos .= mt_rand(0,9);
        }

        $status = 'Pendiente';
        
        $sql = "CALL agregarsolicitud('".$suscribe."','".$semestre."','".$carrera."','".$num_control."','".$objetivo."',
         '".$motivosacademicos."', '".$motivospersonales."', '".$otros."', '".$status."', ".$digitos.")";
        
        $resultado = mysqli_query($conn, $sql);
        
        if($resultado) {
            header('location: inicioalumno.php');

        } else {
            header('location: formato.html');

        }
    }
    
?>
