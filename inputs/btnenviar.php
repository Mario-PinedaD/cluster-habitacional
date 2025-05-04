<?php
    function btnenviar($valor = "ENVIAR SOLICITUD"){
        $caja = "
            <div class='text-end'>
                <input type='submit' value='$valor' id='btnenviar' name='btnenviar' class='btn btn-success'>
            </div>
        ";
        return $caja;
    }
?>