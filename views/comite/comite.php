<?php
$ruta_base = '../../'; // Ruta base para los archivos CSS y JS
include($ruta_base . 'headermain.php'); // Incluye el encabezado principal
$ruta_base = '../'; // Ruta base para los archivos CSS y JS
session_start();
require_once "../recursos/headsuperior.php"; // Incluye el encabezado superior
require_once "../recursos/navbar.php"; // Incluye la barra de navegación
?>
<?php
    echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
    echo createnavbar();
?>
<div class="mx-auto mt-4" style="width: 80%;">
    <h1 class="mb-4">Reglamento General</h1>
    <p>Bienvenido a nuestra plataforma. A continuación se detallan las reglas básicas de uso que todos los usuarios deben seguir para garantizar un ambiente respetuoso y funcional.</p>
    
    <h4>📌 Reglas de Uso</h4>
    <ul>
      <li>Respetar a los inquilinos.</li>
      <li>No compartir información falsa o malintencionada.</li>
      <li>Evitar el uso de lenguaje ofensivo o inapropiado.</li>
      <li>Utilizar la plataforma solo para los fines establecidos por el programa.</li>
    </ul>

    <h4 class="mt-5">🗓️ Programa General</h4>
    <p>Este es el cronograma previsto para el desarrollo del programa actual:</p>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Actividad</th>
          <th>Responsable</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>10 de Mayo</td>
          <td>Inicio de inscripciones</td>
          <td>Coordinación</td>
        </tr>
        <tr>
          <td>15 de Mayo</td>
          <td>Capacitación inicial</td>
          <td>Equipo de Formación</td>
        </tr>
        <tr>
          <td>20 de Mayo</td>
          <td>Inicio de actividades</td>
          <td>Participantes</td>
        </tr>
      </tbody>
    </table>
</div>

