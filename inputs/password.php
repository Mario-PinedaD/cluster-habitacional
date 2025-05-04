<?php 
function password($valor = "" ){
    $caja = "
        <div class='mb-1'>
            <label for='password' class='form-label m-0'>Password</label>
            <input type='password' class='form-control form-control-sm' id='password' name='password' placeholder='Captura palabra de acceso (Password)' title='Captura palabra de acceso (Password)' value='$valor' required>
        </div>    
    ";
    return $caja;
}

function validarPassword($valor = ""){
    $esValido = false;
    if ($valor <> "") {
        $esValido = true;
    } 
    return $esValido;
    
}

?>