<?php
function crearTabla(){
    $cn = conectar();
    $sqlSelect = "SELECT u_rfc, u_nombre, u_telefono, u_rol, u_email FROM usuarios WHERE u_rol = 'inquilino' ORDER BY u_rfc;";
    $resultSet = $cn->query($sqlSelect);

    // Iniciar la tabla
    $tabla = "<table class='table table-striped table-bordered'>
        <thead>
            <tr>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>";
    
    // Procesar cada fila
    while($row = $resultSet->fetch_assoc()){
        $tabla .= "<tr>
                    <td>".htmlspecialchars($row['u_rfc'])."</td>
                    <td>".htmlspecialchars($row['u_nombre'])."</td>
                    <td>".htmlspecialchars($row['u_telefono'])."</td>
                    <td>".htmlspecialchars($row['u_email'])."</td>
                    <td class='text-capitalize'>".htmlspecialchars($row['u_rol'])."</td>
                    <td>
                        <!-- Botón para abrir modal de modificación -->
                        <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#modalModificar".htmlspecialchars($row['u_rfc'])."'>
                            Modificar
                        </button>
                        
                        <!-- Formulario para borrar -->
                        <form method='post' action='operacionusuarios.php' style='display:inline;' onsubmit='return confirm(\"¿Estás seguro de borrar este usuario?\");'>
                            <input type='hidden' name='action' value='delete'>
                            <input type='hidden' name='u_rfc' value='".htmlspecialchars($row['u_rfc'])."'>
                            <button type='submit' class='btn btn-danger btn-sm'>Borrar</button>
                        </form>
                    </td>
                </tr>";
        
        // Añadir modal de modificación para ESTE usuario específico
        $tabla .= '
        <!-- Modal para modificar usuario -->
        <div class="modal fade" id="modalModificar'.htmlspecialchars($row['u_rfc']).'" tabindex="-1" aria-labelledby="modalModificarLabel'.htmlspecialchars($row['u_rfc']).'" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="operacionusuarios.php">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="u_rfc_original" value="'.htmlspecialchars($row['u_rfc']).'">
                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalModificarLabel'.htmlspecialchars($row['u_rfc']).'">Modificar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="u_rfc'.htmlspecialchars($row['u_rfc']).'" class="form-label">RFC</label>
                                <input type="text" class="form-control" id="u_rfc'.htmlspecialchars($row['u_rfc']).'" name="u_rfc" deactivate value="'.htmlspecialchars($row['u_rfc']).'" readonly required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="edit_u_nombre'.htmlspecialchars($row['u_rfc']).'" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="edit_u_nombre'.htmlspecialchars($row['u_rfc']).'" name="edit_u_nombre" value="'.htmlspecialchars($row['u_nombre']).'" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="edit_u_email'.htmlspecialchars($row['u_rfc']).'" class="form-label">Email</label>
                                <input type="email" class="form-control" id="edit_u_email'.htmlspecialchars($row['u_rfc']).'" name="edit_u_email" value="'.htmlspecialchars($row['u_email']).'" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="edit_u_password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="edit_u_password" id="edit_u_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_u_telefono'.htmlspecialchars($row['u_rfc']).'" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="edit_u_telefono'.htmlspecialchars($row['u_rfc']).'" name="edit_u_telefono" value="'.htmlspecialchars($row['u_telefono']).'">
                            </div>
                            
                            <div class="mb-3">
                                <label for="edit_u_rol'.htmlspecialchars($row['u_rfc']).'" class="form-label">Rol</label>
                                <select class="form-select" id="edit_u_rol'.htmlspecialchars($row['u_rfc']).'" name="edit_u_rol" required>
                                    <option value="inquilino" '.($row['u_rol'] == 'inquilino' ? 'selected' : '').'>Inquilino</option>
                                    <option value="propietario" '.($row['u_rol'] == 'propietario' ? 'selected' : '').'>Propietario</option>
                                    <option value="administrador" '.($row['u_rol'] == 'administrador' ? 'selected' : '').'>Administrador</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>';
    }
    
    $tabla .= "</tbody></table>";
    return $tabla;
}
?>