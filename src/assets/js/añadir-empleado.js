document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-registro');
    
    // Manejar envío del formulario (tanto para añadir como editar)
    const handleFormSubmit = async function(e) {
        e.preventDefault();
        
        try {
            const formData = new FormData(this);
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            // Cerrar el modal de registro/edición
            const modalRegistro = document.getElementById('defaultModal');
            if (modalRegistro) {
                modalRegistro.classList.add('hidden');
            }
            
            if (data.success) {
                // Mostrar modal de éxito
                const modalExito = document.getElementById('añadir-empleado');
                if (modalExito) {
                    modalExito.classList.remove('hidden');
                }
            } else if (data.error_type === 'duplicate') {
                // Mostrar modal de empleado existente
                const modalExistente = document.getElementById('empleado-existente');
                if (modalExistente) {
                    modalExistente.classList.remove('hidden');
                }
            } else {
                // Manejar otros tipos de errores
                alert(data.message || 'Error al procesar la solicitud');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al procesar la solicitud');
        }
    };

    // Asignar el manejador al formulario de registro
    if (formulario) {
        formulario.addEventListener('submit', handleFormSubmit);
    }

    // Asignar el mismo manejador a formularios de edición
    document.querySelectorAll('form[id^="editar-empleado-"]').forEach(form => {
        form.addEventListener('submit', handleFormSubmit);
    });

    // Botón para cerrar modal de éxito y recargar
    const btnConfirmar = document.getElementById('btnConfirmarEditar');
    if (btnConfirmar) {
        btnConfirmar.addEventListener('click', function() {
            const modalExito = document.getElementById('añadir-empleado');
            if (modalExito) {
                modalExito.classList.add('hidden');
            }
            location.reload();
        });
    }

    // Botón para cerrar modal de empleado existente
    const btnCerrar = document.getElementById('btnCerrarExistente');
    if (btnCerrar) {
        btnCerrar.addEventListener('click', function() {
            const modalExistente = document.getElementById('empleado-existente');
            const modalRegistro = document.getElementById('defaultModal');
            if (modalExistente) {
                modalExistente.classList.add('hidden');
            }
            if (modalRegistro) {
                modalRegistro.classList.remove('hidden');
            }
        });
    }

    // Cerrar modales con el botón X
    document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.fixed.inset-0');
            if (modal) {
                modal.classList.add('hidden');
                if (modal.id === 'empleado-existente') {
                    document.getElementById('defaultModal').classList.remove('hidden');
                } else if (modal.id === 'añadir-empleado') {
                    location.reload();
                }
            }
        });
    });
});