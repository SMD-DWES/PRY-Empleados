<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Clase de consultas de bases de datos.
    */
    require "../config.php";
    class Database {

        private $mysql = null;

        function __construct() {
            $this->mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);
        }

        function aniadirEmpleado() {
            
        }

        //Devuelve si hubo un error, si no, unicamente borra la fila.
        function borrar($id) {
            $sql = "DELETE FROM empleados WHERE IdEmpleado=".$id;

            //$this->consulta($sql);

            if($this->mysql->query($sql))
                return 'Correcto';
            return $this->mysql->error;


        }

        //Hace un update de los campos, si es correcto devuelve correcto
        //Si no es correcto devolverá el error generado.
        function update($id, $dni, $nombre, $correo, $tlfno) {
            $sql = "UPDATE empleados SET DNI='$dni', Nombre='$nombre', Correo='$correo', Tlfno='$tlfno' WHERE IdEmpleado=$id";

            if($this->mysql->query($sql))
                return 'Correcto';
            return $this->mysql->error;
        }

        
    }

?>