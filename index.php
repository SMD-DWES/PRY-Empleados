<?php
    require "cuerpoHtml.php";
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
        <h1>Panel de administración - INICIO</h1>
        <nav>
            <?php
                nav();
            ?>
        </nav>
        <aside>
            <?php
                aside();
            ?>
        </aside>
        <main>
            <h2>Panel principal.</h2>
        </main>
        <footer>
            <?php
                footer();
            ?>
        </footer>
    </body>
</html>