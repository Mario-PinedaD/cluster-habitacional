<?php
function createnavbar() {
    return "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'>Menú</a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarContenido'
        aria-controls='navbarContenido' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarContenido'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='../comite'>Inicio</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='../c-usuarios'>Usuarios</a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link' href='../c-pagos'>Pagos</a>
                </li>
              </ul>
            </div>
        </div>
    </nav>";
    
}
?>


