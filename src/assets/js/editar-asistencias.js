function cargarDatosAsistencia(button) {
    // Obtiene los datos del botón
    const id = button.getAttribute("data-id");
    const nombre = button.getAttribute("data-nombre");
    const fecha = button.getAttribute("data-fecha");
    const hora_entrada = button.getAttribute("data-hora-entrada");
    const hora_salida = button.getAttribute("data-hora-salida");
    const estado = button.getAttribute("data-estado");

    // Rellena los campos del modal y desactiva el input de nombre
    const nombreInput = document.querySelector("#updateProductModal input[name='nombre']");
    nombreInput.value = nombre;
    nombreInput.disabled = true;

    document.querySelector("#updateProductModal input[name='fecha']").value = fecha;
    document.querySelector("#updateProductModal input[name='hora_entrada']").value = hora_entrada;
    document.querySelector("#updateProductModal input[name='hora_salida']").value = hora_salida;
    document.querySelector("#updateProductModal select[name='estado']").value = estado;

    // Agregar el ID como campo oculto en el formulario
    let idInput = document.querySelector("#updateProductModal input[name='id']");
    if (!idInput) {
        idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        document.querySelector("#updateProductModal form").appendChild(idInput);
    }
    idInput.value = id;

    // Cambia el texto del botón submit
    const submitButton = document.querySelector("#updateProductModal button[type='submit']");
    if (submitButton) {
        submitButton.textContent = "Actualizar Asistencia";
    }
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
            const modalEdicion = document.querySelector("#updateProductModal");
            if (modalEdicion) {
                modalEdicion.classList.add('hidden');
            }
            
            // Mostrar el modal de confirmación
            const modalConfirmacion = document.querySelector("#confirmar-editar");
            if (modalConfirmacion) {
                modalConfirmacion.classList.remove('hidden');
            }
        } else {
            throw new Error(data.message || 'Error al actualizar la asistencia');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Hubo un error al actualizar la asistencia: ' + error.message);
    }
});

// Agregar manejador para el botón de confirmación
document.querySelector("#btnConfirmarEditar").addEventListener('click', function() {
    // Ocultar el modal de confirmación
    document.querySelector("#confirmar-editar").classList.add('hidden');
    // Recargar la página
    location.reload();
});

// Agregar manejadores para cerrar el modal de confirmación
document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
    button.addEventListener('click', () => {
        const modalConfirmacion = document.querySelector("#confirmar-editar");
        if (modalConfirmacion) {
            modalConfirmacion.classList.add('hidden');
            location.reload();
        }
    });
});