<?php
function comiteSolicitudes() {
    $conexion = conectar();
    // Consulta para obtener todas las solicitudes
    $query = "SELECT s.*, 
                     c.c_numero AS numero_casa,
                     u.u_nombre AS nombre_inquilino,
                     u.u_telefono AS telefono_inquilino
              FROM solicitudes s
              JOIN casas c ON s.fk_c_id = c.c_id
              JOIN usuarios u ON s.fk_u_rfc = u.u_rfc
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
    
    // Procesar formularios si se enviaron
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $s_id = $_POST['s_id'];
        $accion = $_POST['accion'];
        $respuesta = $_POST['respuesta'];
        
        // Actualizar según la acción
        switch ($accion) {
            case 'aceptar':
                $nuevo_estado = 'en_proceso';
                break;
            case 'finalizar':
                $nuevo_estado = 'completada';
                break;
            case 'rechazar':
                $nuevo_estado = 'rechazada';
                break;
            default:
                $nuevo_estado = 'pendiente';
        }
        
        $update = $conexion->prepare("UPDATE solicitudes 
                                    SET s_estado = ?, 
                                        s_respuesta = ?, 
                                        s_fecha_respuesta = NOW(),
                                        fk_responsable_rfc = ?
                                    WHERE s_id = ?");
        $usuario_actual = $_SESSION['usuario_rfc']; // Ajusta según tu sistema de autenticación
        $update->bind_param("sssi", $nuevo_estado, $respuesta, $usuario_actual, $s_id);
        $update->execute();
        
        // Recargar para ver los cambios
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    
    // Generar el HTML
    $html = '
    <div class="container-fluid py-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0"><i class="fas fa-tools me-2"></i>Panel del Comité - Solicitudes de Servicios</h3>
                </div>
            </div>
            
            <div class="card-body">
                <!-- Filtros -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <form method="get" class="d-flex">
                            <select class="form-select" name="filtro_estado">
                                <option value="todas"'.(!isset($_GET['filtro_estado']) || $_GET['filtro_estado'] == 'todas' ? ' selected' : '').'>Todas las solicitudes</option>
                                <option value="pendiente"'.(isset($_GET['filtro_estado']) && $_GET['filtro_estado'] == 'pendiente' ? ' selected' : '').'>Pendientes</option>
                                <option value="en_proceso"'.(isset($_GET['filtro_estado']) && $_GET['filtro_estado'] == 'en_proceso' ? ' selected' : '').'>En proceso</option>
                                <option value="completada"'.(isset($_GET['filtro_estado']) && $_GET['filtro_estado'] == 'completada' ? ' selected' : '').'>Atendidas</option>
                                <option value="rechazada"'.(isset($_GET['filtro_estado']) && $_GET['filtro_estado'] == 'rechazada' ? ' selected' : '').'>Rechazadas</option>
                            </select>
                            <button type="submit" class="btn btn-outline-primary ms-2">Filtrar</button>
                        </form>
                    </div>
                </div>
                
                <!-- Listado de solicitudes -->
                <div class="list-group">';
    
    $mostrar_solicitudes = false;
    
    if ($resultado->num_rows > 0) {
        while ($solicitud = $resultado->fetch_assoc()) {
            // Aplicar filtro si existe
            if (isset($_GET['filtro_estado']) && $_GET['filtro_estado'] != 'todas' && $solicitud['s_estado'] != $_GET['filtro_estado']) {
                continue;
            }
            
            $mostrar_solicitudes = true;
            $fecha = date('d/m/Y H:i', strtotime($solicitud['s_fecha']));
            $fechaRespuesta = $solicitud['s_fecha_respuesta'] ? date('d/m/Y H:i', strtotime($solicitud['s_fecha_respuesta'])) : '';
            
            $html .= '
            <div class="list-group-item mb-3">
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
                    <strong class="text-primary">
                        <i class="fas fa-comment-dots"></i> Respuesta del Comité
                    </strong>';
                
                if (!empty($fechaRespuesta)) {
                    $html .= '<small class="text-muted ms-2"><i class="fas fa-clock"></i> ' . $fechaRespuesta . '</small>';
                }
                
                $html .= '
                    <p class="mb-0 mt-2">' . nl2br(htmlspecialchars($solicitud['s_respuesta'])) . '</p>
                </div>';
            }
            
            // Botones de acción para solicitudes pendientes
            if ($solicitud['s_estado'] == 'pendiente') {
                $html .= '
                <div class="mt-3">
                    <form method="post" class="d-inline">
                        <input type="hidden" name="s_id" value="' . $solicitud['s_id'] . '">
                        <input type="hidden" name="accion" value="aceptar">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="collapse" data-bs-target="#respuesta-aceptar-' . $solicitud['s_id'] . '">
                            <i class="fas fa-check"></i> Aceptar (En proceso)
                        </button>
                        
                        <div class="collapse mt-2" id="respuesta-aceptar-' . $solicitud['s_id'] . '">
                            <div class="card card-body">
                                <textarea name="respuesta" class="form-control mb-2" placeholder="Comentarios (opcional)"></textarea>
                                <button type="submit" class="btn btn-sm btn-success">Confirmar</button>
                            </div>
                        </div>
                    </form>
                    
                    <form method="post" class="d-inline mx-2">
                        <input type="hidden" name="s_id" value="' . $solicitud['s_id'] . '">
                        <input type="hidden" name="accion" value="finalizar">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="collapse" data-bs-target="#respuesta-finalizar-' . $solicitud['s_id'] . '">
                            <i class="fas fa-flag-checkered"></i> Finalizar (Atendida)
                        </button>
                        
                        <div class="collapse mt-2" id="respuesta-finalizar-' . $solicitud['s_id'] . '">
                            <div class="card card-body">
                                <textarea name="respuesta" class="form-control mb-2" placeholder="Describa la solución aplicada"></textarea>
                                <button type="submit" class="btn btn-sm btn-primary">Confirmar</button>
                            </div>
                        </div>
                    </form>
                    
                    <form method="post" class="d-inline">
                        <input type="hidden" name="s_id" value="' . $solicitud['s_id'] . '">
                        <input type="hidden" name="accion" value="rechazar">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="collapse" data-bs-target="#respuesta-rechazar-' . $solicitud['s_id'] . '">
                            <i class="fas fa-times"></i> Rechazar
                        </button>
                        
                        <div class="collapse mt-2" id="respuesta-rechazar-' . $solicitud['s_id'] . '">
                            <div class="card card-body">
                                <textarea name="respuesta" class="form-control mb-2" placeholder="Motivo del rechazo"></textarea>
                                <button type="submit" class="btn btn-sm btn-danger">Confirmar</button>
                            </div>
                        </div>
                    </form>
                </div>';
            }
            
            $html .= '
            </div>';
        }
    }
    
    if (!$mostrar_solicitudes) {
        $html .= '
            <div class="list-group-item text-center py-5">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No hay solicitudes '.(isset($_GET['filtro_estado']) ? str_replace('_', ' ', $_GET['filtro_estado']) : '').'</h5>
            </div>';
    }
    
    $html .= '
                </div>
            </div>
        </div>
    </div>';
    
    return $html;
    $conexion->close();
}
  echo comiteSolicitudes();
?>