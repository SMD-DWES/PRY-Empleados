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
        <nav>
            
        </nav>
        <aside>
            <a href="index.php">Inicio</a>
            <a href="altaEmpleado.php">Alta empleado</a>
            <a href="#">Modificación de empleado</a>
        </aside>
        <main>
            <?php
                listadoDatos();
            ?>
        </main>
        <footer>

        </footer>
    </body>
</html>
<?php 
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Lista en una tabla todos los empleados disponibles.
    */

    function listadoDatos() {
        
        require("config.php");

        //Mostrar empleados con una tabla.

        $mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);
        $sql = null;

        //Búsquedas
        echo 'Búsqueda de empleado por DNI:';
        echo 
        '<form action="#" method="post">
            <input type="text" name="busquedaDNI"></input>
            <input type="submit" value="Buscar" name="buscar"></input>
            <input type="submit" value="Resetear" name="reset"></input>
        </form>';
        


        if(isset($_POST["buscar"]))
            $sql = "SELECT * FROM empleados WHERE DNI LIKE'".$_POST["busquedaDNI"]."%'";
        else
            $sql = "SELECT * FROM empleados";
        $result = $mysql->query($sql);

        


        //Tabla con contenido
        echo '<table>';
        echo '<tr>';
        echo '<th>DNI</th>';
        echo '<th>Nombre</th>';
        echo '<th>Correo</th>';
        echo '<th>Tlfno</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        if($result->num_rows>0) {
            while($fila = $result->fetch_array(MYSQLI_ASSOC)) {
                echo '<tr>';
                echo '<td>'.$fila["DNI"].'</td>';
                echo '<td>'.$fila["Nombre"].'</td>';
                echo '<td>'.$fila["Correo"].'</td>';
                echo '<td>'.$fila["Tlfno"].'</td>';
                echo '
                <td>
                    <a href="editarEmpleado.php?id='.$fila["IdEmpleado"].'"><button id="editar">Editar</button></a>
                    <a href="borrarUser.php?id='.$fila["IdEmpleado"].'"><button id="borrar">Borrar</button></a>
                </td>';
                echo '</tr>';
            }
        }
        echo '</table>';

    }

?>