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
        /*echo 'Búsqueda de empleado por DNI:';
        echo 
        '<form action="#" method="post">
            <input type="text" name="busquedaDNI"></input>
            <input type="submit" value="Buscar" name="buscar"></input>
            <input type="submit" value="Resetear" name="reset"></input>
        </form>';*/
        

        $result = null;

        if(isset($_POST["buscar"]))
            $result = $db->selectEmpleados("WHERE DNI LIKE '$_POST[busquedaDNI]%'");
            //$sql = "SELECT * FROM empleados WHERE DNI LIKE'".$_POST["busquedaDNI"]."%'";
        else
            $result = $db->selectEmpleados();
            //$sql = "SELECT * FROM empleados";
        //$result = $mysql->query($sql);        


        //Tabla con contenido
        echo '<table>';
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
            main("listaEmpleados");
            footer();
        ?>
    </body>
</html>