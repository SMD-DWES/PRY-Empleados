<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 25/10/2021

        Descripción: Clase para los metodos de SQL.
    */
    require __DIR__."/../config.php"; //Al ponerlo dentro del metodo funciona, fuera de la clase no.
    class MetodosBd {

        private $mysql = null;
        //public $resultadoMetodo = null;

        function __construct()
        {
            $this->iniciar();
        }

        /**
         * 
         */
        function iniciar() {

            $this->mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);
            return $this->mysql;
        }

        /**
         * Devuelve el query
         */
        function query($sql) {
           return $this->mysql->query($sql);
        }

        /**
         * Obsoleto.
         */
        function numFilas() {
            return $this->resultadoMetodo->num_rows;
        }

        /**
         * Cierra la conexión de mysqli
         */
        function cerrarConex() {
            $this->mysql->close();
        }

    }
?>