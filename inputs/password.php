<?php
    function inputPassword($valor = "") {
        return "
            <div class='mb-1'>
                <label for='password' class='form-label m-0'>Contraseña</label>
                <input type='password' class='form-control form-control-sm' id='password' name='password' 
                pattern='/^(?=.*[A-Z])(?=.*\d).{8,}$/' value='$valor' required>
            </div>";
    }

    function validarPassword($valor) {
        // Mínimo 8 caracteres, al menos 1 mayúscula y 1 número
        return preg_match("/^(?=.*[A-Z])(?=.*\d).{8,}$/", $valor);
    }
?>