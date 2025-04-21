<?php
        if(isset($_POST['btnenviar'])){
            // Asignamos los valores a variables
            $nombre = $_POST['nombre'];
            $idusuario = $_POST['idusuario'];
            $password    = $_POST['password'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $rol = $_POST['rol'];
        } else {
            $nombre = "";
            $idusuario = "";
            $password    = "";
            $email = "";
            $telefono = "";
            $rol = "";
        }
        require_once "../inputs/nombre.php";
        require_once "../inputs/idUsuario.php";
        require_once "../inputs/password.php";
        require_once "../inputs/email.php";
        require_once "../inputs/telefono.php";
        require_once "../inputs/selectRol.php";

        require_once "../inputs/btnenviar.php";

        require_once "../headermain.php";
        require_once "create-content.php";
        require_once "../footermain.php";
?>