<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo.css">
        <title>Inicio</title>
    </head>
    <body>
        <h1>Panel de administración - INICIO</h1>
        <nav>
            <a href="#">Inicio</a>
            <a href="altaEmpleado.php">Alta empleado</a>
            <a href="listaEmpleados.php">Modificación de empleado</a>
        </nav>
    </body>
</html>
<?php 
    require("config.php");

    if(isset($_POST["enviar"])) {

        //Llamada a BD
        $mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);



        //Vars
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $tlfno = $_POST["telefono"];


        $sql = 'INSERT INTO empleados (DNI,Nombre,Correo,Tlfno) VALUES("'.$dni.'","'.$nombre.'","'.$correo.'","'.$tlfno.'")';

        if($mysql->query($sql)) {
            echo 'Correcto';
        } else {
            echo 'Hubo un error'.$mysql->error;
        }

    }

?>