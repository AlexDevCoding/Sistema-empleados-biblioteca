function cargarDatosEmpleado(button) {
    // Obtiene los datos del botón
    const id = button.getAttribute("data-id");
    const nombre = button.getAttribute("data-nombre");
    const cedula = button.getAttribute("data-cedula");
    const puesto = button.getAttribute("data-puesto");
    const departamento = button.getAttribute("data-departamento");
    const fecha = button.getAttribute("data-fecha");
    const estado = button.getAttribute("data-estado");
    const telefono = button.getAttribute("data-telefono");

    // Rellena los campos del modal
    document.querySelector("#updateProductModal input[name='nombre_completo']").value = nombre;
    document.querySelector("#updateProductModal input[name='cedula_identidad']").value = cedula;
    document.querySelector("#updateProductModal input[name='puesto']").value = puesto;
    document.querySelector("#updateProductModal select[name='departamento']").value = departamento;
    document.querySelector("#updateProductModal input[name='fecha_ingreso']").value = fecha;
    document.querySelector("#updateProductModal select[name='estado']").value = estado;
    document.querySelector("#updateProductModal input[name='telefono']").value = telefono;

    // Cambia la acción del formulario
    const form = document.querySelector("#updateProductModal form");
    form.action = `../../Backend/tablas/actions/actualizar-empleado.php?id=${id}`;

    // Cambia el texto del botón submit
    const submitButton = document.querySelector("#updateProductModal button[type='submit']");
    if (submitButton) {
        submitButton.textContent = "Actualizar Empleado";
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
        
        if (response.ok) {
            // Ocultar el modal de edición
            document.querySelector("#updateProductModal").classList.add('hidden');
            
            // Mostrar el modal de confirmación
            document.querySelector("#confirmar-editar").classList.remove('hidden');
            
            // Actualizar el texto del modal
            document.querySelector("#confirmar-editar h3").textContent = 
                "¡El empleado ha sido actualizado exitosamente!";
            
            // Cambiar el texto y color del botón
            const confirmBtn = document.querySelector("#confirmar-editar #btnConfirmarEliminar");
            confirmBtn.textContent = "Aceptar";
            confirmBtn.classList.remove('bg-red-600', 'hover:bg-red-800');
            confirmBtn.classList.add('bg-green-600', 'hover:bg-green-800');
            
            // Recargar la página después de cerrar el modal
            confirmBtn.addEventListener('click', () => {
                location.reload();
            });
        } else {
            throw new Error('Error al actualizar el empleado');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Hubo un error al actualizar el empleado');
    }
});

// Agregar manejadores para cerrar el modal de confirmación
document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelector("#confirmar-editar").classList.add('hidden');
        location.reload();
    });
});