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
        <h1>Modificación de empleado</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="altaEmpleado.php">Alta empleado</a>
            <a href="#">Modificación de empleado</a>
        </nav>
<!--
        <form action="#" method="post">
            <label for="">DNI:</label>
            <input type="text" name="dni" id="">
            <label for="">Nombre:</label>
            <input type="text" name="nombre" id="">
            <label for="">Correo:</label>
            <input type="text" name="correo" id="">
            <label for="">Teléfono:</label>
            <input type="text" name="telefono" id="">
            <input type="submit" value="Enviar" name="enviar[]">
        </form>
-->
    </body>
</html>
<?php 
    require("config.php");

    //Mostrar empleados con una tabla.

    $mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);

    $sql = "SELECT DNI, Nombre FROM empleados";

    $result = $mysql->query($sql);

    //Creamos el select con un valor ya por defecto

    echo 
    '
    <form action="#" method="post">
        <select name="listaEmpleados" id="">
            <option value="default">Elige un empleado</option>
    ';

    //Si la consulta devuelve más de una fila
    if($result->num_rows>0) {
        //Hacemos un fetch de las filas
        while($fila = $result->fetch_array(MYSQLI_ASSOC)) {
            //Rellenamos formulario
            echo '<option value="'.$fila["DNI"].'">'.$fila["Nombre"]."</option>";
        }
    }

    echo '</select>';

    echo 
    '
        <input type="submit" value="Seleccionar" name="seleccionar[]"></input>
    </form>
    ';


    if(isset($_POST["seleccionar"])) {

        //Selección del select
        if(!empty($_POST["listaEmpleados"]) && $_POST["listaEmpleados"] != "default"){
            echo "Has seleccionado el empleado con DNI: ".$_POST["listaEmpleados"];

            //Llamada a BD

            $sql = 'SELECT * FROM empleados WHERE DNI="'.$_POST["listaEmpleados"].'"';

            if($mysql->query($sql)) {

                echo 
                '
                <form action="#" method="post">
                    <label for="">DNI:</label>
                ';
                echo '
                    <input type="text" name="dni" id="">
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre" id="">
                    <label for="">Correo:</label>
                    <input type="text" name="correo" id="">
                    <label for="">Teléfono:</label>
                    <input type="text" name="telefono" id="">
                    <input type="submit" value="Enviar" name="enviar[]">
                </form>
                ';

                echo 'Correcto';
            } else {
                echo 'Hubo un error'.$mysql->error;
            }
        } else {
            echo 'Error, escoja un empleado';
        }
    }

?>