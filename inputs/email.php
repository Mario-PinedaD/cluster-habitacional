<?php
    function email($valor = "") {
        return "
            <div class='mb-1'>
                <label for='email' class='form-label m-0'>Correo electrónico</label>
                <input type='email' class='form-control form-control-sm' id='email' name='email' 
                placeholder='Ej: usuario@dominio.com' value='$valor' required>
            </div>";
    }
    function validarEmail($valor) {
        return filter_var($valor, FILTER_VALIDATE_EMAIL);
    }
?>