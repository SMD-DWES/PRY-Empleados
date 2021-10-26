<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Clase de consultas de bases de datos.
    */
    require __DIR__."/metodosBd.php";
    class Database extends MetodosBd{

        private $mysql = null;
        private $metodos = null;

        function __construct() {
            //$this->metodos = new MetodosBd();

            $this->mysql = $this->iniciar();
        }

        function aniadirEmpleado($dni,$nombre,$correo,$tlfno) {
            
            $sql = 'INSERT INTO empleados (DNI,Nombre,Correo,Tlfno) VALUES("'.$dni.'","'.$nombre.'",'.$correo.',"'.$tlfno.'")';
            if($this->query($sql)) {
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

            $this->cerrarConex();


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