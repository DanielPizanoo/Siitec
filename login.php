<html>

<head>
    <meta charset="utf-8">
    <link href="./css/login.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <img class="logo" src="./images/logo.png">

    <form action="validar.php" method="post">
        <div id="envoltura">
            <div id="cuerpo">
                <form id="form-login" action="" method="post" autocomplete="off">
                    <input id="usuario" placeholder="Usuario" name="usuario" autocomplete="off" required>

                    <input id="contrasenia" type="password" placeholder="Contraseña" name="pass" autocomplete="off" required>
                    
                    <p id="bot"><input type="submit" id="submit" name="login" value="Entrar" class="boton"></p>
                </form>
            </div>
        </div>
    </form>
</body>

</html>
