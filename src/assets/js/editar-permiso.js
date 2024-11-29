function cargarDatosPermiso(button) {
    // Obtiene los datos del botón
    const id = button.getAttribute("data-id");
    const nombre = button.getAttribute("data-nombre");
    const tipo = button.getAttribute("data-tipo");
    const estado = button.getAttribute("data-estado");
    const fechaStart = button.getAttribute("data-fecha-inicio");
    const fechaEnd = button.getAttribute("data-fecha-fin");
    
    // Rellena los campos del modal
    document.querySelector("#updateProductModal input[name='nombre']").value = nombre;
    document.querySelector("#updateProductModal select[name='tipo_permiso']").value = tipo;
    document.querySelector("#updateProductModal select[name='estado']").value = estado;
    document.querySelector("#updateProductModal input[name='start']").value = fechaStart;
    document.querySelector("#updateProductModal input[name='end']").value = fechaEnd;

    // Configura el formulario
    const form = document.querySelector("#updateProductModal form");
    form.action = "../../Backend/tablas/actions/actualizar-permiso.php";
    
    // Agregar o actualizar el campo oculto para el ID
    let idInput = form.querySelector('input[name="id"]');
    if (!idInput) {
        idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        form.appendChild(idInput);
    }
    idInput.value = id;
}

// Agregar manejador para el formulario
document.querySelector("#updateProductModal form").addEventListener('submit', async function(e) {
    e.preventDefault();
    
    try {
        const formData = new FormData(this);
        
        const response = await fetch(this.action, {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();

        if (response.ok && data.success) {
            // Ocultar el modal de edición
            document.querySelector("#updateProductModal").classList.add('hidden');
            
            // Mostrar el modal de confirmación
            document.querySelector("#confirmar-editar").classList.remove('hidden');
            
            // Actualizar el texto del modal con el mensaje del servidor
            document.querySelector("#confirmar-editar h3").textContent = data.message;
            
            // Recargar la página después de cerrar el modal de confirmación
            document.querySelector("#btnConfirmarEditar").addEventListener('click', () => {
                location.reload();
            });
        } else {
            alert(data.message || 'Error al actualizar el permiso');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Hubo un error al actualizar el permiso');
    }
});

// Manejadores para cerrar los modales
document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelector("#confirmar-editar").classList.add('hidden');
        location.reload();
    });
});

document.querySelectorAll('[data-modal-toggle="updateProductModal"]').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelector("#updateProductModal").classList.toggle('hidden');
    });
});