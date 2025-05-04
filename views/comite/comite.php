<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cluster Habitacional - Panel del Comité</title>
    <style>
        :root {
            --color-primary: #2c3e50;
            --color-secondary: #3498db;
            --color-accent: #e74c3c;
            --color-text: #34495e;
            --color-bg: #f9f9f9;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--color-bg);
            color: var(--color-text);
        }
        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }
        /* Sidebar */
        .sidebar {
            background-color: var(--color-primary);
            color: white;
            padding: 1.5rem 0;
        }
        .sidebar-header {
            text-align: center;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar-nav {
            margin-top: 2rem;
        }
        .nav-item {
            padding: 0.8rem 1.5rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .nav-item:hover, .nav-item.active {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .nav-item i {
            margin-right: 0.5rem;
        }
        /* Main Content */
        .main-content {
            padding: 2rem;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .user-role {
            background-color: var(--color-secondary);
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }
        /* Cards */
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .card-title {
            margin-top: 0;
            color: var(--color-primary);
            border-bottom: 1px solid #eee;
            padding-bottom: 0.5rem;
        }
        /* Tablas */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: var(--color-primary);
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .badge {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }
        .badge-success {
            background-color: #2ecc71;
            color: white;
        }
        .badge-warning {
            background-color: #f39c12;
            color: white;
        }
        /* Formularios */
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background-color: var(--color-secondary);
            color: white;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        /* Pestañas */
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 1.5rem;
        }
        .tab {
            padding: 0.8rem 1.5rem;
            cursor: pointer;
            border-bottom: 3px solid transparent;
        }
        .tab.active {
            border-bottom-color: var(--color-secondary);
            font-weight: bold;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Cluster Habitacional</h2>
                <p>Panel del Comité</p>
            </div>
            <div class="sidebar-nav">
                <div class="nav-item active" data-tab="dashboard">
                    <i>📊</i> Resumen
                </div>
                <div class="nav-item" data-tab="estado-cuentas">
                    <i>💰</i> Estado de Cuentas
                </div>
                <div class="nav-item" data-tab="registro-egresos">
                    <i>📤</i> Registro de Egresos
                </div>
                <div class="nav-item" data-tab="reportes">
                    <i>📈</i> Reportes Financieros
                </div>
                <div class="nav-item" data-tab="acuses">
                    <i>✉️</i> Acuses de Recibo
                </div>
                <div class="nav-item" data-tab="foro">
                    <i>💬</i> Foro de Solicitudes
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Bienvenido, <span id="user-name">[Nombre del Usuario]</span></h1>
                <div class="user-info">
                    <span class="user-role" id="user-role">Presidente</span>
                    <a href="../../index.php">
                        <button class="btn btn-primary" id="logout-btn">Cerrar Sesión</button>
                    </a>
                </div>
            </div>

            <!-- Resumen (Dashboard) -->
            <div class="tab-content active" id="dashboard-content">
                <div class="card">
                    <h3 class="card-title">Resumen Financiero</h3>
                    <div class="grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
                        <div class="card">
                            <h4>Ingresos del Mes</h4>
                            <p style="font-size: 2rem; color: var(--color-secondary);">$39,000</p>
                            <p>(60% de casas pagadas)</p>
                        </div>
                        <div class="card">
                            <h4>Egresos del Mes</h4>
                            <p style="font-size: 2rem; color: var(--color-accent);">$28,500</p>
                            <p>12 transacciones</p>
                        </div>
                        <div class="card">
                            <h4>Balance Actual</h4>
                            <p style="font-size: 2rem; color: var(--color-primary);">$10,500</p>
                            <p>+$2,000 vs mes anterior</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3 class="card-title">Pagos Recientes</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Casa</th>
                                <th>Inquilino</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Casa 12</td>
                                <td>Juan Pérez</td>
                                <td>$650</td>
                                <td>05/03/2024</td>
                                <td><span class="badge badge-success">Pagado</span></td>
                            </tr>
                            <tr>
                                <td>Casa 24</td>
                                <td>María García</td>
                                <td>$700</td>
                                <td>05/05/2024</td>
                                <td><span class="badge badge-success">Pagado</span></td>
                            </tr>
                            <tr>
                                <td>Casa 45</td>
                                <td>Carlos López</td>
                                <td>$0</td>
                                <td>-</td>
                                <td><span class="badge badge-warning">Pendiente</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Estado de Cuentas -->
            <div class="tab-content" id="estado-cuentas-content">
                <div class="card">
                    <h3 class="card-title">Estado de Cuentas</h3>
                    <div class="tabs">
                        <div class="tab active" data-subtab="individual">Individual</div>
                        <div class="tab" data-subtab="conjunto">Conjunto</div>
                    </div>
                    <div class="subtab-content active" id="individual-content">
                        <div class="form-group">
                            <label for="casa-select">Seleccionar Casa:</label>
                            <select id="casa-select">
                                <option value="">Todas las casas</option>
                                <option value="1">Casa 1</option>
                                <!-- Opciones hasta Casa 60 -->
                            </select>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Periodo</th>
                                    <th>Monto</th>
                                    <th>Recargo</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mayo 2024</td>
                                    <td>$650</td>
                                    <td>$0</td>
                                    <td><span class="badge badge-success">Pagado</span></td>
                                    <td><button class="btn btn-primary">Ver Detalle</button></td>
                                </tr>
                                <tr>
                                    <td>Abril 2024</td>
                                    <td>$650</td>
                                    <td>$50</td>
                                    <td><span class="badge badge-success">Pagado</span></td>
                                    <td><button class="btn btn-primary">Ver Detalle</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="subtab-content" id="conjunto-content">
                        <div class="form-group">
                            <label for="periodo-select">Seleccionar Periodo:</label>
                            <select id="periodo-select">
                                <option value="2024-05">Mayo 2024</option>
                                <option value="2024-04">Abril 2024</option>
                            </select>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Casas</th>
                                    <th>Porcentaje</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge badge-success">Pagado</span></td>
                                    <td>36</td>
                                    <td>60%</td>
                                    <td>$23,400</td>
                                </tr>
                                <tr>
                                    <td><span class="badge badge-warning">Pendiente</span></td>
                                    <td>24</td>
                                    <td>40%</td>
                                    <td>$15,600</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Registro de Egresos -->
            <div class="tab-content" id="registro-egresos-content">
                <div class="card">
                    <h3 class="card-title">Registrar Egreso</h3>
                    <form id="egreso-form">
                        <div class="form-group">
                            <label for="monto">Monto:</label>
                            <input type="number" id="monto" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="destinatario">Destinatario:</label>
                            <input type="text" id="destinatario" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" id="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="motivo">Motivo:</label>
                            <textarea id="motivo" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="responsable">Responsable:</label>
                            <select id="responsable" required>
                                <option value="presidente">Presidente</option>
                                <option value="secretario">Secretario</option>
                                <option value="vocal">Vocal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar Egreso</button>
                    </form>
                </div>

                <div class="card">
                    <h3 class="card-title">Historial de Egresos</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Destinatario</th>
                                <th>Motivo</th>
                                <th>Responsable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>05/03/2024</td>
                                <td>$2,500</td>
                                <td>Jardinería López</td>
                                <td>Mantenimiento áreas verdes</td>
                                <td>Presidente</td>
                            </tr>
                            <tr>
                                <td>05/01/2024</td>
                                <td>$5,000</td>
                                <td>Seguridad Total</td>
                                <td>Pago mensual vigilancia</td>
                                <td>Secretario</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Reportes Financieros -->
            <div class="tab-content" id="reportes-content">
                <div class="card">
                    <h3 class="card-title">Reportes Financieros</h3>
                    <div class="tabs">
                        <div class="tab active" data-subtab="mensual">Mensual</div>
                        <div class="tab" data-subtab="anual">Anual</div>
                    </div>
                    <div class="subtab-content active" id="mensual-content">
                        <div class="form-group">
                            <label for="mes-select">Seleccionar Mes:</label>
                            <select id="mes-select">
                                <option value="2024-05">Mayo 2024</option>
                                <option value="2024-04">Abril 2024</option>
                            </select>
                            <button class="btn btn-primary" style="margin-top: 0.5rem;">Generar PDF</button>
                        </div>
                        <div style="background-color: white; padding: 1rem; border-radius: 8px;">
                            <h4>Reporte Mensual - Mayo 2024</h4>
                            <p><strong>Total Ingresos:</strong> $39,000</p>
                            <p><strong>Total Egresos:</strong> $28,500</p>
                            <p><strong>Balance:</strong> $10,500</p>
                            <div style="height: 300px; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
                                [Gráfico de ingresos vs egresos]
                            </div>
                        </div>
                    </div>
                    <div class="subtab-content" id="anual-content">
                        <div class="form-group">
                            <label for="anio-select">Seleccionar Año:</label>
                            <select id="anio-select">
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                            <button class="btn btn-primary" style="margin-top: 0.5rem;">Generar PDF</button>
                        </div>
                        <div style="background-color: white; padding: 1rem; border-radius: 8px;">
                            <h4>Reporte Anual - 2024</h4>
                            <p><strong>Total Ingresos:</strong> $195,000</p>
                            <p><strong>Total Egresos:</strong> $142,000</p>
                            <p><strong>Balance:</strong> $53,000</p>
                            <div style="height: 300px; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
                                [Gráfico de tendencia anual]
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acuses de Recibo -->
            <div class="tab-content" id="acuses-content">
                <div class="card">
                    <h3 class="card-title">Acuses de Recibo</h3>
                    <div class="form-group">
                        <label for="casa-acuse">Seleccionar Casa:</label>
                        <select id="casa-acuse">
                            <option value="">Todas las casas</option>
                            <option value="1">Casa 1</option>
                            <!-- Opciones hasta Casa 60 -->
                        </select>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Casa</th>
                                <th>Inquilino</th>
                                <th>Periodo</th>
                                <th>Monto</th>
                                <th>Fecha de Pago</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Casa 12</td>
                                <td>Juan Pérez</td>
                                <td>Mayo 2024</td>
                                <td>$650</td>
                                <td>05/03/2024</td>
                                <td>
                                    <button class="btn btn-primary">Reenviar Acuse</button>
                                    <button class="btn btn-primary">Descargar PDF</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Foro de Solicitudes -->
            <div class="tab-content" id="foro-content">
                <div class="card">
                    <h3 class="card-title">Foro de Solicitudes</h3>
                    <div class="form-group">
                        <label for="filtro-estado">Filtrar por estado:</label>
                        <select id="filtro-estado">
                            <option value="todos">Todos</option>
                            <option value="pendiente">Pendientes</option>
                            <option value="atendido">Atendidos</option>
                        </select>
                    </div>
                    <div style="margin-top: 1.5rem;">
                        <div style="border: 1px solid #ddd; border-radius: 8px; padding: 1rem; margin-bottom: 1rem;">
                            <div style="display: flex; justify-content: space-between;">
                                <h4 style="margin-top: 0;">Reparación de tubería en área común</h4>
                                <span class="badge badge-warning">Pendiente</span>
                            </div>
                            <p><strong>Casa 24 - María García</strong> | 05/04/2024</p>
                            <p>Hay una fuga de agua cerca de la palapa que necesita reparación urgente.</p>
                            <div style="margin-top: 1rem;">
                                <textarea placeholder="Agregar comentario..." style="width: 100%; margin-bottom: 0.5rem;"></textarea>
                                <div style="display: flex; justify-content: space-between;">
                                    <select>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="atendido">Atendido</option>
                                    </select>
                                    <button class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </div>
                        <div style="border: 1px solid #ddd; border-radius: 8px; padding: 1rem; margin-bottom: 1rem;">
                            <div style="display: flex; justify-content: space-between;">
                                <h4 style="margin-top: 0;">Reserva de palapa para evento</h4>
                                <span class="badge badge-success">Atendido</span>
                            </div>
                            <p><strong>Casa 8 - Roberto Sánchez</strong> | 05/01/2024</p>
                            <p>Solicito reservar la palapa el día 15 de mayo para una reunión familiar.</p>
                            <div style="background-color: #f5f5f5; padding: 0.8rem; border-radius: 4px; margin-top: 0.5rem;">
                                <p><strong>Comentario del comité:</strong> Reserva aprobada. Favor de dejar el área limpia después del evento.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navegación entre pestañas principales
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                // Remover clase active de todos los items
                document.querySelectorAll('.nav-item').forEach(navItem => {
                    navItem.classList.remove('active');
                });
                // Agregar clase active al item clickeado
                this.classList.add('active');
                
                // Ocultar todos los contenidos
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // Mostrar el contenido correspondiente
                const tabId = this.getAttribute('data-tab');
                document.getElementById(`${tabId}-content`).classList.add('active');
            });
        });

        // Navegación entre subtabs
        document.querySelectorAll('[data-subtab]').forEach(tab => {
            tab.addEventListener('click', function() {
                const parentTabs = this.closest('.tabs');
                // Remover clase active de todos los tabs en el mismo grupo
                parentTabs.querySelectorAll('.tab').forEach(t => {
                    t.classList.remove('active');
                });
                // Agregar clase active al tab clickeado
                this.classList.add('active');
                
                // Ocultar/mostrar contenido correspondiente
                const subtabId = this.getAttribute('data-subtab');
                const parentContent = this.closest('.tab-content') || this.closest('.subtab-content').parentElement;
                parentContent.querySelectorAll('.subtab-content').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(`${subtabId}-content`).classList.add('active');
            });
        });

        // Cerrar sesión
        document.getElementById('logout-btn').addEventListener('click', function() {
            if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
                window.location.href = '/logout';
            }
        });

        // Simular datos del usuario (en producción esto vendría del backend)
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener rol del usuario desde la sesión (simulado)
            const userRole = 'presidente'; // Esto debería venir del backend
            document.getElementById('user-role').textContent = userRole.charAt(0).toUpperCase() + userRole.slice(1);
        });
    </script>
</body>
</html>