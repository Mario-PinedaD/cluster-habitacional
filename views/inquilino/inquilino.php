<?php
session_start();
$ruta = "../";

include($ruta . 'recursos/headsuperior.php');
include($ruta . 'recursos/u-navbar.php');

echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
echo createnavbar();
?>

    <div class="">
        <!-- Banner de bienvenida -->
        <div class="text-center bg-light p-5 rounded-3 mb-4">
            <h1 class="display-4 fw-bold text-primary">¡Bienvenido a tu nuevo hogar!</h1>
            <p class="lead text-muted">Estamos encantados de tenerte como parte de nuestra comunidad</p>
            <div class="fs-1 my-3">🏠</div>
        </div>

        <!-- Mensaje de bienvenida -->
        <section class="mb-5 bg-light p-4 rounded-3">
            <h2 class="border-bottom pb-2 mb-3">Mensaje de bienvenida</h2>
            <div class="px-3">
                <p>Estimado residente,</p>
                <p>En nombre de toda la comunidad, queremos darte la más cordial bienvenida a tu nuevo hogar. Estamos comprometidos con hacer de este espacio un lugar seguro, agradable y en armonía para todos.</p>
                <p>No dudes en contactarnos para cualquier inquietud o sugerencia. ¡Deseamos que tu estancia aquí sea placentera!</p>
                <p class="fst-italic fw-bold mt-3">El equipo de administración</p>
            </div>
        </section>

<?php
require_once "service.php";
echo solicitudServicio();
?>