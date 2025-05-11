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