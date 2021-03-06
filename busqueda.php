<?php 
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Lista en una tabla todos los empleados disponibles.
    */
    require "cuerpoHtml.php";
    require_once __DIR__."/clases/dataBase.php";

    function listadoDatos() {
        

        //Mostrar empleados con una tabla.
        $db = new Database();

        //Búsquedas
        echo 
        '<form id="busquedaForm" action="#" method="post">
            <select name="tipos" id="tipos">
                <option value="dni">DNI</option>
                <option value="nombre">Nombre</option>
                <!--<option value="correo">Correo</option>-->
            </select>
            <input id="search" type="text" placeholder="Escriba aquí para buscar..." name="busqueda"></input>
            <input type="submit" id="buscar" value="Buscar" name="buscar"></input>
            <input type="reset" name="reset" value="X"></input>
        </form>';
        

        $result = null;


        if(isset($_POST["buscar"])) {
            switch ($_POST["tipos"]) {
                case 'dni':
                    $result = $db->selectEmpleados("WHERE DNI='$_POST[busqueda]'");
                    break;
                case 'nombre':
                    $result = $db->selectEmpleados("WHERE Nombre like '$_POST[busqueda]%'");
                    break;
                /*case 'correo':
                    $result = $db->selectEmpleados("WHERE Nombre like '$_POST[busqueda]'%");
                    break;*/
            }
        }

        //Tabla con contenido
        if($result != null) {
            echo '<table id="busqueda">';
            echo '<tr>';
            echo '<th>DNI</th>';
            echo '<th>Nombre</th>';
            echo '<th>Correo</th>';
            echo '<th>Tlfno</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            if($result->num_rows > 0) {
                while($fila = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr>';
                    echo '<td>'.$fila["DNI"].'</td>';
                    echo '<td>'.$fila["Nombre"].'</td>';
                    echo '<td>'.$fila["Correo"].'</td>';
                    echo '<td>'.$fila["Tlfno"].'</td>';
                    echo '
                    <td>
                        <a href="procesos/redireccion.php?op=e&id='.$fila["IdEmpleado"].'"><button id="editar">Editar</button></a>
                        <a href="procesos/redireccion.php?op=b&id='.$fila["IdEmpleado"].'"><button id="borrar">Borrar</button></a>
                    </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="5">No hay ningún empleado disponible</td>';
                echo '<tr>';
            }
            echo '</table>';
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
        <h1>Modificación de empleado</h1>
        <?php
            nav();
            aside();
            main("busqueda");
            footer();
        ?>
    </body>
</html>