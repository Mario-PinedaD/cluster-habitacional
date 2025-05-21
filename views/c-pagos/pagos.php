<?php
session_start();
$ruta_base = '../../'; // Ruta base para los archivos CSS y JS
include($ruta_base . 'headermain.php');
$ruta_base = '../'; // Ruta base para los archivos CSS y JS
include($ruta_base . 'recursos/headsuperior.php'); // incluye el menu para la parte superior
include($ruta_base . 'recursos/navbar.php');


echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
echo createnavbar();

echo getPagos(); 
?>