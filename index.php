<?php
session_start();
require_once 'db/conexion.php';
require_once 'headermain.php';

require_once 'inputs/email.php';
require_once 'inputs/password.php';
require_once 'inputs/btnenviar.php';
require_once 'inputs/msjerror.php';

if(isset($_POST['btnenviar'])) {
    $email = $_POST['email'];
    $password = trim($_POST['password']); // Limpia espacios en blanco

    if (validarEmail($email) && validarPassword($password)) {
        $cn = conectar();
        $sqlSelect = "SELECT u_rfc, u_nombre, u_password, u_rol FROM usuarios WHERE u_email = ?";
        $stmt = $cn->prepare($sqlSelect);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($u_rfc, $u_nombre, $u_password, $u_rol);
        
        if ($stmt->fetch()) {
            // Verificación mejorada de contraseña (funciona con hash y texto plano)
            if (password_verify($password, $u_password) || $password === $u_password) {
                $_SESSION['u_nombre'] = $u_nombre;
                $_SESSION['u_rfc'] = $u_rfc;
                $_SESSION['u_rol'] = $u_rol;
                if($u_rol == 'inquilino'){
                    header("Location:views/inquilino/index.php");
                }else{
                    header("Location: views/comite/index.php");
                }
                exit;
            } else {
                
            }
        } else {
            $mensajeError = "Usuario no encontrado.";
        }
        $stmt->close();
        $cn->close();
    } else {
        $mensajeError = "Email o contraseña inválidos.";
    }
} else {
    $email = "";
    $password = "";
}

require_once "bienvenida.php";
require_once 'footermain.php';
?>