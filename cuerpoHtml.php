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
    function main($tipo=null) {
        echo '
        <main>
        ';
            //Funciones dentro de main
            switch($tipo) {
                case "busqueda":
                    listadoDatos();
                    break;
                case "editarEmpleado":
                    modificar();
                    break;
                case "listaEmpleados":
                    listadoDatos();
                    echo '<a href="altaEmpleado.php"><button>Añadir empleado</button></a>';
                    break;
                case "borrarEmpleado":
                    echo '<div id="borrado">';
                        borrado();
                    echo '</div>';
                    break;
                case "altaEmpleado": 
                    echo 
                    '
                    <form action="#" method="post">
                        <label for="">DNI:</label>
                        <input type="text" name="dni" id="">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" id="">
                        <label for="">Correo:</label>
                        <input type="text" name="correo" id="">
                        <label for="">Teléfono:</label>
                        <input type="text" name="telefono" id="">
                        <input type="submit" value="Enviar" name="enviar[]">
                    </form>
                    ';
                    send();
                    break;
                default:
                    echo '<h2>Panel principal.</h2>';
            }
        echo '
        </main>';

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