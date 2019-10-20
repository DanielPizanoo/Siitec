<?php
    session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sittec';
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
 
echo $valoresSelect[$grupos];
    
    if($conn) {
        $suscribe = $_POST['suscribe'];
        $nombre = $_SESSION['usuario'];
        $objetivo = $_POST['solicito'];
        
        $sql = "CALL rdirector ('".$suscribe."', '".$nombre."', '".$objetivo."')";
        
        $resultado = mysqli_query($conn, $sql);
        
        if($resultado) {
            header('location: iniciodirector.php');
            
            echo "<script type=\"text/javascript\">alert(\"Solicitud enviada correctamente\");</script>";  
            
        } else {
            header('location: rdformato.php');
            echo "<script type=\"text/javascript\">alert(\"Error al enviar\");</script>";  

        }
    }
    
?>