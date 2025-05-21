//AÑADIR USUARIO
async function confirmAdd() {
    const formData = {
        u_rfc: document.getElementById('new_u_rfc').value,
        u_nombre: document.getElementById('new_u_nombre').value,
        u_email: document.getElementById('new_u_email').value,
        u_password: document.getElementById('new_u_password').value,
        u_telefono: document.getElementById('new_u_telefono').value,
        u_rol: document.getElementById('new_u_rol').value
    };
    // Validación básica
    //if(formData.u_rfc.length !== 13) {
    //    alert('El RFC debe tener exactamente 13 caracteres');
    //    return;
    //}
    fetch('operacionusuarios.php', {  // Ajusta esta ruta según tu estructura
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'create',
            ...formData
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Usuario añadido correctamente');
            closeAddPopup();
            loadUsers(); // Recargar la lista
        } else {
            alert('Error al añadir: ' + data.message);
        }
    })
    .catch(error => {
        console.log(formData);
        console.error('Error:', error);
        alert('Error al conectar con el servidor');
    });
}

//MODIFICAR USUARIOS
function confirmEdit() {
    const formData = {
        u_rfc: document.getElementById('u_rfc').value,
        u_nombre: document.getElementById('u_nombre').value,
        u_email: document.getElementById('u_email').value,
        u_password: document.getElementById('u_password').value,
        u_telefono: document.getElementById('u_telefono').value,
        u_rol: document.getElementById('u_rol').value
    };

    fetch('usuarios_actions.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'update',
            ...formData
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Usuario actualizado correctamente');
            closeEditPopup();
            loadUsers(); // Recargar la lista
        } else {
            alert('Error al actualizar: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al conectar con el servidor');
    });
}

//ELIMINAR USUARIOS
