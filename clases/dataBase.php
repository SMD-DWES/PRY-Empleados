<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Clase de consultas de bases de datos.
    */
    require __DIR__."/metodosBd.php";
    class Database extends MetodosBd{

        private $mysql = null;
        //private $metodos = null;

        function __construct() {
            //$this->metodos = new MetodosBd();

            $this->mysql = $this->iniciar();
        }

        function aniadirEmpleado($dni,$nombre,$correo,$tlfno) {
            
            $sql = 'INSERT INTO empleados (DNI,Nombre,Correo,Tlfno) VALUES("'.$dni.'","'.$nombre.'",'.$correo.',"'.$tlfno.'")';
            if($this->consultar($sql)) {
                echo 'Correcto';
            } else {
                echo 'Hubo un error'.$this->mysql->error;
            }
            $this->cerrarConex();
        }

        //Devuelve si hubo un error, si no, unicamente borra la fila.
        function borrar($id) {
            $sql = "DELETE FROM empleados WHERE IdEmpleado=".$id;

            //$this->consulta($sql);

            if($this->consultar($sql))
                echo 'Correcto';
            echo $this->mysql->error;

            $this->cerrarConex();
        }

        //Hace un update de los campos, si es correcto devuelve correcto
        //Si no es correcto devolverá el error generado.
        function update($id, $dni, $nombre, $correo, $tlfno) {
            $sql = "UPDATE empleados SET DNI='$dni', Nombre='$nombre', Correo='$correo', Tlfno='$tlfno' WHERE IdEmpleado=$id";

            if($this->consultar($sql))
                return 'Correcto';
            return $this->mysql->error;
        }

        /**
         * Devuelve la consulta, si hay una excepción devolverá el mensaje de error.
         * @param where -> Parámetro con la condición (WHERE) para el SQL.
         * @return -> Devuelve la fila, si no es así, devuelve un error.
         */
        function selectEmpleados($where=null) {

            $sql = null;
            if($where == null)
                $sql = "SELECT * FROM empleados";
            else 
                $sql = "SELECT * FROM empleados $where";

            $result = $this->consultar($sql);
            
            if($result);
                return $this->consultar($sql);
            return $result->error;
        }

        //Funciones que sobrecargan la pila y no sirven para na'
        
        function selectDNI($dni) {

            $sql = null;
            
            $sql = "SELECT * FROM empleados WHERE DNI = $dni";

            $result = $this->consultar($sql);
            
            if($result);
                return $this->consultar($sql);
            return $result->error;
        }

        function selectNombre($nombre) {

            $sql = null;
           
            $sql = "SELECT * FROM empleados WHERE Nombre LIKE '$nombre'";

            $result = $this->consultar($sql);
            
            if($result);
                return $this->consultar($sql);
            return $result->error;
        }
    }
?>