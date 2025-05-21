<?php

function getPagos(){
    $cn = conectar();
    $sqlSelect = "SELECT fk_u_rfc, fk_c_id, p_monto, p_recargo, p_metodo_pago, p_fecha_pago FROM pagos ORDER BY p_fecha_pago DESC;";
    $resultSet = $cn->query($sqlSelect);

    // Iniciar la tabla
    $tabla = "<table class='table table-striped table-bordered'>
        <thead>
            <tr>
                <th>RFC</th>
                <th>Casa</th>
                <th>Monto</th>
                <th>Recargo</th>
                <th>Método de Pago</th>
                <th>Fecha de Pago</th>
            </tr>
        </thead>
        <tbody>";

    // Procesar cada fila
    while($row = $resultSet->fetch_assoc()){
        $tabla .= "<tr>
                    <td>".htmlspecialchars($row['fk_u_rfc'])."</td>
                    <td>".htmlspecialchars($row['fk_c_id'])."</td>
                    <td>".htmlspecialchars($row['p_monto'])."</td>
                    <td>".htmlspecialchars($row['p_recargo'])."</td>
                    <td class='text-capitalize'>".htmlspecialchars($row['p_metodo_pago'])."</td>
                    <td>".htmlspecialchars($row['p_fecha_pago'])."</td>
                </tr>";
    };
    // Cerrar la tabla
    $tabla .= "</tbody></table>";
    // Devolver la tabla
    return $tabla;
}

?>