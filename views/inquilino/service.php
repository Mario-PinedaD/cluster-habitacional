<?php
function solicitudServicio() {
    $conexion = conectar();
    // Consulta para obtener todas las solicitudes de servicio
    $query = "SELECT s.*, 
                     c.c_numero AS numero_casa,
                     u.u_nombre AS nombre_inquilino,
                     u.u_telefono AS telefono_inquilino,
                     resp.u_nombre AS nombre_responsable,
                     resp.u_rol AS rol_responsable
              FROM solicitudes s
              JOIN casas c ON s.fk_c_id = c.c_id
              JOIN usuarios u ON s.fk_u_rfc = u.u_rfc
              LEFT JOIN usuarios resp ON s.fk_responsable_rfc = resp.u_rfc
              ORDER BY s.s_fecha DESC";
    
    $resultado = $conexion->query($query);
    
    // Mapeo de estados
    $estadosClases = [
        'pendiente' => 'bg-secondary',
        'en_proceso' => 'bg-warning text-dark',
        'completada' => 'bg-success',
        'rechazada' => 'bg-danger'
    ];
    
    $estadosTexto = [
        'pendiente' => 'Pendiente',
        'en_proceso' => 'En proceso',
        'completada' => 'Atendida',
        'rechazada' => 'Rechazada'
    ];
    
    // Generar el HTML
    $html = '
    <div class="container-fluid py-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0"><i class="fas fa-tools me-2"></i>Solicitudes de Servicios al Comité</h3>
                    <div>
                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#nuevaSolicitudModal">
                            <i class="fas fa-plus me-1"></i> Nueva Solicitud
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <!-- Filtros y buscador -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <select class="form-select" id="filtro-estado">
                            <option value="todas">Todas las solicitudes</option>
                            <option value="pendiente">Pendientes</option>
                            <option value="en_proceso">En proceso</option>
                            <option value="completada">Atendidas</option>
                            <option value="rechazada">Rechazadas</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="buscador-solicitudes" placeholder="Buscar por casa, nombre o tema...">
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-outline-secondary" id="btn-actualizar">
                            <i class="fas fa-sync-alt"></i> Actualizar
                        </button>
                    </div>
                </div>
                
                <!-- Listado de solicitudes -->
                <div class="list-group" id="lista-solicitudes">';
    
    if ($resultado->num_rows > 0) {
        while ($solicitud = $resultado->fetch_assoc()) {
            $fecha = date('d/m/Y H:i', strtotime($solicitud['s_fecha']));
            $fechaRespuesta = $solicitud['s_fecha_respuesta'] ? date('d/m/Y H:i', strtotime($solicitud['s_fecha_respuesta'])) : '';
            
            $html .= '
            <div class="list-group-item mb-3 solicitud" data-estado="' . htmlspecialchars($solicitud['s_estado']) . '" data-casa="' . htmlspecialchars($solicitud['numero_casa']) . '" data-nombre="' . htmlspecialchars($solicitud['nombre_inquilino']) . '">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h5 class="mb-1">' . htmlspecialchars($solicitud['s_titulo']) . '</h5>
                        <small class="text-muted">
                            <i class="fas fa-home"></i> Casa ' . htmlspecialchars($solicitud['numero_casa']) . ' | 
                            <i class="fas fa-user"></i> ' . htmlspecialchars($solicitud['nombre_inquilino']) . ' | 
                            <i class="fas fa-phone"></i> ' . htmlspecialchars($solicitud['telefono_inquilino']) . ' | 
                            <i class="fas fa-clock"></i> ' . $fecha . '
                        </small>
                    </div>
                    <span class="badge ' . $estadosClases[$solicitud['s_estado']] . '">' . $estadosTexto[$solicitud['s_estado']] . '</span>
                </div>
                
                <div class="mb-3">
                    <p class="mb-2">' . nl2br(htmlspecialchars($solicitud['s_descripcion'])) . '</p>
                </div>';
            
            if (!empty($solicitud['s_respuesta'])) {
                $html .= '
                <div class="bg-light p-3 rounded respuesta-comite">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong class="text-primary">
                            <i class="fas fa-comment-dots"></i> Respuesta del Comité';
                
                if (!empty($solicitud['nombre_responsable'])) {
                    $html .= ' (' . htmlspecialchars($solicitud['rol_responsable']) . ': ' . htmlspecialchars($solicitud['nombre_responsable']) . ')';
                }
                
                $html .= '</strong>';
                
                if (!empty($fechaRespuesta)) {
                    $html .= '<small class="text-muted"><i class="fas fa-clock"></i> ' . $fechaRespuesta . '</small>';
                }
                
                $html .= '
                    </div>
                    <p class="mb-0">' . nl2br(htmlspecialchars($solicitud['s_respuesta'])) . '</p>
                </div>';
            }
            
            $html .= '
            </div>';
        }
    } else {
        $html .= '
            <div class="list-group-item text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No hay solicitudes registradas</h5>
                <p class="text-muted">Puedes crear la primera solicitud de servicio</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevaSolicitudModal">
                    <i class="fas fa-plus me-1"></i> Crear Solicitud
                </button>
            </div>';
    }
    
    $html .= '
                </div>
            </div>
            
            <!-- Modal para nueva solicitud -->
            <div class="modal fade" id="nuevaSolicitudModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Nueva Solicitud de Servicio</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-nueva-solicitud">
                                <div class="mb-3">
                                    <label class="form-label">Título de la solicitud</label>
                                    <input type="text" class="form-control" name="titulo" required placeholder="Ej: Reparación de tubería en área común">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Descripción detallada</label>
                                    <textarea class="form-control" name="descripcion" rows="5" required placeholder="Describa el problema o servicio requerido..."></textarea>
                                </div>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> Su solicitud será visible para todos los residentes y será atendida por el comité.
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="btn-enviar-solicitud">Enviar Solicitud</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts para funcionalidad -->
    <script>
    $(document).ready(function() {
        // Filtrado por estado
        $("#filtro-estado").change(function() {
            const estado = $(this).val();
            $(".solicitud").each(function() {
                if (estado === "todas" || $(this).data("estado") === estado) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        // Buscador
        $("#buscador-solicitudes").keyup(function() {
            const texto = $(this).val().toLowerCase();
            $(".solicitud").each(function() {
                const casa = $(this).data("casa").toString();
                const nombre = $(this).data("nombre").toLowerCase();
                const titulo = $(this).find("h5").text().toLowerCase();
                
                if (casa.includes(texto) || nombre.includes(texto) || titulo.includes(texto)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        // Envío de nueva solicitud
        $("#btn-enviar-solicitud").click(function() {
            const formData = $("#form-nueva-solicitud").serialize();
            
            $.ajax({
                url: "procesar_solicitud.php",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert("Error: " + response.message);
                    }
                },
                error: function() {
                    alert("Error al enviar la solicitud");
                }
            });
        });
        
        // Actualizar listado
        $("#btn-actualizar").click(function() {
            location.reload();
        });
    });
    </script>';
    
    return $html;
    $conexion->close();
}
?>