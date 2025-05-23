<?php
function solicitudesInquilinos() {
    $conexion = conectar();
    // Consulta para obtener todas las solicitudes
    $query = "SELECT s.*, 
                     c.c_numero AS numero_casa,
                     u.u_nombre AS nombre_inquilino,
                     resp.u_nombre AS nombre_responsable
              FROM solicitudes s
              JOIN casas c ON s.fk_c_id = c.c_id
              JOIN usuarios u ON s.fk_u_rfc = u.u_rfc
              LEFT JOIN usuarios resp ON s.fk_responsable_rfc = resp.u_rfc
              ORDER BY s.s_fecha DESC";
    
    $resultado = $conexion->query($query);
    
    // Mapeo de estados a clases de Bootstrap
    $estadosClases = [
        'pendiente' => 'bg-secondary',
        'en_proceso' => 'bg-warning text-dark',
        'completada' => 'bg-success',
        'rechazada' => 'bg-danger'
    ];
    
    $estadosTexto = [
        'pendiente' => 'Pendiente',
        'en_proceso' => 'En proceso',
        'completada' => 'Completada',
        'rechazada' => 'Rechazada'
    ];
    
    // Generar el HTML
    $html = '
    <div class="py-4">
        <div class="tab-pane fade show active" id="foro-tab">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Foro de Solicitudes</h5>
                        <div class="col-md-3">
                            <select class="form-select form-select-sm" id="filtro-estado">
                                <option value="todas">Todas las solicitudes</option>
                                <option value="pendiente">Pendientes</option>
                                <option value="en_proceso">En proceso</option>
                                <option value="completada">Completadas</option>
                                <option value="rechazada">Rechazadas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group" id="lista-solicitudes">';
    
    if ($resultado->num_rows > 0) {
        while ($solicitud = $resultado->fetch_assoc()) {
            $fecha = date('d/m/Y', strtotime($solicitud['s_fecha']));
            $fechaRespuesta = $solicitud['s_fecha_respuesta'] ? date('d/m/Y', strtotime($solicitud['s_fecha_respuesta'])) : '';
            
            $html .= '
            <div class="list-group-item mb-3 solicitud" data-estado="' . htmlspecialchars($solicitud['s_estado']) . '">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="mb-0">' . htmlspecialchars($solicitud['s_titulo']) . '</h6>
                    <span class="badge ' . $estadosClases[$solicitud['s_estado']] . '">' . $estadosTexto[$solicitud['s_estado']] . '</span>
                </div>
                <p class="text-muted small mb-2">Casa ' . htmlspecialchars($solicitud['numero_casa']) . ' - ' . htmlspecialchars($solicitud['nombre_inquilino']) . ' | ' . $fecha . '</p>
                <p class="mb-2">' . nl2br(htmlspecialchars($solicitud['s_descripcion'])) . '</p>';
            
            if (!empty($solicitud['s_respuesta'])) {
                $html .= '
                <div class="bg-light p-3 rounded">
                    <p class="mb-0"><strong>Respuesta del comité:</strong> ' . nl2br(htmlspecialchars($solicitud['s_respuesta']));
                
                if (!empty($solicitud['nombre_responsable'])) {
                    $html .= ' (Respondido por: ' . htmlspecialchars($solicitud['nombre_responsable']) . ')';
                }
                
                if (!empty($fechaRespuesta)) {
                    $html .= ' | ' . $fechaRespuesta;
                }
                
                $html .= '</p>
                </div>';
            }
            
            $html .= '
            </div>';
        }
    } else {
        $html .= '
            <div class="list-group-item">
                <p class="mb-0 text-muted">No hay solicitudes registradas en el foro.</p>
            </div>';
    }
    
    $html .= '
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script para filtrar solicitudes por estado -->
    <script>
    document.getElementById("filtro-estado").addEventListener("change", function() {
        const estado = this.value;
        const solicitudes = document.querySelectorAll(".solicitud");
        
        solicitudes.forEach(solicitud => {
            if (estado === "todas" || solicitud.dataset.estado === estado) {
                solicitud.style.display = "block";
            } else {
                solicitud.style.display = "none";
            }
        });
    });
    </script>';
    
    return $html;
    $conexion->close();
}
?>