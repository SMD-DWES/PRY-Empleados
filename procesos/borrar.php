<?php
    require "../clases/dataBase.php";

    if(isset($_GET["id"])) {

        $db = new Database();

        //Llamamos a la función borrar, que borrará la fila del DNI pasado.
        $db->borrar($_GET["id"]);

        

    }
?>