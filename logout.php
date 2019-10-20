<?php
 session_start();
 if (isset($_SESSION['logueado']) and $_SESSION['logueado']) {
   $_SESSION['logueado'] = false;
   unset($_SESSION['nombre']);
   session_destroy();  
 }
 header('Location: login.php');
 session_destroy();  
 exit;
?>
