<?php 
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Da de alta un nuevo empleado.
    */
    require_once "cuerpoHtml.php";
    require_once __DIR__."/clases/dataBase.php";


    function send() {

        if(isset($_POST["enviar"])) {

            //Comprueba que los campos obligatorios estén rellenos.
            if(empty($_POST["DNI"]) && empty($_POST["nombre"]) && empty($_POST["telefono"]) ) {
                echo "[ERROR] Hay campos obligatorios que están vacios";
            } else {
                $db = new Database();
                
                $dni = $_POST["dni"];
                $nombre = $_POST["nombre"];
                $correo = (empty($_POST["correo"]) == 1) ? 'NULL' : '"'.$_POST["correo"].'"';
                $tlf = $_POST["telefono"];

                $db->aniadirEmpleado($dni,$nombre,$correo,$tlf);
               
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/general.css">
        <title>Inicio</title>
    </head>
    <body>
        <h1>Alta de empleado</h1>
        <?php
            nav();
            aside();
            main("altaEmpleado");
            footer();
        ?>
    </body>
</html>