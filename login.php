<?php
    /*
        @author: Sergio Matamoros Delgado <smatamorosdelgado.guadalupe@alumnado.fundacionloyola.net>
        @license: GPL v3 2021
        @description: BackEnd del minijuego de flashcards. 
        Permite iniciar sesión en el sitio web.
    */
    require_once __DIR__."/clases/dataBase.php";
    function loginCuenta() {
    if(isset($_POST["login"])) {
            $user = $_POST["username"];
            $pw = $_POST["password"];

            $db = new Database();

            $resultLogin = $db->loginAccount($user, $pw);

            if($resultLogin) header("Location: index.php");
            else echo 'Usuario o contraseña incorrectos';

            /*$filaLogin = $db->selectArray($resultLogin,MYSQLI_ASSOC);

            if($db->num_Filas($resultLogin) > 0) {
                session_start();
                $_SESSION["id"] = $filaLogin["idUsuario"];
                $_SESSION["userName"] = $user;
                $_SESSION["tipoPerfil"] = $filaLogin["tipoPerfil"];
                $_SESSION["firstLogin"] = false;

                header("Location: index.php");
            } else {
                echo 'Usuario o contraseña incorrectos';
            }*/
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de sesión</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="css/loginEstilo.css">
    </head>
    <body>
        <div id="cajaPrincipal">
            <p>Gestión<span> Empleados</span></p>
            <div id="cajaLogin">
                <form action="#" method="post">
                    <h2>Inicia sesión para entrar a tu sesión</h2>
                    <label for="username"><i class="fas fa-user"></i></label>
                    <input type="text" name="username" id="username" placeholder="Usuario" required>
                    <label for="password"><i class="fas fa-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                    <input type="submit" value="Iniciar sesión" name="login[]">
                    <span>¿No Tienes una cuenta? Click <a href="registro.php"> aquí</a></span>
                </form>
                <?php
                    loginCuenta();
                ?>
            </div>
        </div>
    </body>
</html>