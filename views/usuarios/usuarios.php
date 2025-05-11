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

          <form action="operacionusuarios.php" method="post"> <!-- <-- AQUÍ -->
            <div class="modal-header">
              <h5 class="modal-title" id="modalNuevoUsuarioLabel">Nuevo Inquilino</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
              <input type="hidden" name="action" value="create">

              <div class="mb-3">
                <label for="new_u_nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="u_nombre" id="new_u_nombre" required>
              </div>

              <div class="mb-3">
                <label for="new_u_rfc" class="form-label">RFC</label>
                <input type="text" class="form-control" name="u_rfc" id="new_u_rfc" required>
              </div>

              <div class="mb-3">
                <label for="new_u_email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="u_email" id="new_u_email" required>
              </div>

              <div class="mb-3">
                <label for="new_u_password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="u_password" id="new_u_password" required>
              </div>

              <div class="mb-3">
                <label for="new_u_telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="u_telefono" id="new_u_telefono" required>
              </div>

              <div class="mb-3">
                <label for="new_u_rol" class="form-label">Rol</label>
                <select class="form-select" name="u_rol" id="new_u_rol" required>
                  <option value="inquilino">Inquilino</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
          </form>

        </div>
      </div>
    </div>
