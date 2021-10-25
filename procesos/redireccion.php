<?php
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