<?php 
function idUsuario($valor = "" ){
    $caja = "
        <div class='mb-1'>
            <label for='idUsuario' class='form-label m-0'>Nombre de usuario</label>
            <input type='text' class='form-control form-control-sm' id='idUsuario' name='idusuario' 
            placeholder='Captura el usuario' title='Captura el usuario con el que te registraste' 
            pattern='^[a-zA-Z0-9\-_.@$%^&`]+$' value='$valor' required>
        </div>    
    ";
    return $caja;
}

function validarIdUsuario($valor = ""){
    $patron = "^[a-zA-Z0-9\-_.@$%^&`]+$";
    $esValido = false;
    if (preg_match($patron, $valor)) {
        $esValido = true;
    } 
    return $esValido;
    
}

?>