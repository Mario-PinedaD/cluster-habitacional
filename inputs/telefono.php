<?php
    function inputTelefono($valor = "") {
        return "
            <div class='mb-1'>
                <label for='telefono' class='form-label m-0'>Teléfono</label>
                <input type='tel' class='form-control form-control-sm' id='telefono' name='telefono' 
                placeholder='Ej: 5512345678' pattern='^[0-9]{10,15}$' title='10-15 dígitos sin espacios' 
                value='$valor'>
            </div>";
    }
    function validarTelefono($valor) {
        // Validar que el teléfono contenga solo dígitos y tenga entre 10 y 15 caracteres
        return preg_match("/^[0-9]{10,15}$/", $valor);
    }
?>