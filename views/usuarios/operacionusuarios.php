<?php
require_once "../../db/conexion.php";
$cn = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['action'])) {
        echo "Acción inválida";
        exit;
    }

    $action = $_POST['action'];
    $resultado = [];

    switch ($action) {
        case 'create':
            // Recolectar y limpiar datos del formulario
            $data = [
                'u_rfc' => trim($_POST['new_u_rfc']),
                'u_nombre' => trim($_POST['new_u_nombre']),
                'u_email' => trim($_POST['new_u_email']),
                'u_password' => trim($_POST['new_u_password']),
                'u_telefono' => trim($_POST['new_u_telefono']),
                'u_rol' => strtolower(trim($_POST['new_u_rol']))
            ];
            $resultado = insertarUsuario($cn, $data);
            break;
        case 'update':
            $data = [
                'u_rfc' => trim($_POST['u_rfc'])
            ];
            $newData = [
                'u_nombre' => trim($_POST['edit_u_nombre']),
                'u_email' => trim($_POST['edit_u_email']),
                'u_password' => trim($_POST['edit_u_password']),
                'u_telefono' => trim($_POST['edit_u_telefono']),
                'u_rol' => strtolower(trim($_POST['edit_u_rol']))
            ];
            $resultado = modificarUsuario($cn, $data, $newData);
            break;
        case 'delete':
            $data = [
                'u_rfc' => trim($_POST['u_rfc'])
            ];
            $resultado = borrarUsuario($cn, $data['u_rfc']);
            break;
        default:
            $resultado = ['success' => false, 'message' => 'Acción no válida'];
            break;
    }

    echo "<script>alert('{$resultado['message']}'); window.history.back();</script>";
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

function modificarUsuario($cn, $data, $newData) {
    // Verificar que el usuario existe
    $stmt = $cn->prepare("SELECT u_rfc FROM usuarios WHERE u_rfc = ?");
    $stmt->bind_param('s', $data['u_rfc']);
    $stmt->execute();
    $stmt->bind_result($u_rfc);
    $stmt->fetch();
    $stmt->close();

    if (!$u_rfc) {
        return ['success' => false, 'message' => 'El usuario no existe' + $data + ' '+ $newData];
    }

    // Verificar duplicado de Email (excepto para este usuario)
    $stmt = $cn->prepare("SELECT COUNT(*) FROM usuarios WHERE u_email = ? AND u_rfc != ?");
    $stmt->bind_param('si', $data['u_email'], $u_rfc);
    $stmt->execute();
    $stmt->bind_result($countEmail);
    $stmt->fetch();
    $stmt->close();

    if ($countEmail > 0) {
        return ['success' => false, 'message' => 'El email ya está registrado por otro usuario'];
    }

    // Actualizar usuario
    $stmt = $cn->prepare("UPDATE usuarios SET 
        u_nombre = ?,
        u_email = ?,
        u_password = ?,
        u_telefono = ?,
        u_rol = ?
        WHERE u_rfc = ?");

    $stmt->bind_param(
        'ssssss',
        $newData['u_nombre'],
        $newData['u_email'],
        $newData['u_password'],
        $newData['u_telefono'],
        $newData['u_rol'],
        $data['u_rfc']
    );

    if ($stmt->execute()) {
        $stmt->close();
        return ['success' => true, 'message' => 'Usuario actualizado correctamente'];
    } else {
        $stmt->close();
        return ['success' => false, 'message' => 'Error al actualizar el usuario: ' . $cn->error];
    }
}

function borrarUsuario($cn, $rfc) {
    // Verificar que el usuario existe
    $stmt = $cn->prepare("SELECT u_rfc FROM usuarios WHERE u_rfc = ?");
    $stmt->bind_param('s', $rfc);
    $stmt->execute();
    $stmt->bind_result($u_rfc);
    $stmt->fetch();
    $stmt->close();

    if (!$u_rfc) {
        return ['success' => false, 'message' => 'El usuario no existe'];
    }

    // Borrar usuario (o marcar como inactivo)
    // Opción 1: Borrado físico
    $stmt = $cn->prepare("DELETE FROM usuarios WHERE u_rfc = ?");
    
    // Opción 2: Borrado lógico (recomendado)
    // $stmt = $cn->prepare("UPDATE usuarios SET u_activo = 0 WHERE u_rfc = ?");
    
    $stmt->bind_param('s', $rfc);

    if ($stmt->execute()) {
        $stmt->close();
        return ['success' => true, 'message' => 'Usuario eliminado correctamente'];
    } else {
        $stmt->close();
        return ['success' => false, 'message' => 'Error al eliminar el usuario: ' . $cn->error];
    }
}

?>
