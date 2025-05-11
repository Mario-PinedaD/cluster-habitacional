<?php
    function headsuperior($nombre = "", $rol = ""){
        return "
        <header class='bg-primary text-white py-2 px-4 d-flex justify-content-between align-items-center'>
            <div class='text-uppercase'>
            <strong>Bienvenido, </strong> $nombre &nbsp; | &nbsp; <strong>Rol:</strong> $rol
            </div>
        <a href ='../../index.php' class='btn btn-outline-light btn-sm'>Cerrar Sesion</a>
        </header>";
    }

?>

