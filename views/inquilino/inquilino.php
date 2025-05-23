<?php
session_start();
$ruta = "../";

include($ruta . 'recursos/headsuperior.php');
include($ruta . 'recursos/u-navbar.php');

echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
echo createnavbar();
?>

    <div class="body">
        <!-- Banner de bienvenida -->
        <div class="text-center bg-light p-5 rounded-3 mb-4">
            <h1 class="display-4 fw-bold text-primary">¡Bienvenido a tu nuevo hogar!</h1>
            <p class="lead text-muted">Estamos encantados de tenerte como parte de nuestra comunidad</p>
            <div class="fs-1 my-3">🏠</div>
        </div>

        <!-- Acciones rápidas -->
        <section class="mb-5">
            <h2 class="border-bottom pb-2 mb-3">Acciones rápidas</h2>
            <div class="row g-3">
                <div class="col-md-3 col-sm-6">
                    <a href="#pagos" class="btn btn-primary w-100 py-3 fw-bold">Realizar un pago</a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#reportes" class="btn btn-primary w-100 py-3 fw-bold">Reportar incidencia</a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#reservas" class="btn btn-primary w-100 py-3 fw-bold">Reservar áreas</a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#contacto" class="btn btn-primary w-100 py-3 fw-bold">Contactar administración</a>
                </div>
            </div>
        </section>

        <!-- Información importante -->
        <section class="mb-5">
            <h2 class="border-bottom pb-2 mb-3">Información importante</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Normas de convivencia</h3>
                            <p class="card-text">Consulta nuestro reglamento interno para una armoniosa convivencia.</p>
                            <a href="#normas" class="btn btn-outline-primary">Ver normas</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Horarios y servicios</h3>
                            <p class="card-text">Conoce los horarios de las áreas comunes y servicios disponibles.</p>
                            <a href="#horarios" class="btn btn-outline-primary">Ver horarios</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title text-primary">Próximos eventos</h3>
                            <p class="card-text">Participa en las actividades comunitarias programadas.</p>
                            <a href="#eventos" class="btn btn-outline-primary">Ver eventos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <!-- Contactos de emergencia -->
        <section class="mb-4">
            <h2 class="border-bottom pb-2 mb-3">Contactos de emergencia</h2>
            <div class="list-group">
                <div class="list-group-item list-group-item-danger">
                    <strong>Administración:</strong> 555-1234 (8:00 am - 5:00 pm)
                </div>
                <div class="list-group-item list-group-item-danger">
                    <strong>Emergencias 24h:</strong> 555-7890
                </div>
                <div class="list-group-item list-group-item-danger">
                    <strong>Seguridad:</strong> 555-5678
                </div>
                <div class="list-group-item list-group-item-danger">
                    <strong>Mantenimiento urgente:</strong> 555-9012
                </div>
            </div>
        </section>
