<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Borra un usuario pasado por url.
    */
    require_once "../config.php";
    require DIRECTORIO."\clases\dataBase.php";

    if(isset($_GET["id"])) {

        //Esta página el usuario no la verá, es meramente de debug y no contiene información personal.

        $db = new Database();

        //Llamamos a la función borrar, que borrará la fila del DNI pasado.
        echo $db->borrar($_GET["id"]);

        //Si se terminó de borrar vuelve al index, y sino, pos tambien.
        header("Location: ../listaEmpleados.php");

    }
?>