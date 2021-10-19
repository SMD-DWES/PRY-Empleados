<?php
    require "../clases/dataBase.php";

    if(isset($_GET["id"])) {

        //Esta página el usuario no la verá, es meramente de debug y no contiene información personal.

        $db = new Database();

        echo '¿Estás seguro que deseas borrar al usuario con id: '.$_GET["id"].'?';
        echo '<a><button>Sí</button></a>';
        echo '<a href><button>No</button></a>';


        //Llamamos a la función borrar, que borrará la fila del DNI pasado.
        echo 'DEBUG: '. $db->borrar($_GET["id"]);
        echo 'DEBUG2: '. $_GET["id"];

        //Si se terminó de borrar vuelve al index.
        //header("Location: ../listaEmpleados.php");

    }
?>