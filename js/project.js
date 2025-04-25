function showForm(formType) {
    // Ocultar todos los formularios
    document.querySelectorAll('.form-container').forEach(form => {
        form.classList.remove('active');
    });
    
    // Desactivar todas las pestañas
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Mostrar el formulario seleccionado
    document.getElementById(formType + '-form').classList.add('active');
    
    // Activar la pestaña seleccionada
    event.currentTarget.classList.add('active');
}