<?php
    require "../config.php";
    class Database {
        function __constructor() {

        }

        function conectarBd() {
            
        }

        function consulta ($sql) {
            $mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);

            $mysql->query($sql);
        }

        function borrar($dni) {
            $sql = "DELETE FROM empleados WHERE DNI='".$dni."'";

            $this->consulta($sql);
        }

        function update($dni, $nombre, $correo, $tlfno) {
            $sql = "UPDATE empleados SET DNI='".$dni.'", Nombre="'.$nombre.'", Correo="'.$correo.'", Tlfno="'.$tlfno.'"';

            $this->consulta($sql);
        }
    }

?>