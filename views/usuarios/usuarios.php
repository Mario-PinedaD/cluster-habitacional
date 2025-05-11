<?php
session_start();
require_once "../recursos/headsuperior.php";
require_once "../recursos/navbar.php";
?>
<?php
    echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
    echo createnavbar();
?>
    <!-- Página de Usuarios -->
    <div class="container-fluid my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Usuarios</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario">
        Añadir usuario
        </button>
    </div>

    <!-- Aquí podría ir una tabla o lista de usuarios registrados -->
    <!--p>No hay usuarios registrados aún.</p-->
    <?php
        echo crearTabla();
    ?>
    </div>

    <!-- Modal para añadir usuario -->
    <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-labelledby="modalNuevoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalNuevoUsuarioLabel">Nuevo Inquilino</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
            <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">RFC</label>
                <input type="text" class="form-control" id="rfc" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol">
                <option value="usuario">Inquilino</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Añadir</button>
            </form>
        </div>
        </div>
    </div>
    </div>
