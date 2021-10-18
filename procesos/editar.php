<?php
    //Importamos libreria
    require "../clases/dataBase.php";

    if(isset($_GET["id"])) {
        $db = new Database();

        

        $db->update($_GET["id"],$_GET["nombre"],$_GET["correo"],$_GET["tlfno"]);

    }
?>