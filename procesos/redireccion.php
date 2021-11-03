<?php
    /*  
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Fichero que actualiza en la B.D los datos pasados.
    */
    if(isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case 'e':
                header("Location: ../editarEmpleado.php?id=$_GET[id]");
                break;
            case 'b':
                header("Location: ../borrarUser.php?id=$_GET[id]");
                break;
        }
    }
?>