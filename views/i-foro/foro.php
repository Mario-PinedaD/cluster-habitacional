<?php
$ruta = "../";
include($ruta . 'recursos/headsuperior.php');
include($ruta . 'recursos/u-navbar.php');
session_start();
echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
echo createnavbar();

echo solicitudesInquilinos();
?>

