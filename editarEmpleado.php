
<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Imprime en pantalla un formulario con los datos del empleado.
    */
    require_once "cuerpoHtml.php";
    require_once __DIR__."/clases/dataBase.php";

    function modificar() {
        if(isset($_GET["id"])) {

            $bd = new Database();

            $result = $bd->selectEmpleados("WHERE IdEmpleado=$_GET[id]");

            $fila = $bd->selectArray($result,MYSQLI_ASSOC);

            //Rellenamos el formulario con los datos del empleado.
            echo 
            "
            <form action='procesos/editar.php?id=$_GET[id]' method='post'>
                <label for=''>DNI:</label>
                <input type='text' name='dni' id='' value='$fila[DNI]'>
                <label for=''>Nombre:</label>
                <input type='text' name='nombre' id='' value='$fila[Nombre]'>
                <label for=''>Correo:</label>
                <input type='text' name='correo' id='' value='$fila[Correo]'>
                <label for=''>Teléfono:</label>
                <input type='text' name='telefono' id='' value='$fila[Tlfno]'>
                <input type='submit' value='Actualizar' name='actualizar[]'>
            </form>
            ";
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
            main("editarEmpleado");
            footer();
        ?>
    </body>
</html>
