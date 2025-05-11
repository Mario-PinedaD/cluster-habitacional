<?php
require_once "../../db/conexion.php";
$cn = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['action']) || $_POST['action'] !== 'create') {
        echo "Acción inválida";
        exit;
    }

    // Recolectar y limpiar datos del formulario
    $data = [
        'u_rfc' => trim($_POST['u_rfc']),
        'u_nombre' => trim($_POST['u_nombre']),
        'u_email' => trim($_POST['u_email']),
        'u_password' => trim($_POST['u_password']), // sin hash
        'u_telefono' => trim($_POST['u_telefono']),
        'u_rol' => strtolower(trim($_POST['u_rol'])) // muy importante: ENUM debe coincidir exactamente
    ];

    echo $data['u_rol'];
    $resultado = insertarUsuario($cn, $data);

    if ($resultado['success']) {
        echo "<script>alert('{$resultado['message']}'); window.history.back();</script>";
    } else {
        echo "<script>alert('{$resultado['message']}'); window.history.back();</script>";
    }
    exit;
}

function insertarUsuario($cn, $data) {
    // Verificar duplicado de RFC
    $stmt = $cn->prepare("SELECT COUNT(*) FROM usuarios WHERE u_rfc = ?");
    $stmt->bind_param('s', $data['u_rfc']);
    $stmt->execute();
    $stmt->bind_result($countRfc);
    $stmt->fetch();
    $stmt->close();

    if ($countRfc > 0) {
        return ['success' => false, 'message' => 'El RFC ya existe'];
    }

    // Verificar duplicado de Email
    $stmt = $cn->prepare("SELECT COUNT(*) FROM usuarios WHERE u_email = ?");
    $stmt->bind_param('s', $data['u_email']);
    $stmt->execute();
    $stmt->bind_result($countEmail);
    $stmt->fetch();
    $stmt->close();

    if ($countEmail > 0) {
        return ['success' => false, 'message' => 'El email ya está registrado'];
    }

    // Insertar nuevo usuario (contraseña sin hashear)
    $stmt = $cn->prepare("INSERT INTO usuarios 
        (u_rfc, u_nombre, u_email, u_password, u_telefono, u_rol, u_fecha_registro, u_activo) 
        VALUES (?, ?, ?, ?, ?, ?, NOW(), 1)");

    $stmt->bind_param(
        'ssssss',
        $data['u_rfc'],
        $data['u_nombre'],
        $data['u_email'],
        $data['u_password'],
        $data['u_telefono'],
        $data['u_rol']
    );

    if ($stmt->execute()) {
        $stmt->close();
        return ['success' => true, 'message' => 'Usuario creado correctamente'];
    } else {
        $stmt->close();
        return ['success' => false, 'message' => 'Error al insertar el usuario: ' . $cn->error];
    }
}
?>
