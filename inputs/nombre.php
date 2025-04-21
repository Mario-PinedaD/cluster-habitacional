<?php
// FUNCIONES PARA GENERAR INPUTS DE FORMULARIOS
function inputNombre($valor = "") {
    return "
        <div class='mb-1'>
            <label for='nombre' class='form-label m-0'>Nombre completo</label>
            <input type='text' class='form-control form-control-sm' id='nombre' name='nombre' 
            placeholder='Ej: Juan Pérez' title='Nombre completo sin caracteres especiales' 
            pattern='^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$' value='$valor' required>
        </div>";
}

function validarNombre($valor) {
    return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $valor);
}

?>
