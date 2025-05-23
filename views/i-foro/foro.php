<?php
$ruta = "../";
include($ruta . 'recursos/headsuperior.php');
include($ruta . 'recursos/u-navbar.php');
session_start();
echo headsuperior($_SESSION['u_nombre'], $_SESSION['u_rol']);
echo createnavbar();
?>

<div class="py-4">
        <div class="tab-pane fade show active" id="foro-tab">
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