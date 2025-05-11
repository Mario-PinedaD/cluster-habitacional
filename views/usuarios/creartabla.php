<?php
function crearTabla(){
    $cn = conectar();
    $sqlSelect = "SELECT u_rfc, u_nombre, u_telefono, u_rol, u_email FROM usuarios where u_rol = 'inquilino' order by u_rfc;";
    $resultSet = $cn->query($sqlSelect);

    $tabla="<table class='table table-striped table-bordered'>
        <thead>
            <tr>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Modificar<?th>
                <th>Borrar</th>
            </tr>
        </thead>";
    
    while($row = $resultSet->fetch_assoc()){
        $tabla .= "<tr> <td class=''>".$row['u_rfc']." </td>
                        <td>".$row['u_nombre']."</td>
                        <td>".$row['u_telefono']."</td>
                        <td>".$row['u_email']."</td>
                        <td class='text-capitalize'>".$row['u_rol']."</td>
                        <td><a class='btn btn-warning'>Modificar</a></td>
                        <td><a class='btn btn-danger'>Borrar</a></td>
                    </tr>";
    }
        $tabla .= "<tbody></tbody></table>";
        return $tabla;
}
?>