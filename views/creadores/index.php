<?php
session_start();
$ruta_base = "../../";
include($ruta_base . 'headermain.php');
$ruta = "../";
include($ruta . 'recursos/headsuperior.php');
include($ruta . 'recursos/u-navbar.php');

echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
echo createnavbar();
?>

<div class="creadores-container">
        <h1 class="creadores-title">CREADORES</h1>
        
        <div class="creadores-list">
            <div class="creador">
                <img src="../../img/mario.webp" alt="Creador 1" class="creador-img">
                <div class="creador-nombre">Pineda Dominguez, Mario Alfredo</div>
            </div>
            
            <div class="creador">
                <img src="../../img/marisol.webp" alt="Creador 2" class="creador-img">
                <div class="creador-nombre">Cruz Ramirez, Marisol</div>
            </div>
            
            <div class="creador">
                <img src="https://via.placeholder.com/150" alt="Creador 3" class="creador-img">
                <div class="creador-nombre">Frida Paolette</div>
            </div>
        </div>
    </div>

<?php
$ruta='../../';
include($ruta . 'footermain.php');
?>