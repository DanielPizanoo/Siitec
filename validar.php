    <?php
    session_start();
        if(isset($_POST['login'])) {
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];
        }
            $con = mysqli_connect('localhost', 'root', '', 'sittec') or die ("No se ha podido conectar al servidor");

            $sql = mysqli_query($con, "SELECT num_control, pass FROM alumno WHERE num_control = '$usuario' and pass = '$pass' ");
            $sql2 = mysqli_query($con, "SELECT email, pass FROM jefatura WHERE email = '$usuario' and pass = '$pass' ");
            $sql3 = mysqli_query($con, "SELECT email, pass FROM maestros WHERE email = '$usuario' and pass = '$pass' ");
            $sql4 = mysqli_query($con, "SELECT email, pass FROM director WHERE email = '$usuario' and pass = '$pass' ");

            $row = mysqli_fetch_array($sql);
            $row2 = mysqli_fetch_array($sql2);
            $row3 = mysqli_fetch_array($sql3);
            $row4 = mysqli_fetch_array($sql4);

            if($row['num_control']== $usuario && $row['pass'] == $pass) {
                $_SESSION['usuario'] = $row['num_control']; 
                header('Location: inicioalumno.php');

            }
            elseif ($row2['email']== $usuario && $row2['pass']== $pass) {
                $_SESSION['email'] = $row2['email']; 
                header('Location: iniciocomite.php');

            }
            else if ($row3['email']== $usuario && $row3['pass']== $pass) {
                $_SESSION['email'] = $row3['email'];
                header('Location: iniciomaestro.php');

            }
            else if ($row4['email']== $usuario && $row4['pass']== $pass) {
                $_SESSION['email'] = $row4['email'];
                header('Location: iniciodirector.php');

            }
            else {
                header('Location: login.php');
                exit();
            }
        
    ?>
