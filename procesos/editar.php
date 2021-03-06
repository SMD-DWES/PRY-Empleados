<?php
    /*
        Autor: Sergio Matamoros Delgado
        Fecha: 19/10/2021

        Descripción: Fichero que actualiza en la B.D los datos pasados.
    */

    //Importamos libreria
    require_once __DIR__."/../clases/dataBase.php";

    if(isset($_POST["actualizar"])) {

        //La ID se la pasamos por get, ya que no es relevante
        $id = $_GET["id"];
        

        //Variables.
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $tlf = $_POST["telefono"];


        
        $db = new Database();

        //Actualiza en B.D, si hubo un error lo imprimirá.
        $db->update($id,$dni,$nombre,$correo,$tlf);

        $db->cerrarConex();

        //Reedirige a la lista principal nuevamente. [EN HOST NO REDIRIGE CORRECTAMENTE]
        header("Location: ../listaEmpleados.php");

    }
?>