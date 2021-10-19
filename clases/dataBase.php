<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Clase de consultas de bases de datos.
    */
    require "../config.php";
    class Database {

        private $mysql;

        function __constructor() {
            $this->mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);
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
        function update($dni, $nombre, $correo, $tlfno) {
            $sql = "UPDATE empleados SET DNI='".$dni.'", Nombre="'.$nombre.'", Correo="'.$correo.'", Tlfno="'.$tlfno.'"';

            if($this->mysql->query($sql))
                return 'Correcto';
            return $this->mysql->error;
        }
    }

?>