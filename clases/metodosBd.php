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
         * Inicia una conexión con la BBDD y devuelve el objeto de mysqli.
         * @return mysql -> Objeto mysqli.
         */
        function iniciar() {

            $this->mysql = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);
            return $this->mysql;
        }

        /**
         * Devuelve el query
         */
        function consultar($sql) {
           return $this->mysql->query($sql);
        }
        
        /**
         * Devuelve una fila como resultado de un array de tipo asociativo, numerico o ambos ($tipo)
         * @param result -> Resultado de un select
         * @param tipo -> tipo de array (asociativo, num, etcétera.)
         * @return -> Fila de la BBDD.
         */
        function selectArray($result, $tipo) {
            return $result->fetch_array($tipo);
        }

        /**
         * Devuelve el número de filas a partir de un resultado pasado.
         * @param result -> Resultado de un select
         * @return -> Número de filas.
         */
        function numFilas($result) {
            return $result->num_rows;
        }

        /**
         * Cierra la conexión de mysqli
         */
        function cerrarConex() {
            $this->mysql->close();
        }
    }
?>