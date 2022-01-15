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

        /**
         * Verifica de forma segura si el usuario se logueo correctamente
        */
        function loginAccount($user,$pass) {

            //SQL custom especificado en param
            $sql = "SELECT nombre, pw, idCuenta FROM accounts WHERE nombre=? LIMIT 1";

            $consulta = $this->prepararConsulta($sql);
            $consulta->bind_param("s", $user);


            if($consulta->execute()) echo $this->mysql->error;


            //Definición de variables 
            $nombre = "";
            $pwHashed = "";
            $idUsuario = "";
            //$tipoPerfil = "";


            //El bind result funcionará mejor para consultas sin *
            $consulta->bind_result($nombre, $pwHashed, $idUsuario);
            $consulta->fetch();

            //$fila = $consulta->fetch();

            $pwHash = password_verify($pass, $pwHashed);

            //if($consulta->num_rows > 0)
            if($pwHash) {
                session_start();
                $_SESSION["id"] = $idUsuario;
                $_SESSION["userName"] = $user;
                //$_SESSION["tipoPerfil"] = $filaLogin["tipoPerfil"];
                $_SESSION["firstLogin"] = false;

                //Cerramos la consulta
                $consulta->close();
                return true;
            }
            $consulta->close();
            return false;
        }

        /**
         * Crea una nueva cuenta de forma segura
        */
        function crearCuenta($nombre,$apellido,$correo,$pw,$tipoPerfil=0) {

            $sql = "INSERT INTO accounts(nombre,apellido,correo,pw) VALUES (?, ?, ?, ?);";
            //INSERT INTO usuarios(nombre,apellido,correo,pw) VALUES ('aa', 'ee', 'ee', '1234');

            $consulta = $this->prepararConsulta($sql);

            $pwHash = password_hash($pw, PASSWORD_DEFAULT);

            $consulta->bind_param("ssss", $nombre, $apellido, $correo, $pwHash);
            if(!$consulta->execute()) return $this->mysql->errno;

            //Cerramos la consulta preparada
            $consulta->close();
            return $this->mysql->insert_id; //Devolvemos la id.
        }

        function aniadirEmpleado($dni,$nombre,$correo,$tlfno) {
            
            $sql = 'INSERT INTO empleados (DNI,Nombre,Correo,Tlfno) VALUES("'.$dni.'","'.$nombre.'",'.$correo.',"'.$tlfno.'")';
            if($this->consultar($sql)) {
                echo 'Correcto';
            } else {
                echo "Hubo un error [ERROR ".$this->mysql->errno."]";
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
    }
?>