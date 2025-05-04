<?php
    function conectar(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $bd = "web_proyect";

        $conexion = new mysqli($host, $user, $pass, $bd);

        if($conexion -> connect_error){
            die("Error de conexión: ");
        } else {
            //echo "Conexión exitosa";
            return $conexion;
        }
    }
    conectar();
?>