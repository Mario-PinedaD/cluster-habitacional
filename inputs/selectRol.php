<?php
    function selectRol($valorSeleccionado = "") {
        $roles = ['inquilino', 'presidente', 'secretario', 'vocal'];
        $options = "";
        foreach ($roles as $rol) {
            $selected = ($valorSeleccionado == $rol) ? "selected" : "";
            $options .= "<option value='$rol' $selected>" . ucfirst($rol) . "</option>";
        }
        return "
            <div class='mb-1'>
                <label for='rol' class='form-label m-0'>Rol</label>
                <select class='form-select form-select-sm' id='rol' name='rol' required>
                    <option value=''>Selecciona un rol</option>
                    $options
                </select>
            </div>";
    }
    function validarRol($valor) {
        $rolesValidos = ['inquilino', 'presidente', 'secretario', 'vocal'];
        return in_array($valor, $rolesValidos);
    }
?>