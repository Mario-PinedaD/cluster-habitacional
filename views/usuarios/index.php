<?php
// Verificar si es una petición AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    require_once "../../db/conect-json.php";
    header('Content-Type: application/json');
    
    // Procesar operaciones AJAX
    require_once "operaciones_ajax.php";
    exit;
}

// Si no es AJAX, cargar la interfaz normal
require_once "../../db/conect-json.php";
require_once "../../db/conexion.php";
$ruta_base = "../../";
include($ruta_base . 'headermain.php');
require_once "creartabla.php";
require_once "usuarios.php";
include($ruta_base . 'footermain.php');
?>