<?php
    function nav() {
        echo 
        '
            <nav>
                <h1>NAV</h1>
            </nav>
        ';
    }
    function aside() {
        echo '
            <aside>
                <!--<a href="index.php">Inicio</a>-->
                <a href="altaEmpleado.php">Alta empleado</a>
                <a href="listaEmpleados.php">Listar empleados</a>
                <a href="busqueda.php">Buscar empleados</a>
            </aside>
        ';
    }
    function main() {

    }

    function footer(){
        echo 
        '
            <footer>
                <h1>FOOTER</h1>
            </footer>
        ';
    }
?>