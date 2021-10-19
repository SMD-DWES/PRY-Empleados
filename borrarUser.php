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
            <a href="listaEmpleados.php">Modificación de empleado</a>
        </nav>
    </body>
</html>

<?php

    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Imprime unos botones de confirmación para borrar un usuario.
    */

    echo "¿Seguro que deseas borrar al usuario con id $_GET[id]?";

    echo "<a href='procesos/borrar.php?id=$_GET[id]'><button>Sí</button></a>";
    echo "<a href='listaEmpleados.php'><button>No</button></a>";

?>