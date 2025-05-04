<?php
    function mensajeError($mensajeError = "Error de Operacion"){
        $caja = "
            <div class='alert alert-danger my-0'>
                <h5>
                    $mensajeError
                </h5>
            </div>        
        ";
        return $caja;
    }
?>

