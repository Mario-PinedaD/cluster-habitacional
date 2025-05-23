<?php
session_start();
$ruta_base = "../";
include($ruta_base . 'recursos/headsuperior.php');
include($ruta_base . 'recursos/u-navbar.php');

require_once 'service.php';
echo solicitudServicio();
?>