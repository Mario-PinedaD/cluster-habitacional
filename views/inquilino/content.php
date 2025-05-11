<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cluster Habitacional - Panel del Inquilino</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --color-primary: #2c3e50;
            --color-secondary: #3498db;
            --color-accent: #e74c3c;
        }
        
        body {
            background-color: #f8f9fa;
        }
        
        .sidebar {
            background-color: var(--color-primary);
            color: white;
            height: 100vh;
            position: sticky;
            top: 0;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .user-badge {
            background-color: var(--color-secondary);
        }
        
        .calendar-day {
            height: 100px;
            overflow-y: auto;
        }
        
        .reservation-badge {
            font-size: 0.75rem;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                height: auto;
                position: relative;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar p-0">
                <div class="text-center p-4">
                    <h4>Cluster Habitacional</h4>
                    <p class="text-muted">Panel del Inquilino</p>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-bs-toggle="tab" data-bs-target="#pagos-tab">
                            <i class="bi bi-cash-coin me-2"></i>Pago de Mantenimiento
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#reservas-tab">
                            <i class="bi bi-calendar-event me-2"></i>Reservas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#solicitudes-tab">
                            <i class="bi bi-tools me-2"></i>Solicitudes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#historial-tab">
                            <i class="bi bi-receipt me-2"></i>Historial de Pagos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="tab" data-bs-target="#foro-tab">
                            <i class="bi bi-chat-left-text me-2"></i>Foro de Solicitudes
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4">Bienvenido, <span id="user-name">Juan Pérez</span></h2>
                    <div class="d-flex align-items-center">
                        <span class="badge user-badge me-3" id="user-house">Casa 24</span>
                        <button class="btn btn-danger btn-sm" id="logout-btn">
                            <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                        </button>
                    </div>
                </div>

                <!-- Alertas -->
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Recordatorio:</strong> La cuota de mantenimiento de $650 para este mes está pendiente de pago. 
                    Después del día 5 se aplicará un recargo de $50.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- Contenido de las pestañas -->
                <div class="tab-content">
                    <!-- Pago de Mantenimiento -->
                    <div class="tab-pane fade show active" id="pagos-tab">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Pago de Mantenimiento Mensual</h5>
                            </div>
                            <div class="card-body">
                                <form id="pago-form">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="mes-pago" class="form-label">Mes a pagar</label>
                                            <select class="form-select" id="mes-pago" required>
                                                <option value="">Seleccione un mes</option>
                                                <option value="2024-05">Mayo 2024</option>
                                                <option value="2024-06">Junio 2024</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="metodo-pago" class="form-label">Método de pago</label>
                                            <select class="form-select" id="metodo-pago" required>
                                                <option value="">Seleccione método</option>
                                                <option value="transferencia">Transferencia bancaria</option>
                                                <option value="efectivo">Efectivo</option>
                                                <option value="tarjeta">Tarjeta crédito/débito</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="cuota-base" class="form-label">Cuota base</label>
                                            <input type="text" class="form-control" id="cuota-base" value="$650" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="recargo" class="form-label">Recargo</label>
                                            <input type="text" class="form-control" id="recargo" value="$0" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="total-pagar" class="form-label">Total a pagar</label>
                                            <input type="text" class="form-control" id="total-pagar" value="$650" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="comprobante" class="form-label">Comprobante (opcional)</label>
                                        <input class="form-control" type="file" id="comprobante">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-check-circle me-1"></i> Realizar Pago
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Reservas -->
                    <div class="tab-pane fade" id="reservas-tab">
                        <div class="card mb-4">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" id="reservas-nav" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="palapa-tab" data-bs-toggle="tab" data-bs-target="#palapa-content" type="button">Palapa</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="alberca-tab" data-bs-toggle="tab" data-bs-target="#alberca-content" type="button">Alberca</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="reservas-content">
                                    <div class="tab-pane fade show active" id="palapa-content">
                                        <form id="reserva-palapa-form">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="fecha-palapa" class="form-label">Fecha</label>
                                                    <input type="date" class="form-control" id="fecha-palapa" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="hora-inicio-palapa" class="form-label">Hora inicio</label>
                                                    <select class="form-select" id="hora-inicio-palapa" required>
                                                        <option value="">Seleccione</option>
                                                        <option value="08:00">08:00 AM</option>
                                                        <option value="10:00">10:00 AM</option>
                                                        <option value="12:00">12:00 PM</option>
                                                        <option value="14:00">02:00 PM</option>
                                                        <option value="16:00">04:00 PM</option>
                                                        <option value="18:00">06:00 PM</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="hora-fin-palapa" class="form-label">Hora fin</label>
                                                    <select class="form-select" id="hora-fin-palapa" required>
                                                        <option value="">Seleccione</option>
                                                        <option value="10:00">10:00 AM</option>
                                                        <option value="12:00">12:00 PM</option>
                                                        <option value="14:00">02:00 PM</option>
                                                        <option value="16:00">04:00 PM</option>
                                                        <option value="18:00">06:00 PM</option>
                                                        <option value="20:00">08:00 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="motivo-palapa" class="form-label">Motivo (opcional)</label>
                                                <textarea class="form-control" id="motivo-palapa" rows="2"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-send me-1"></i> Solicitar Reserva
                                            </button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="alberca-content">
                                        <form id="reserva-alberca-form">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="fecha-alberca" class="form-label">Fecha</label>
                                                    <input type="date" class="form-control" id="fecha-alberca" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="hora-inicio-alberca" class="form-label">Hora inicio</label>
                                                    <select class="form-select" id="hora-inicio-alberca" required>
                                                        <option value="">Seleccione</option>
                                                        <option value="08:00">08:00 AM</option>
                                                        <option value="10:00">10:00 AM</option>
                                                        <option value="12:00">12:00 PM</option>
                                                        <option value="14:00">02:00 PM</option>
                                                        <option value="16:00">04:00 PM</option>
                                                        <option value="18:00">06:00 PM</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="hora-fin-alberca" class="form-label">Hora fin</label>
                                                    <select class="form-select" id="hora-fin-alberca" required>
                                                        <option value="">Seleccione</option>
                                                        <option value="10:00">10:00 AM</option>
                                                        <option value="12:00">12:00 PM</option>
                                                        <option value="14:00">02:00 PM</option>
                                                        <option value="16:00">04:00 PM</option>
                                                        <option value="18:00">06:00 PM</option>
                                                        <option value="20:00">08:00 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="motivo-alberca" class="form-label">Motivo (opcional)</label>
                                                <textarea class="form-control" id="motivo-alberca" rows="2"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-send me-1"></i> Solicitar Reserva
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Calendario de Disponibilidad</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Dom</th>
                                                <th class="text-center">Lun</th>
                                                <th class="text-center">Mar</th>
                                                <th class="text-center">Mié</th>
                                                <th class="text-center">Jue</th>
                                                <th class="text-center">Vie</th>
                                                <th class="text-center">Sáb</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="calendar-day text-center">28</td>
                                                <td class="calendar-day text-center">29</td>
                                                <td class="calendar-day text-center">30</td>
                                                <td class="calendar-day text-center">1</td>
                                                <td class="calendar-day text-center">2</td>
                                                <td class="calendar-day text-center">3</td>
                                                <td class="calendar-day text-center">4</td>
                                            </tr>
                                            <tr>
                                                <td class="calendar-day text-center">5</td>
                                                <td class="calendar-day text-center">6</td>
                                                <td class="calendar-day text-center">7</td>
                                                <td class="calendar-day text-center">8</td>
                                                <td class="calendar-day text-center">9</td>
                                                <td class="calendar-day text-center">10</td>
                                                <td class="calendar-day text-center">11</td>
                                            </tr>
                                            <tr>
                                                <td class="calendar-day text-center">12</td>
                                                <td class="calendar-day text-center">13</td>
                                                <td class="calendar-day text-center">14</td>
                                                <td class="calendar-day text-center">15
                                                    <div class="badge bg-primary reservation-badge w-100">Palapa 14-18h</div>
                                                </td>
                                                <td class="calendar-day text-center">16</td>
                                                <td class="calendar-day text-center">17</td>
                                                <td class="calendar-day text-center">18</td>
                                            </tr>
                                            <tr>
                                                <td class="calendar-day text-center">19</td>
                                                <td class="calendar-day text-center">20</td>
                                                <td class="calendar-day text-center">21
                                                    <div class="badge bg-primary reservation-badge w-100">Alberca 10-12h</div>
                                                </td>
                                                <td class="calendar-day text-center">22</td>
                                                <td class="calendar-day text-center">23</td>
                                                <td class="calendar-day text-center">24</td>
                                                <td class="calendar-day text-center">25</td>
                                            </tr>
                                            <tr>
                                                <td class="calendar-day text-center">26</td>
                                                <td class="calendar-day text-center">27</td>
                                                <td class="calendar-day text-center">28</td>
                                                <td class="calendar-day text-center">29</td>
                                                <td class="calendar-day text-center">30</td>
                                                <td class="calendar-day text-center">31</td>
                                                <td class="calendar-day text-center"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Mis Reservas</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Área</th>
                                                <th>Fecha</th>
                                                <th>Horario</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Palapa</td>
                                                <td>15/05/2024</td>
                                                <td>14:00 - 18:00</td>
                                                <td><span class="badge bg-success">Aprobada</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-x-circle"></i> Cancelar
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alberca</td>
                                                <td>20/05/2024</td>
                                                <td>10:00 - 12:00</td>
                                                <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-x-circle"></i> Cancelar
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Solicitudes -->
                    <div class="tab-pane fade" id="solicitudes-tab">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Nueva Solicitud de Servicio</h5>
                            </div>
                            <div class="card-body">
                                <form id="solicitud-form">
                                    <div class="mb-3">
                                        <label for="titulo-solicitud" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="titulo-solicitud" placeholder="Ej: Reparación de tubería" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion-solicitud" class="form-label">Descripción detallada</label>
                                        <textarea class="form-control" id="descripcion-solicitud" rows="4" required></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tipo-solicitud" class="form-label">Tipo de solicitud</label>
                                            <select class="form-select" id="tipo-solicitud">
                                                <option value="mantenimiento">Mantenimiento</option>
                                                <option value="reparacion">Reparación</option>
                                                <option value="queja">Queja</option>
                                                <option value="sugerencia">Sugerencia</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="adjuntos-solicitud" class="form-label">Adjuntar fotos (opcional)</label>
                                            <input class="form-control" type="file" id="adjuntos-solicitud" multiple>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-send me-1"></i> Enviar Solicitud
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Mis Solicitudes</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Título</th>
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                                <th>Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Reparación de luminaria</td>
                                                <td>03/05/2024</td>
                                                <td>Reparación</td>
                                                <td><span class="badge bg-success">Completada</span></td>
                                                <td>Se reparó el 05/05/2024</td>
                                            </tr>
                                            <tr>
                                                <td>Ruido excesivo</td>
                                                <td>10/05/2024</td>
                                                <td>Queja</td>
                                                <td><span class="badge bg-warning text-dark">En proceso</span></td>
                                                <td>En revisión con el comité</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Historial de Pagos -->
                    <div class="tab-pane fade" id="historial-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Historial de Pagos</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mes</th>
                                                <th>Fecha de Pago</th>
                                                <th>Monto</th>
                                                <th>Recargo</th>
                                                <th>Método</th>
                                                <th>Comprobante</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Abril 2024</td>
                                                <td>03/04/2024</td>
                                                <td>$650</td>
                                                <td>$0</td>
                                                <td>Transferencia</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download"></i> Descargar
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Marzo 2024</td>
                                                <td>07/03/2024</td>
                                                <td>$650</td>
                                                <td>$50</td>
                                                <td>Efectivo</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-download"></i> Descargar
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Foro de Solicitudes -->
                    <div class="tab-pane fade" id="foro-tab">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Foro de Solicitudes</h5>
                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm" id="filtro-foro">
                                            <option value="todas">Todas las solicitudes</option>
                                            <option value="mantenimiento">Mantenimiento</option>
                                            <option value="reparacion">Reparaciones</option>
                                            <option value="quejas">Quejas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <div class="list-group-item mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h6 class="mb-0">Reparación de tubería en área común</h6>
                                            <span class="badge bg-success">Completada</span>
                                        </div>
                                        <p class="text-muted small mb-2">Casa 24 - Juan Pérez | 05/04/2024</p>
                                        <p class="mb-2">Hay una fuga de agua cerca de la palapa que necesita reparación urgente.</p>
                                        <div class="bg-light p-3 rounded">
                                            <p class="mb-0"><strong>Respuesta del comité:</strong> Se reparó la tubería el día 07/04/2024. Gracias por el reporte.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group-item mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h6 class="mb-0">Ruido excesivo por las noches</h6>
                                            <span class="badge bg-warning text-dark">En proceso</span>
                                        </div>
                                        <p class="text-muted small mb-2">Casa 15 - María González | 10/05/2024</p>
                                        <p class="mb-2">Desde hace varias noches se escucha música a alto volumen después de las 11pm.</p>
                                        <div class="bg-light p-3 rounded">
                                            <p class="mb-0"><strong>Respuesta del comité:</strong> Hemos notificado a los residentes sobre el reglamento de ruido. Estaremos atentos.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h6 class="mb-0">Sugerencia para mejorar áreas comunes</h6>
                                            <span class="badge bg-success">Aprobada</span>
                                        </div>
                                        <p class="text-muted small mb-2">Casa 8 - Roberto Sánchez | 25/04/2024</p>
                                        <p class="mb-2">Sugerimos colocar más bancas en el área de la palapa y mejorar el sistema de riego del jardín.</p>
                                        <div class="bg-light p-3 rounded">
                                            <p class="mb-0"><strong>Respuesta del comité:</strong> Excelente sugerencia. Se incluirá en el presupuesto del próximo trimestre.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cálculo automático de recargo
        document.getElementById('mes-pago').addEventListener('change', function() {
            const today = new Date();
            const selectedMonth = this.value;
            
            // Simular cálculo de recargo (en producción sería más preciso)
            if (selectedMonth === '2024-05' && today.getDate() > 5) {
                document.getElementById('recargo').value = '$50';
                document.getElementById('total-pagar').value = '$700';
            } else {
                document.getElementById('recargo').value = '$0';
                document.getElementById('total-pagar').value = '$650';
            }
        });
        
        // Manejo de formularios
        document.getElementById('pago-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Pago registrado exitosamente. Recibirás un acuse por correo.');
            // Aquí iría la lógica para enviar los datos al backend
        });
        
        document.getElementById('reserva-palapa-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Solicitud de reserva de palapa enviada. Recibirás una confirmación.');
            // Aquí iría la lógica para enviar los datos al backend
        });
        
        document.getElementById('reserva-alberca-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Solicitud de reserva de alberca enviada. Recibirás una confirmación.');
            // Aquí iría la lógica para enviar los datos al backend
        });
        
        document.getElementById('solicitud-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Solicitud enviada al comité. Recibirás actualizaciones por correo.');
            // Aquí iría la lógica para enviar los datos al backend
        });
        
        // Cerrar sesión
        document.getElementById('logout-btn').addEventListener('click', function() {
            if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
                window.location.href = '../../index.php';
            }
        });
    </script>
</body>
</html>